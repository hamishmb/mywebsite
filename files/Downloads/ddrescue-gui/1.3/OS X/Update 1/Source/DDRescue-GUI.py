#!/usr/bin/env python
# -*- coding: utf-8 -*- 
# DDRescue-GUI Version 1.3
# Copyright (C) 2013-2014 Hamish McIntyre-Bhatty
# This program is free software: you can redistribute it and/or modify it
# under the terms of the GNU General Public License version 3 or,
# at your option, any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

#Import main modules
from __future__ import division
import time
import platform
import subprocess
import os
import sys
import shutil
import wx

#Determine if running on Linux or Mac.
global Linux
if platform.system() == 'Linux':
    print "Detected Linux..."
    Linux = 1

    #Set the resource path to /usr/share/ddrescue-gui/
    ResPath = '/usr/share/ddrescue-gui/' 
elif platform.system() == 'Darwin':
    print "Detected Mac OS X..."
    Linux = 0

    try:
        #Set the resource path from an environment variable, as mac .apps can be found in various places.
        ResPath = os.environ['RESOURCEPATH']
    except KeyError:
    	ResPath = sys.argv[1]

else: 
    print "Unable to detect OS, asking..."

    #Ask the user what system DDRescue-GUI is running on.
    warndlg = wx.MessageDialog(None, 'DDRescue-GUI has been unable to determine if it is being run on a Linux system, or an Apple system. This information is required, so please click yes for a Linux system, and click no for an Apple system. Thank you.', 'DDRescue-GUI - Exclamation!', wx.YES_NO | wx.ICON_EXCLAMATION).ShowModal()
    if warndlg == wx.ID_YES:
        Linux = 1
        #Set the resource path to /usr/share/ddrescue-gui/
        ResPath = '/usr/share/ddrescue-gui' 
    else:
        Linux = 0
        #Set the resource path from an environment variable.
        ResPath = os.environ['RESOURCEPATH']

#If this isn't running as root, exit immediately
if not os.geteuid()==0:
    #Relaunch as root.
    subprocess.Popen([ResPath+"/runasroot.sh"])
    sys.exit("\nSorry, this program must be run with root privileges.\nRestarting as root...")

print "DDRescue-GUI Version 1.3 Starting..."

#Import Publisher (OS dependent).
if Linux == 1:
    from wx.lib.pubsub import Publisher
else:
    from pubsub import setuparg1
    from pubsub import pub
    Publisher = pub.Publisher()

#Import threading lib
from threading import Thread

#Define some global functons.
def GetDevInfo():
    devicelist = []
    #This part is specific to Linux or Mac OS
    if Linux == 1:
        # Run a short bash script to collect data about connected devices.
        subprocess.Popen([ResPath+"/listdevices.sh", "-l"]).wait()

        #New more efficent way of putting everything in one list.
        with open('/tmp/ddrescue-gui/idedevices', 'r') as idedevicessource:
            idedevicesfile = idedevicessource.readlines()
            if idedevicesfile != []:
                devicelist = devicelist + idedevicesfile
                devicelist.append('IDE/ATA Devices:')

        with open('/tmp/ddrescue-gui/cddvddevices', 'r') as cddvddevicessource:
            cddvddevicesfile = cddvddevicessource.readlines()
            if cddvddevicesfile != []:
                devicelist.append('CD/DVD Devices:')
                devicelist = devicelist + cddvddevicesfile

        with open('/tmp/ddrescue-gui/usbsatadevices', 'r') as usbsatadevicessource:
            usbsatadevicesfile = usbsatadevicessource.readlines()
            if usbsatadevicesfile != []:
                devicelist.append('USB or SATA Devices:')
                devicelist = devicelist + usbsatadevicesfile
    else:
        # Run a short bash script to collect data about connected devices.
        subprocess.Popen([ResPath+"/listdevices.sh", "-m"]).wait()

        with open('/tmp/ddrescue-gui/devices', 'r') as devicessource:
            devicesfile = devicessource.readlines()
            if devicesfile != []:
                devicelist.append("All Devices")
                devicelist = devicelist + devicesfile

    #Remove newline chars.
    return [(el.strip()) for el in devicelist]

#Starter Class
class MyApp(wx.App):
    def OnInit(self):
        Splash = ShowSplash()
        Splash.Show()

        self.Bind(wx.EVT_ACTIVATE_APP, self.OnActivate)
        
        return True

    def OnActivate(self,e):
        self.GetTopWindow().Raise()

#End Starter Class
#Begin splash screen
class ShowSplash(wx.SplashScreen):
    def __init__(self, parent=None):
        #Convert the image to a bitmap.
        aBitmap = wx.Image(name = ResPath+"/ddgoestotherescue.jpg").ConvertToBitmap()

        self.AlreadyExited = False

        #Display the splash screen.
        wx.SplashScreen.__init__(self, aBitmap, wx.SPLASH_CENTRE_ON_SCREEN | wx.SPLASH_TIMEOUT, 1500, parent)
        self.Bind(wx.EVT_CLOSE, self.OnExit)

        #Make sure it's painted, which fixes the problem with the previous tempramental splash screen.
        wx.Yield()

    def OnExit(self,e):
        #Start the Main Frame.
        self.Hide()
        if self.AlreadyExited == False:
            #Stop this from executing twice when the splash is clicked.
            self.AlreadyExited = True
            MainFrame = MainWindow()
            app.SetTopWindow(MainFrame)
            MainFrame.Show(True)
            #Skip the event so the main frame starts.
            e.Skip()

#End splash screen
#Begin Main Window   
class MainWindow(wx.Frame):
    def __init__(self):
        wx.Frame.__init__(self, None, title="DDRescue-GUI v1.3 (8/2/14)", size=(800,360), style=wx.DEFAULT_FRAME_STYLE ^ wx.RESIZE_BORDER)
        self.MainPanel = wx.Panel(self)

        #Make a temporary directory for data used by this program. If it already exists, delete it and recreate it.
        if os.path.exists("/tmp/ddrescue-gui"):
            shutil.rmtree("/tmp/ddrescue-gui")
        os.mkdir("/tmp/ddrescue-gui")
        
        #Set some variables
        self.SetVars()

        #Create a Statusbar in the bottom of the window and set the text.
        self.MakeStatusBar()

        #Add text
        self.CreateText()

        #Create some buttons
        self.CreateButtons()

        #Create the choiceboxes.
        self.UpdateFileChoices(self)

        #Create the menus.
        self.CreateMenus()

        # Create a wildcard for the open and save dialogs
        self.wildcard = "ISO Image file (*.iso)|*.iso|IMG Image file (*.img)|*.img|All Files/Devices (*)|*" 

        # Set up to receive information from backend.
        Publisher().subscribe(self.UpdateRecoveredInfo, "recoveredupdate")
        Publisher().subscribe(self.UpdateErrsizeInfo, "errsizeupdate")
        Publisher().subscribe(self.UpdateReadRateInfo, "readrateupdate")
        Publisher().subscribe(self.UpdatenumerrorsInfo, "numerrsupdate")
        Publisher().subscribe(self.UpdateavgReadRateInfo, "avgreadrateupdate")
        Publisher().subscribe(self.UpdateTimeSinceLastReadInfo, "timesincelastreadupdate")
        Publisher().subscribe(self.UpdateStatusbar, "statusbarupdate")
        Publisher().subscribe(self.UpdateTimeLeft, "timeleftupdate")
        Publisher().subscribe(self.RecoveryFailed, "failed")
        Publisher().subscribe(self.RecoveryEnded, "finished")

        #Recieve info from the finished dlg.
        Publisher().subscribe(self.Reload, "restart")
        Publisher().subscribe(self.OnExit, "exit")

        #Recieve info from the devinfodlg.
        Publisher().subscribe(self.UpdateFileChoices, "refresh")
        self.BindEvents()

        #Warn user to close other programs.
        wx.MessageDialog(self.MainPanel, "Please insure you've closed all other programs before starting ddrescue to prevent problems. Thank you.", "DDRescue-GUI - Warning!", style=wx.OK | wx.ICON_EXCLAMATION, pos=wx.DefaultPosition).ShowModal()

    #Create Functions
    def BindEvents(self): 
        #Bind all mainwindow events in a seperate function
        self.Bind(wx.EVT_CLOSE, self.OnExit)
        self.Bind(wx.EVT_MENU, self.OnAbout, self.menuAbout)
        self.Bind(wx.EVT_MENU, self.OnExit, self.menuExit)
        self.Bind(wx.EVT_MENU, self.DevInfo, self.menuDevInfo)
        self.Bind(wx.EVT_MENU, self.Prefs, self.menuPrefs)
        self.Bind(wx.EVT_BUTTON, self.OnStart, self.startbutton)
        self.Bind(wx.EVT_BUTTON, self.UpdateFileChoices, self.refreshbutton)
        self.Bind(wx.EVT_BUTTON, self.OnAbort, self.abortbutton)
        self.Bind(wx.EVT_BUTTON, self.ViewOutput, self.ViewOutputbutton)

    def SetVars(self):
        global RecoveringData
        RecoveringData = False
        global InputFileChosen
        InputFileChosen = "None"
        global OutputFileChosen
        OutputFileChosen = "None"
        global LogFileChosen
        LogFileChosen = "None"
        global reqdexit
        reqdexit = False

    def MakeStatusBar(self):
        global statusbar
        statusbar = self.CreateStatusBar()
        statusbar.SetStatusText("Ready.")

    def CreateText(self):
        #Add the selection text
        wx.StaticText(self.MainPanel, -1, "Welcome to DDRescue-GUI!", pos=(270,15))
        wx.StaticText(self.MainPanel, -1, "Device/file to image from:", pos=(10, 40))  
        wx.StaticText(self.MainPanel, -1, "Device/file to image to:", pos=(590, 40)) 
        wx.StaticText(self.MainPanel, -1, "Position for logfile:", pos=(300,40))

        #Add the data information text for recovery
        self.recovereddata = wx.StaticText(self.MainPanel, -1, "Recovered data:", pos=(20,130))
        self.unreadabledata = wx.StaticText(self.MainPanel, -1, "Unreadable data:", pos=(270,130))
        self.currentreadrate = wx.StaticText(self.MainPanel, -1, "Current read rate:", pos=(530,130))
        self.numerrors = wx.StaticText(self.MainPanel, -1, "Number of bad areas:", pos=(20,180))
        self.avgreadrate = wx.StaticText(self.MainPanel, -1, "Average read rate:", pos=(270,180))
        self.timesincelastread = wx.StaticText(self.MainPanel, -1, "Time since last sucessful read:", pos=(530,180))
        self.timeleft = wx.StaticText(self.MainPanel, -1, "Remaining time:", pos=(20,230))

    def CreateButtons(self):
        #Create start,stop and refresh buttons.
        self.startbutton = wx.Button(self.MainPanel, wx.ID_ANY, "Start", pos=(620,270))
        
        #Make this appear right on Linux and Mac.
        if Linux == 1:
            self.abortbutton = wx.Button(self.MainPanel, wx.ID_ANY, "Abort", pos=(710,270))
        else:
            self.abortbutton = wx.Button(self.MainPanel, wx.ID_ANY, "Abort", pos=(724,270))
            
        self.refreshbutton = wx.Button(self.MainPanel, wx.ID_ANY, "Refresh List of Devices", pos=(620,240), size=(175,30))
        self.ViewOutputbutton = wx.Button(self.MainPanel, wx.ID_ANY, "View Terminal Output", pos=(620,210), size=(175,30))

        #Disable the abort button and the View Terminal Output button.
        self.abortbutton.Disable()
        self.ViewOutputbutton.Disable()

    def CreateMenus(self):
        filemenu = wx.Menu()
        editmenu = wx.Menu()
        viewmenu = wx.Menu()
        helpmenu = wx.Menu() 
   
        #Adding Menu Items.
        self.menuAbout = helpmenu.Append(wx.ID_ABOUT, "&About", "Information about this program")
        self.menuExit = filemenu.Append(wx.ID_EXIT,"&Exit", "Terminate the program")
        self.menuDevInfo = viewmenu.Append(wx.ID_ANY,"&Device Information", "Information about all detected devices") 
        self.menuPrefs = editmenu.Append(wx.ID_PREFERENCES, "&Preferences", "General settings")

        #Creating the menubar.
        self.menuBar = wx.MenuBar()

        #Adding menus to the MenuBar
        self.menuBar.Append(filemenu,"&File") # Adding the "filemenu" to the MenuBar
        self.menuBar.Append(editmenu,"&Edit") # Adding the "editmenu" to the MenuBar
        self.menuBar.Append(viewmenu,"&View") # Adding the "viewmenu" to the MenuBar
        self.menuBar.Append(helpmenu,"&Help") # Adding the "helpmenu" to the MenuBar

        #Adding the MenuBar to the Frame content.
        self.SetMenuBar(self.menuBar)

    def UpdateFileChoices(self,e):
        # Notify the user with the statusbar
        statusbar.SetStatusText("Updating List of devices... Please wait...")

        devicelist = GetDevInfo()

        # Create some lists
        self.inputfilelist = ['-- Please Select --', 'Other/Specify'] + devicelist
        self.outputfilelist = ['-- Please Select --', 'Other/Specify'] + devicelist
        
        #Remove the old choiceboxes if they're present.
        try:
            if self.inputchoice:
                self.inputchoice.Destroy()
            if self.outputchoice:
                self.outputchoice.Destroy()
            if self.logfilechoice:
                self.logfilechoice.Destroy()
        except: pass
        time.sleep(0.5)

        # Create some choiceboxes using the newly created/updated lists.
        self.inputchoice = wx.Choice(self.MainPanel, -1, (10,64), choices=self.inputfilelist)
        self.outputchoice = wx.Choice(self.MainPanel, -1, (590,64), choices=self.outputfilelist)
        self.logfilechoice = wx.Choice(self.MainPanel, -1, (300,64), choices=['-- Please Select --', 'None - not recommended', 'Specify'])

        #Bind the events here.
        self.Bind(wx.EVT_CHOICE, self.SelectInputFile, self.inputchoice)
        self.Bind(wx.EVT_CHOICE, self.SelectOutputFile, self.outputchoice)
        self.Bind(wx.EVT_CHOICE, self.SelectLogFile, self.logfilechoice)

        #Let the starter script know that the choiceboxes have been reset. 
        global checkedsettings
        checkedsettings = False

        # Notify the user with the statusbar.
        statusbar.SetStatusText("Ready.")

    def SelectInputFile(self,e):
        #Function for selecting input file/device and set variable to selected value.
        global InputFileChosen #Let the function know we are using a global variable
        InputFileChosen = self.inputchoice.GetStringSelection()

        #Ignore device type text.
        if InputFileChosen == "IDE/ATA Devices:" or InputFileChosen == "CD/DVD Devices:" or InputFileChosen == "USB or SATA Devices:" or InputFileChosen == "All Devices":
            InputFileChosen = None
            self.inputchoice.SetStringSelection("-- Please Select --")

        if InputFileChosen == "Other/Specify":
            InputFileDlg = wx.FileDialog(self.MainPanel, "Select Input File/Device...", defaultDir="/dev", wildcard=self.wildcard, style=wx.OPEN)
            if InputFileDlg.ShowModal() == wx.ID_OK:
                InputFileChosen = InputFileDlg.GetPath()
                self.inputchoice.Append(InputFileChosen)
                self.inputchoice.SetStringSelection(InputFileChosen)
            else:
                InputFileChosen = "None"
                self.inputchoice.SetStringSelection("-- Please Select --")

        if InputFileChosen == "-- Please Select --":
            InputFileChosen = "None"

    def SelectOutputFile(self,event):
        #Function for selecting output file/device and set variable to selected value.
        global OutputFileChosen #Let the function know we are using a global variable
        OutputFileChosen = self.outputchoice.GetStringSelection()

        #Ignore device type text.
        if OutputFileChosen == "IDE/ATA Devices:" or OutputFileChosen == "CD/DVD Devices:" or OutputFileChosen == "USB or SATA Devices:" or OutputFileChosen == "All Devices":
            OutputFileChosen = None
            self.outputchoice.SetStringSelection("-- Please Select --")

        if OutputFileChosen == "Other/Specify":
            OutputFileDlg = wx.FileDialog(self.MainPanel, "Select Output File/Device...", defaultDir=os.environ["HOME"], wildcard=self.wildcard, style=wx.SAVE)
            if OutputFileDlg.ShowModal() == wx.ID_OK:
                OutputFileChosen = OutputFileDlg.GetPath()
                self.outputchoice.Append(OutputFileChosen)
                self.outputchoice.SetStringSelection(OutputFileChosen)
            else:
                OutputFileChosen = "None"
                self.outputchoice.SetStringSelection("-- Please Select --")

        if OutputFileChosen == "-- Please Select --":
            OutputFileChosen = "None"

        #Insure the device selected is the right one.
        if self.outputchoice.GetStringSelection()[0:5] == "/dev/":
             warndev = wx.MessageDialog(self.MainPanel, 'You have selected a device to recover to rather than an image! Please be doubly sure that you have selected the right device, or else you may lose data! Click yes to accept the device, click no to cancel the selection.', 'DDRescue-GUI -- Warning!', wx.YES_NO | wx.ICON_EXCLAMATION).ShowModal()
             if warndev == wx.ID_YES:
                 print "Accepted device as output file."
             else:
                 OutputFileChosen = "None"
                 self.outputchoice.SetStringSelection("-- Please Select --")

    def SelectLogFile(self,event):
        #Function for selecting log file position/name and set variable to selected value.
        global LogFileChosen #Let the function know we are using a global variable
        LogFileChosen = self.logfilechoice.GetStringSelection()

        if LogFileChosen == "None - not recommended":
            warndlg = wx.MessageDialog(self.MainPanel, 'You have not chosen to use a log file. If you do not use one, you will have to start from scratch in the event of a power outage, or if the program is interrupted. Are you sure you do not want to use a logfile?', 'DDRescue-GUI - Warning', wx.YES_NO | wx.ICON_EXCLAMATION).ShowModal()
            if warndlg == wx.ID_YES:
                LogFileChosen = ""
            else:
                LogFileChosen = "None"
                self.logfilechoice.SetStringSelection("-- Please Select --")

        if LogFileChosen == "Specify":
            LogFileDlg = wx.FileDialog(self.MainPanel, "Select Log File Position & Name...", defaultDir=os.environ["HOME"], wildcard="Log Files|*.log", style=wx.SAVE)
            if LogFileDlg.ShowModal() == wx.ID_OK:
                LogFileChosen = LogFileDlg.GetPath()
                self.logfilechoice.Append(LogFileChosen)
                self.logfilechoice.SetStringSelection(LogFileChosen)
            else:
                LogFileChosen = "None"
                self.logfilechoice.SetStringSelection("-- Please Select --")

        if LogFileChosen == "-- Please Select --":
            LogFileChosen = "None"

    def OnAbout(self,e):
        aboutbox = wx.AboutDialogInfo()
        aboutbox.Name = "DDRescue-GUI"
        aboutbox.Version = "1.3"
        aboutbox.Copyright = "(C) 2013-2014 Hamish McIntyre-Bhatty"
        aboutbox.Description = "GUI frontend for GNU ddrescue"
        aboutbox.WebSite = ("https://launchpad.net/ddrescue-gui", "Launchpad page")
        aboutbox.Developers = ["Hamish McIntyre-Bhatty"]
        aboutbox.License = "DDRescue-GUI and GNU ddrescue are released under the GNU GPL v3,\nand as such have ABSOLUTELY NO WARRANTY. You are allowed to copy,\nredistribute, and modify this open-source program only if you credit\nthe original author, and only under the terms of the GNU GPL v3.\nFor more information, visit: http://www.gnu.org/licenses/"

        # Show the wx.AboutBox
        wx.AboutBox(aboutbox)

    def Prefs(self,e):
        # A dialog to modify settings
        # If input and output files are set (do not equal "None") then continue.
        if InputFileChosen != "None" and OutputFileChosen != "None":
            PreferencesWindow().Show()
        else:
            wx.MessageDialog(self.MainPanel, 'Please select input and output files first!', 'DDRescue-GUI -- Error!', wx.OK | wx.ICON_ERROR).ShowModal()

    def DevInfo(self,e):
        DevInfoWindow().Show()

    def OnStart(self,e):
        # Function to start ddrescue and check final settings.
        statusbar.SetStatusText("Checking Settings...")
        if checkedsettings == False:
            wx.MessageDialog(self.MainPanel, 'Sorry, it is important that you check the settings (in preferences) before you start the recovery! The recovery will now be aborted.', 'DDRescue-GUI -- Error!', wx.OK | wx.ICON_ERROR).ShowModal()
            statusbar.SetStatusText("Ready.")
        if checkedsettings == True:
            if InputFileChosen != "None" and LogFileChosen != "None" and OutputFileChosen != "None":
                #Check if progressbar has already been created.
                global ProgressBar
                try:
                    ProgressBar.SetBezelFace(3)
                except:
                    ProgressBar = wx.Gauge(self.MainPanel, -1, 5000, (10,273), (600,25))
                    ProgressBar.SetBezelFace(3)
                    ProgressBar.SetShadowWidth(3)
                else:
                    ProgressBar.SetValue(0)
                    ProgressBar.Show()

                statusbar.SetStatusText("Starting DDRescue...")
                wx.MessageDialog(self.MainPanel, 'DDRescue is now about to be started. Please wait for up to 10 seconds for DDRescue-GUI to start updating.', 'DDRescue-GUI -- Information', wx.OK | wx.ICON_INFORMATION).ShowModal() 

                #Notify the user (Linux only).
                if Linux == 1:
                    subprocess.call(["notify-send", "'DDRescue-GUI'", "'The recovery is about to start...'", "-i", "/usr/share/pixmaps/ddrescue-gui.png"])

                #Use a busy mouse cursor.
                wx.BeginBusyCursor()

                #Disable and enable all necessary items.
                self.abortbutton.Enable()
                self.ViewOutputbutton.Enable()
                self.refreshbutton.Disable()
                self.startbutton.Disable()
                self.inputchoice.Disable()
                self.outputchoice.Disable()
                self.logfilechoice.Disable()
                self.menuAbout.Enable(False)
                self.menuExit.Enable(False) 
                self.menuDevInfo.Enable(False)
                self.menuPrefs.Enable(False)

                #Start the backend.
                StartBackend()
            else:
                wx.MessageDialog(self.MainPanel, 'Please set Input file, Log file and Output file correctly before starting!', 'DDRescue-GUI -- Error!', wx.OK | wx.ICON_ERROR).ShowModal()
                statusbar.SetStatusText("Ready.")  

    #The next functions are to update the display with info from the backend.
    def UpdateRecoveredInfo(self,msg):
        self.recovereddata.SetLabel("Recovered data: "+msg.data)

    def UpdateErrsizeInfo(self,msg):
        self.unreadabledata.SetLabel("Unreadable data: "+msg.data) 

    def UpdateReadRateInfo(self,msg):
        self.currentreadrate.SetLabel("Current read rate: "+msg.data)

    def UpdatenumerrorsInfo(self,msg):
        self.numerrors.SetLabel("Number of bad areas: "+msg.data)

    def UpdateavgReadRateInfo(self,msg):
        self.avgreadrate.SetLabel("Average read rate: "+msg.data)

    def UpdateTimeSinceLastReadInfo(self,msg):
        self.timesincelastread.SetLabel("Time since last sucessful read: "+msg.data)

    def UpdateTimeLeft(self,msg):
        self.timeleft.SetLabel("Remaining time: "+msg.data)

    def UpdateStatusbar(self,msg):
        global statusbar
        statusbar.SetStatusText(msg.data.replace('\n', ''))

    def ViewOutput(self,e):
        #Open a terminal to show ddrescue's output.
        if Linux == 1:
            self.ShowOutput =  subprocess.Popen(["x-terminal-emulator", "-e", "'"+ResPath+"/displayoutput.sh'", "--title='DDRescue-GUI: ddrescue output'",  "--hide-menubar"])
        else:
            self.ShowOutput = subprocess.Popen(['open', '-a', 'Terminal.app', ResPath+'/displayoutput.sh'])

    def OnAbort(self,e):
        #Ask ddrescue to exit.
        termddrescue = subprocess.Popen(["killall", "ddrescue"])

        #Disable abort and term output buttons.
        self.ViewOutputbutton.Disable()
        self.abortbutton.Disable()

        #Notify user with text.
        self.abortingtext = wx.StaticText(self.MainPanel, -1, "Aborting ddrescue. Please Wait...", pos=(270,230))

    def RecoveryFailed(self,e):
        wx.MessageDialog(None, 'DDRescue did not start within 12 seconds! The GUI will now be reset, and you will be taken back to the main window. Please check all of your settings, and try again. NB: Overwriting the output device is required when recovering to a device.', 'DDRescue-GUI -- Error!', wx.OK | wx.ICON_ERROR).ShowModal()

    def RecoveryEnded(self,e):
        #If abortingtext exists, remove it.
        try:
            self.abortingtext.Destroy()
        except: pass

        #Disable abort and term output buttons.
        self.ViewOutputbutton.Disable()
        self.abortbutton.Disable()

    	#Notify user (Linux only).
        if Linux == 1:
            subprocess.call(["notify-send",  "'DDRescue-GUI'", "'Recovery Finished!'", "-i", "/usr/share/pixmaps/ddrescue-gui.png"])    
        FinishedWindow().Show()

    def Reload(self,junk):
        global statusbar
        statusbar.SetStatusText("Restarting, please wait...")

        #End busy cursor.
        wx.EndBusyCursor()

        #Set everything back the way it was before
        self.refreshbutton.Enable()
        self.startbutton.Enable()
        self.inputchoice.Enable()
        self.outputchoice.Enable()
        self.logfilechoice.Enable()
        self.menuAbout.Enable(True)
        self.menuExit.Enable(True) 
        self.menuDevInfo.Enable(True)
        self.menuPrefs.Enable(True)

        #Reset text
        self.recovereddata.SetLabel("Recovered data: ")
        self.unreadabledata.SetLabel("Unreadable data: ")
        self.currentreadrate.SetLabel("Current read rate: ")
        self.numerrors.SetLabel("Number of bad areas: ")
        self.avgreadrate.SetLabel("Average read rate: ")
        self.timesincelastread.SetLabel("Time since last read: ")
        self.timeleft.SetLabel("Remaining time: ")

        #Remove the ProgressBar
        global ProgressBar
        ProgressBar.Hide()

        #Set input, output and log file selection to none
        global InputFileChosen
        InputFileChosen = "None"
        global OutputFileChosen
        OutputFileChosen = "None"
        global LogFileChosen
        LogFileChosen = "None"

        #Reset choice dialogs and set checkedsettings to False
        self.UpdateFileChoices("empty arg")

        #Sleep
        time.sleep(1)

        statusbar.SetStatusText("Ready.")

    def OnExit(self,e):
        #Check if DDRescue-GUI is recovering data.
        if RecoveringData == True:
            wx.MessageDialog(self.MainPanel, 'You are not allowed to exit the program while recovering data!', 'DDRescue-GUI -- Error!', wx.OK | wx.ICON_ERROR).ShowModal()
        else:
            exitdlg = wx.MessageDialog(self.MainPanel, 'Are you sure you want to exit?', 'DDRescue-GUI -- Question!', wx.YES_NO | wx.ICON_QUESTION).ShowModal()
            if exitdlg == wx.ID_YES:
                #Run the exit sequence
                if not os.path.exists("/tmp/ddrescue-gui"):
                    self.Destroy()  
                else:
                    shutil.rmtree('/tmp/ddrescue-gui')
                try:
                    if self.ShowOutput:
                        self.ShowOutput.kill()
                    self.Destroy()
                except:
                    self.Destroy()
            else:
                #Check if exit was initated by finisheddlg.
                if reqdexit == True:
                    #If so return to finisheddlg.
                    FinishedWindow().Show()

#End Main Window
#Begin Finshed Window
class FinishedWindow(wx.Frame):  
    def __init__(self):
        wx.Frame.__init__(self, wx.GetApp().TopWindow, title="DDRescue-GUI Finished!", size=(350,150), style=wx.DEFAULT_FRAME_STYLE ^ wx.RESIZE_BORDER)
        self.FinishedPanel=wx.Panel(self)
        
        #Change Status.
        global statusbar
        statusbar.SetStatusText("Finished!")

        self.CreateButtons()
        self.CreateText()
        self.BindEvents()
        
    def CreateButtons(self):
    	if Linux == 1:
    	    self.RestartButton = wx.Button(self.FinishedPanel, -1, "Restart", size=(70,30), pos=(30,110))
            self.MountButton = wx.Button(self.FinishedPanel, -1, "Mount", size=(70,30), pos=(140,110))
            self.QuitButton = wx.Button(self.FinishedPanel, -1, "Quit", size=(70,30), pos=(250,110))
        else:
    	    self.RestartButton = wx.Button(self.FinishedPanel, -1, "Restart", size=(70,30), pos=(30,100))
            self.MountButton = wx.Button(self.FinishedPanel, -1, "Mount", size=(70,30), pos=(140,100))
            self.QuitButton = wx.Button(self.FinishedPanel, -1, "Quit", size=(70,30), pos=(250,100))
            
    def CreateText(self):
        #Create some wx.Point objects to determine the position of the text.
        if Linux == 1:
            #Calculate length (in pixels) of string OutputFileChosen, and then where on the x-axis to place it.
            #This is a replacement for wx.ALIGN_CENTER, as it seems broken in Linux.
            font = self.FinishedPanel.GetFont()
            dc = wx.WindowDC(self.FinishedPanel)
            dc.SetFont(font)
            width, height = dc.GetTextExtent(OutputFileChosen)

            #Create some Points for the text, except for the Path Label
            PosforRecoveredDataLabel = wx.Point(85,10)
            wx.StaticText(self.FinishedPanel, -1, OutputFileChosen, pos=((350-int(width))/2,30), size=(330,15))
            PosforRestartLabel = wx.Point(65,50)
            PosforMountLabel = wx.Point(40,70)
            PosforQuitLabel = wx.Point(80,90)
        else:
            #Create some Points for the text, except for the Path Label
            PosforRecoveredDataLabel = wx.Point(85,3)
            wx.StaticText(self.FinishedPanel, -1, OutputFileChosen, pos=(0,23), size=(350,15), style=wx.ALIGN_CENTER)
            PosforRestartLabel = wx.Point(65,43)
            PosforMountLabel = wx.Point(40,63)
            PosforQuitLabel = wx.Point(80,83)

        wx.StaticText(self.FinishedPanel, -1, "Your recovered data is at:", pos=PosforRecoveredDataLabel)
        #Path label would be here.
        wx.StaticText(self.FinishedPanel, -1, "Click Restart to recover more data", pos=PosforRestartLabel)
        wx.StaticText(self.FinishedPanel, -1, "Click Mount to mount the image or device", pos=PosforMountLabel)
        wx.StaticText(self.FinishedPanel, -1, "Click Quit to exit the program", pos=PosforQuitLabel)

    def Restart(self,e):
        #Set this to false to prevent abnormalities.
        global reqdexit
        reqdexit = False

        wx.CallAfter(Publisher().sendMessage, "restart", "Restarting... Please wait.")
        self.Destroy()

    def MountFileorDev(self,e):
        #Call the mounter function.
        if InputFileChosen[0:5] == "/dev/":
            #Use different methods for OS X and Linux
            if Linux == 1:
                self.MountDevLinux()
            else:
                wx.MessageDialog(self.FinishedPanel, "Sorry, this feature is not yet supported on OS X.", "DDRescue-GUI - Information", style=wx.OK | wx.ICON_INFORMATION, pos=wx.DefaultPosition).ShowModal()
        else:
            wx.MessageDialog(self.FinishedPanel, "Sorry, as of version 1.3, mounting the finished image where the source was a file is not supported.", "DDRescue-GUI - Information", style=wx.OK | wx.ICON_INFORMATION, pos=wx.DefaultPosition).ShowModal()

    def MountDevLinux(self):
        #Create a temporary mountpoint.
        os.mkdir('/tmp/ddrescue-gui/mountpoint1')

        #Determine if inputfilechosen is a partition.
        if InputFileChosen[-1].isdigit():
            #The inputfile must be a partition.
            #Attempt to mount the partition.
            try:
                subprocess.check_output(['mount', OutputFileChosen, '/tmp/ddrescue-gui/mountpoint1'])
            except subprocess.CalledProcessError:
                #We probably need to specify the filesystem type.
                #Find it.
                fstype = subprocess.check_output(['blkid', '-o', 'value', OutputFileChosen]).split()[-1]

                #Run the mount command a second time.
                subprocess.check_output(['mount', '-t', fstype, OutputFileChosen, '/tmp/ddrescue-gui/mountpoint1'])
            
            #Call the unmount loop.
            self.UnmountImg(False)

        else:
            #The inputfile must NOT be a partition!
            #Get the list of contained partitions.
            global partitions
            partitions = subprocess.check_output(['kpartx', '-l', OutputFileChosen]).split('\n')
            
            #Show the partition selection Frame.
            subprocess.Popen([ResPath+'/PViewWindow.py', OutputFileChosen]).wait()

            with open('/tmp/ddrescue-gui/partitiontomount', 'r') as file:
                PartitionToMount = file.read().split()[0]

            if PartitionToMount != "None":
                #Create loop devices for all contained partitions.
                subprocess.check_output(['kpartx', '-a', OutputFileChosen])
                try:
                    #Get the partition wanted, and mount it.
                    subprocess.check_output(['mount', '/dev/mapper/'+PartitionToMount, '/tmp/ddrescue-gui/mountpoint1'])
                except subprocess.CalledProcessError:
                    #We probably need to specify the filesystem type.
                    #Find it.
                    fstype = subprocess.check_output(['blkid', '-o', 'value', '/dev/mapper/'+PartitionToMount]).split()[-1]
                    if fstype == "swap":
                        wx.MessageDialog(self.FinishedPanel, "You cannot mount a swap partition! Please select a new partition.", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
                        subprocess.check_output(['kpartx', '-d', OutputFileChosen])
                        os.rmdir("/tmp/ddrescue-gui/mountpoint1")

                    #Run the mount command a second time.
                    subprocess.check_output(['mount', '-t', fstype, '/dev/mapper/'+PartitionToMount, '/tmp/ddrescue-gui/mountpoint1'])
                
                #Call the Unmount loop.
                self.UnmountImg(True)

            else:
                wx.MessageDialog(self.FinishedPanel, "You chose to not mount any partitions on the image. You will now be brought back to the finsihing dialog.", "DDRescue-GUI - Information", style=wx.OK | wx.ICON_INFORMATION, pos=wx.DefaultPosition).ShowModal()
                os.rmdir("/tmp/ddrescue-gui/mountpoint1")              

    def UnmountImg(self,IsDevice):
        while os.path.exists('/tmp/ddrescue-gui/mountpoint1'):
            try:
                #Notify user.
                wx.MessageDialog(self.FinishedPanel, "Your image has been mounted at the temporary mount point '/tmp/ddrescue-gui/mountpoint1'. When you're finished with your image, close all programs accessing it, and click okay to unmount it.", "DDRescue-GUI - Information", style=wx.OK | wx.ICON_INFORMATION, pos=wx.DefaultPosition).ShowModal()

                #Now unmount the image.
                subprocess.check_output(['umount', '/tmp/ddrescue-gui/mountpoint1'])

                #Pull down loops if the InputFile was a device.
                if IsDevice == True:
                    subprocess.check_output(['kpartx', '-d', OutputFileChosen])

            except subprocess.CalledProcessError:
                wx.MessageDialog(self.FinishedPanel, "Your image could not be unmounted! Please insure no programs are still accessing it and try again.", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
            else:
                os.rmdir("/tmp/ddrescue-gui/mountpoint1")

    def CloseFinished(self,e):
        #Let the exit sequence know that the exit was initiated by finisheddlg.
        global reqdexit
        reqdexit = True

        self.Destroy()
        wx.CallAfter(Publisher().sendMessage, "exit", "Requested close...")

    def BindEvents(self):
        self.Bind(wx.EVT_BUTTON, self.Restart, self.RestartButton)
    	self.Bind(wx.EVT_BUTTON, self.MountFileorDev, self.MountButton)
        self.Bind(wx.EVT_BUTTON, self.CloseFinished, self.QuitButton)

#End Finished Window
#Begin Device Info Window
class DevInfoWindow(wx.Frame):
    def __init__(self):
        wx.Frame.__init__(self, wx.GetApp().TopWindow, title="DDRescue-GUI - Device Information", size=(400,310), style=wx.DEFAULT_FRAME_STYLE ^ wx.RESIZE_BORDER)
        self.DevInfoPanel=wx.Panel(self)

        #Update/Create Device Info
        self.UpdDevInfo("emptyarg")

        #Create other GUI elements.
        if Linux == 1:
            Posforokbutton = wx.Point(307,270)
            Posforrefreshbutton = wx.Point(10,270)
        else:
            Posforokbutton = wx.Point(315,255)
            Posforrefreshbutton = wx.Point(10,255)
            
        wx.StaticText(self.DevInfoPanel, -1, "Here are all the detected devices on your computer", (30,10))
        self.okbutton = wx.Button(self.DevInfoPanel, -1, "Okay", pos=Posforokbutton)
        self.refreshbutton = wx.Button(self.DevInfoPanel, -1, "Refresh", pos=Posforrefreshbutton)

        #Bind events
        self.Bind(wx.EVT_BUTTON, self.UpdDevInfo, self.refreshbutton)
        self.Bind(wx.EVT_BUTTON, self.ExitDevInfoDlg, self.okbutton)

    def UpdDevInfo(self,e):
        #Generate device data.
        devicelist = GetDevInfo()

        #Send update signal to mainwindow.
        wx.CallAfter(Publisher().sendMessage, "refresh", "clicked refresh")

        #Create/Update a list box.
        try:
            if Listbox:
                Listbox.Destroy()
        except NameError: pass
        finally:
            listbox = wx.ListBox(self.DevInfoPanel, -1, size=(380,220), pos=(10,30), choices=devicelist, style=wx.LB_SINGLE)   

    def ExitDevInfoDlg(self,e):
        self.Destroy()

#End Device Info Window
#Begin Preferences Window
class PreferencesWindow(wx.Frame):
    def __init__(self):
        wx.Frame.__init__(self, wx.GetApp().TopWindow, title="DDRescue-GUI - Preferences", size=(800,280), style=wx.DEFAULT_FRAME_STYLE ^ wx.RESIZE_BORDER)
        self.PrefsPanel=wx.Panel(self)

        # Notify MainWindow that this has been run.
        global checkedsettings
        checkedsettings = True

        self.CreateButtons()
        self.CreateText()
        self.CreateCBs()
        self.CreateChoiceBs()
        self.BindEvents()

    def CreateButtons(self):
        #Create preset settings for fast and best recovery.
        #Create some wx.Point objects.
        if Linux == 1:
            PosforFastRec = wx.Point(10, 144)
            PosforBastRec = wx.Point(10, 176)
            PosforDefaultRec = wx.Point(10, 208)
            Posforexit = wx.Point(10,240) 
        else:
            PosforFastRec = wx.Point(10, 144)
            PosforBastRec = wx.Point(10, 174)
            PosforDefaultRec = wx.Point(10, 204)
            Posforexit = wx.Point(10,234) 

        #Create the buttons.
        self.FastRecButton = wx.Button(self.PrefsPanel, -1, "Set to fastest recovery", pos=(10, 144), size=(250,30))
        self.BestRecButton = wx.Button(self.PrefsPanel, -1, "Set to best recovery", pos=(10, 174), size=(250,30))
        self.DefaultRecButton = wx.Button(self.PrefsPanel, -1, "Balanced (default)", pos=(10, 204), size=(250,30))
        self.exitbutton = wx.Button(self.PrefsPanel, -1, "Set settings and close", pos=(10,234), size=(250,30)) 


    def CreateText(self):
        # Create some Text
        wx.StaticText(self.PrefsPanel, -1, "Welcome to Preferences. You can now use preset settings to make recovering data even easier!", (10,15))
        badsecttext = wx.StaticText(self.PrefsPanel, -1, "No. of times to retry bad sectors:", (340, 40))
        maxerrstext = wx.StaticText(self.PrefsPanel, -1, "Maximum number of errors before exiting:", (340, 70))
        sectsizetext = wx.StaticText(self.PrefsPanel, -1, "Number of clusters to copy at a time:", (340,100))
        blcksizetext = wx.StaticText(self.PrefsPanel, -1, "Block (cluster) size of input device:", (340,130))

    def CreateCBs(self):
        # Create Some Checkboxes
        self.overwritecb = wx.CheckBox(self.PrefsPanel, -1, "Overwrite output device or partition", (10, 40), (290, 20))
        self.reversecb = wx.CheckBox(self.PrefsPanel, -1, "Read from finish to start (Reverse)", (10, 65), (290, 20))
        self.prealloccb = wx.CheckBox(self.PrefsPanel, -1, "Preallocate space on disc for output file", (10, 90), (310, 20))
        self.nosplitcb = wx.CheckBox(self.PrefsPanel, -1, "Do a soft run (don't read bad areas of disk)", (10,115), (315,20))

        # Set Checkbox's states (1 = enabled, 0 = disabled)
        self.overwritecb.SetValue(0)
        self.reversecb.SetValue(0)
        self.prealloccb.SetValue(0)
        self.nosplitcb.SetValue(0)

    def CreateChoiceBs(self):
        # Create Some Choiceboxes
        self.badsectchoice = wx.Choice(self.PrefsPanel, -1, (650, 32), choices=['0', '1', 'Default (2)', '3', '5', 'Forever'])  
        self.maxerrschoice = wx.Choice(self.PrefsPanel, -1, (650, 62), choices=['Default (Infinite)', '100', '50', '30', '10', '5'])
        self.clustsizechoice = wx.Choice(self.PrefsPanel, -1, (650, 92), choices=['256', 'Default (128)', '64', '32']) 
        self.blcksizechoice = wx.Choice(self.PrefsPanel, -1, (650, 122), choices=['Auto', '4096', '2048', '1024', '512'])

        # Set default settings
        self.DefaultRec(self)

    def SetSoftRun(self,e):
        #Manipulate the window to make sure this applies properly.
        if self.nosplitcb.IsChecked():
            self.badsectchoice.SetSelection(0)
            self.badsectchoice.Disable()
        else:
            self.badsectchoice.Enable()
            self.DefaultRec("emptyarg")

    def DefaultRec(self,e):
        # Set selections for the Choiceboxes (choices count up from 0)
        if self.badsectchoice.IsEnabled():
            self.badsectchoice.SetSelection(2)
        self.maxerrschoice.SetSelection(0)
        self.clustsizechoice.SetSelection(1)
        self.blcksizechoice.SetSelection(0)

    def FastRec(self,e):
        # Set selections for the Choiceboxes (choices count up from 0)
        if self.badsectchoice.IsEnabled():
            self.badsectchoice.SetSelection(0)
        self.maxerrschoice.SetSelection(2)
        self.clustsizechoice.SetSelection(0)
        self.blcksizechoice.SetSelection(0)

    def BestRec(self,e):
        # Set selections for the Choiceboxes (choices count up from 0)
        if self.badsectchoice.IsEnabled():
            self.badsectchoice.SetSelection(2)
        self.maxerrschoice.SetSelection(0)
        self.clustsizechoice.SetSelection(3)
        self.blcksizechoice.SetSelection(0)

    def BindEvents(self):
        #Bind all settingswindow events
        self.Bind(wx.EVT_BUTTON, self.SetCMDOptions, self.exitbutton)
        self.Bind(wx.EVT_BUTTON, self.FastRec, self.FastRecButton)
        self.Bind(wx.EVT_BUTTON, self.BestRec, self.BestRecButton)
        self.Bind(wx.EVT_BUTTON, self.DefaultRec, self.DefaultRecButton)
        self.Bind(wx.EVT_CHECKBOX, self.SetSoftRun, self.nosplitcb)
        self.Bind(wx.EVT_CLOSE, self.SetCMDOptions)

        #Counter for the exit loop
        self.AlreadyRun = 0

    def SetCMDOptions(self, event):
        #Set all ddrescue cmd-line options before closing the dialog
        print "Saving Options..."

        # Use a series of if and elif loops to set options:

        # Define global variables:
        global Overwrite
        global Reverse
        global Preallocate
        global Nosplit
        global Blocksize
        global Badsectretry
        global Readspeed
        global Maxerrors
        global Clustersize

        if self.overwritecb.IsChecked():
            #Warn user.
            checkdlg = wx.MessageDialog(self.PrefsPanel, 'Are you sure you want to overwrite the output file? This is only helpful if you selected a device to output to. Are you sure you want to enable this option?', 'DDRescue-GUI -- Warning!', wx.YES_NO | wx.ICON_WARNING).ShowModal()
            if checkdlg == wx.ID_YES:
                Overwrite = "--force"
                print "Overwriting output file..."
            else:
                Overwrite = ""
                print "Not overwriting output file..."
        else:
            Overwrite = ""
            print "Not overwriting output file..."

        if self.reversecb.IsChecked():
            Reverse = "-R"
            print "Set to reverse direction of all copy operations..."
        else:
            Reverse = ""
            print "Set to do all copy operations in normal direction..."
           
        if self.prealloccb.IsChecked():
            Preallocate = "-p"
            print "Set to preallocate disk space..."
        else:
            Preallocate = ""
            print "Set to not preallocate disk space..."
           
        if self.nosplitcb.IsChecked():
            Nosplit = "-n"
            print "Set to ignore bad areas of disk..."
        else:
            Nosplit = ""
            print "Set to split bad areas of disk..."

        # ChoiceBoxes:
        # Blocksize Choice:
        Blocksize = "-b "+self.blcksizechoice.GetStringSelection()

        # If set to auto, determine blocksize with a command.
        if Blocksize == "-b Auto":
           #Start a process to do this for us, waiting for it to finish.
           if Linux == 1:
               getblocksize = subprocess.Popen([ResPath+"/getblocksize.sh", "-l", "-d", InputFileChosen])
           else:
               getblocksize = subprocess.Popen([ResPath+"/getblocksize.sh", "-m", "-d", InputFileChosen])
           retcode = getblocksize.wait()
           #Set blocksize
           if retcode == 0:
               with open('/tmp/ddrescue-gui/devblocksize', 'r') as BlockSizeFile:
                   Blocksize = "-b "+BlockSizeFile.read().replace("\n","")
                   
                   #Provide compatibilty on Mac.
                   if Blocksize == "-b ":
                       Blocksize = ""
                       wx.MessageDialog(self.PrefsPanel, "DDRescue-GUI has detected that you're recovering from a file rather than a device, please check that this is okay. If not, reset your input file. Otherwise it's okay to continue.", "DDRescue-GUI - Warning!", style=wx.OK | wx.ICON_EXCLAMATION, pos=wx.DefaultPosition).ShowModal()
      
           else:
               Blocksize = ""
               #Input file is standard file, don't set blocksize, notify user.
               wx.MessageDialog(self.PrefsPanel, "DDRescue-GUI has detected that you're recovering from a file rather than a device, please check that this is okay. If not, reset your input file. Otherwise it's okay to continue.", "DDRescue-GUI - Warning!", style=wx.OK | wx.ICON_EXCLAMATION, pos=wx.DefaultPosition).ShowModal()

        print "Using "+Blocksize+" as blocksize"

        # No. of times to retry bad sectors:
        Badsectselection = self.badsectchoice.GetCurrentSelection()
        if Badsectselection == 2:
            Badsectretry = "-r 2"
            print "Set to retry bad sectors 2 times..."
        elif Badsectselection == 5:
            Badsectretry = "-r -1"
            print "Set to retry bad sectors forever..."
        else:
            Badsectretry = "-r "+str(Badsectselection)
            print "Set to retry bad sectors "+Badsectretry+" times..."

        # Set maximum errors before exiting:
        Maxerrsselection = self.maxerrschoice.GetStringSelection()
        if Maxerrsselection == "Default (Infinite)":
            Maxerrors = ""
            print "Set to allow an infinite number of errors before exiting..."
        else:
            Maxerrors = "-e "+Maxerrsselection
            print "Set to allow "+Maxerrors+" errors before exiting..."

        #No. of clusters to copy at a tme
        clustsizeselection = self.clustsizechoice.GetStringSelection()
        if clustsizeselection == "Default (128)":
            Clustersize = "-c 128"
            print "Set to copy 128 clusters at a time..."
        else:
            Clustersize = "-c "+clustsizeselection
            print "Set to copy "+Clustersize+" clusters at a time..."

        # Finally, exit
        print "Finished saving options..."
        print "Closing Preferences Window..."
        self.Destroy()

#End Preferences Window
#Begin Backend thread.
class StartBackend(Thread):
    def __init__(self):
        #Initialize and start the thread.
        Thread.__init__(self)
        self.start()

    def run(self):
        #Start ddrescue with shell=True, because this is the only way it works.
        if Linux == 1:
            ddrescuecommand = subprocess.Popen("bash "+ResPath+"/startddrescue.sh -l -o '-v "+Overwrite+" "+Reverse+" "+Preallocate+" "+Nosplit+" "+Blocksize+" "+Badsectretry+" "+Maxerrors+" "+Clustersize+" "+InputFileChosen+" "+OutputFileChosen+" "+LogFileChosen+"'", shell=True)
        else:
            ddrescuecommand = subprocess.Popen("bash "+ResPath+"/startddrescue.sh -m -o '-v "+Overwrite+" "+Reverse+" "+Preallocate+" "+Nosplit+" "+Blocksize+" "+Badsectretry+" "+Maxerrors+" "+Clustersize+" "+InputFileChosen+" "+OutputFileChosen+" "+LogFileChosen+"'", shell=True)

        #Ensure the exit sequence knows we are recovering data.
        global RecoveringData
        RecoveringData = True
        
        #Grab some useful initial data (amount of data), and unit (KB, MB, GB etc...). Use a try loop to correct errors.
        gotdata = "False"
        counter=12
        while gotdata == "False":
            time.sleep(1)
            self.GetInitStatus()
            if self.datatorecover != "unset" and self.unitfordatatorecover != "unset":
                gotdata = "True"
            else:
                counter-=1
                wx.CallAfter(Publisher().sendMessage, "statusbarupdate", "ddrescue not started yet. "+str(counter)+" seconds till abort...")
                if counter <= 0:
                    #Notify Main Window that the recovery failed.
                    wx.CallAfter(Publisher().sendMessage, "failed", "Recovery failed!")
                    
                    #Restart the GUI
                    RecoveringData = False
                    wx.CallAfter(Publisher().sendMessage, "restart", "Restarting... Please wait.")
                    self.exit()
                
        print "DDRescue is about to copy "+self.datatorecover+" "+self.unitfordatatorecover

        #Set progressbar's range.
        global ProgressBar
        ProgressBar.SetRange(int(self.datatorecover))

        while ddrescuecommand.poll() is None:
            #ddrescue is running.
            #Use a try loop to correct errors.
            try:
                self.GetData()
                ProgressBar.SetValue(int(self.recovereddatanum))
            except (ValueError,UnboundLocalError,TypeError):
                wx.CallAfter(Publisher().sendMessage, "statusbarupdate", "Unable to update the GUI. If this persists, please view terminal output instead.")
            else:
                #Update statusbar.
                wx.CallAfter(Publisher().sendMessage, "statusbarupdate", self.status)
                self.recovereddataunit = self.unitfordatatorecover
                #Send messages to GUI for updating.
                wx.CallAfter(Publisher().sendMessage, "recoveredupdate", str(self.recovereddatanum)+" "+self.recovereddataunit)
                wx.CallAfter(Publisher().sendMessage, "errsizeupdate", self.errsize)
                wx.CallAfter(Publisher().sendMessage, "readrateupdate", self.currentreadrate)
                wx.CallAfter(Publisher().sendMessage, "numerrsupdate", self.numerrors)
                wx.CallAfter(Publisher().sendMessage, "avgreadrateupdate", self.avgreadrate)
                wx.CallAfter(Publisher().sendMessage, "timesincelastreadupdate", self.timesincelastread)
                wx.CallAfter(Publisher().sendMessage, "timeleftupdate", self.timeremaining)
            #Always do this.
            finally:
                #Sleep for 1 second to keep in sync with ddrescue's updates.
                time.sleep(1)

        #Check if ddrescue is finished.
        if ddrescuecommand.poll() is not None:
            RecoveringData = False
            print "Recovery finished."
            wx.CallAfter(Publisher().sendMessage, "finished", "The recovery was successful.")

    def GetInitStatus(self):
        try:
            #Get the data.
            if Linux == 1:
                self.initdata = subprocess.check_output("cat /tmp/ddrescue-gui/ddrescueoutput.txt | grep 'About to copy'", shell=True).replace('\n', '').split()

                #Cut unneeded junk from this.
                self.unitfordatatorecover = ''.join(self.initdata[4])
                self.datatorecover = ''.join(self.initdata[3])
            else:
                try:
                    #Determine if InputFile is a device.
                    DevNode = str(InputFileChosen.split("/dev/")[1])
                except:
                    #If not, use ddrescue's disk size calculation.
                    self.initdata = subprocess.check_output("cat /tmp/ddrescue-gui/ddrescueoutput.txt | grep 'About to copy'", shell=True).replace('\n', '').split()

                    #Cut unneeded junk from this.
                    self.unitfordatatorecover = ''.join(self.initdata[4])
                    self.datatorecover = ''.join(self.initdata[3])
                else:
                   #If so, use Apple's disk utility with shell=True.
                   self.initdata = subprocess.check_output("diskutil list | grep -v 'TYPE' | grep "+DevNode+" | grep -v '/dev' | grep -v 's[0-9]'", shell=True).replace('\n', '').replace('*','').split()

                   #Cut unneeded junk from this.
                   self.unitfordatatorecover = ''.join(self.initdata[3])
                   self.datatorecover = ''.join(self.initdata[2]) 

            #If self.datatorecover <= 400, multiply by 1024 to make progressbar more accurate
            if float(self.datatorecover) <= 400:
                self.ShiftInitUnitsUp()

            #Get only the first 2 chars from the unitfordatatorecover to make it compatible with data conversion.
            self.unitfordatatorecover = self.unitfordatatorecover[:2]

        except subprocess.CalledProcessError:
            self.datatorecoverdata = "unset"
            self.datatorecover = "unset"
            self.unitfordatatorecoverdata = "unset"
            self.unitfordatatorecover = "unset"

    def ShiftInitUnitsUp(self):
        #Create a unitlist.
        unitlist=['null', 'B', 'kB', 'MB', 'GB', 'TB', 'PB']

        #Multiply by 1024 to shift self.datatorecover up one unit, and keep only the whole number.
        self.datatorecover = str(float(self.datatorecover)*1024)
        self.datatorecover,sep,junk = self.datatorecover.partition('.')

        #Shift unit down one place
        oldnumudtr = unitlist.index(self.unitfordatatorecover)
        newnumudtr = oldnumudtr-1
        self.unitfordatatorecover = unitlist[newnumudtr]

    def GetData(self):
        #Grab and preprocess (remove junk from) ddrescue's output. Then convert to a list.
        outputfile = subprocess.check_output(["tail", "-n", "5", "/tmp/ddrescue-gui/ddrescueoutput.txt"])
        ddrescueoutput = outputfile.replace('\r','')
        ddrescueoutput = ddrescueoutput.replace('\n',' ')
        junk, sep, trimmedddrescueoutput = ddrescueoutput.partition('\x1b[A\x1b[A\x1b[A')
        splitddrescueoutput = trimmedddrescueoutput.split()

        #Grab current amount (number), and unit of recovered data, removing also a commar.
        self.recovereddatanum = ''.join(splitddrescueoutput[1])
        self.recovereddataunit = ''.join(splitddrescueoutput[2]).replace(',','')

        #Convert recovereddatanum and round it.
        self.recovereddatanum = self.ConvertData(self.recovereddatanum,self.unitfordatatorecover,self.recovereddataunit,1000000,1000,False)
        self.recovereddatanum = round(self.recovereddatanum,3)

        #Grab size of unreadable data.
        self.errsize = ' '.join(splitddrescueoutput[4:6]).replace(',','')

        #Grab current read rate.
        self.currentreadrate = ' '.join(splitddrescueoutput[8:10])

        #Grab no. of errors.
        self.numerrors = ''.join(splitddrescueoutput[14]).replace(',','')

        #Grab average read rate.
        self.avgreadratenum = ''.join(splitddrescueoutput[17])
        self.avgreadrateunit = ''.join(splitddrescueoutput[18])
        self.avgreadrate = self.avgreadratenum+" "+self.avgreadrateunit
 
        #Grab time since last sucessful read. Includes fix for '1.2m' appearing as '12m'
        self.timesincelastread = ' '.join(splitddrescueoutput[27:29])

        #Get only the first 2 chars from the avgreadrateunit to make it compatible with data conversion.
        self.tmp = self.avgreadrateunit[:2]

        #Calculate time remaining. Included fix for negative numbers on OS X.
        self.timeremaining = self.CalculateTimeLeft()
        if self.timeremaining[0] == "-":
            self.timeremaining = "Nearly Finished..."

        #Create status.
        junk, sep, status = trimmedddrescueoutput.partition('time')
        status = status.split()
        self.status = ' '.join(status[6:])


    def ConvertData(self,datatoconvert,info1,info2,value1,value2,calcingtimeleft):
        #Method for converting data to work correctly with the GUI.
        #Create a unit list. Include 'B/' so the time remaining feature works when avg is (rather dismally!) below 10KB/s.
        if calcingtimeleft == True:
            unitlist = ['null', 'B/', 'kB', 'MB', 'GB', 'TB', 'PB']
        else:
            unitlist = ['null', 'B', 'kB', 'MB', 'GB', 'TB', 'PB']

        #Perform the actual conversion.
        numinfo1 = unitlist.index(info1)
        numinfo2 = unitlist.index(info2)
        unitnum = numinfo1 - numinfo2
        if unitnum == 2:
            return int(datatoconvert)/+value1
        elif unitnum == 1:
            return int(datatoconvert)/+value2
        elif unitnum == 0:
            return int(datatoconvert)
        elif unitnum == -1:
            return int(datatoconvert)*+value2
        elif unitnum == -2:
            return int(datatoconvert)*+value1

    def CalculateTimeLeft(self):
        #Create status for the statusbar, including remaining time.
        try:
            self.avgreadratenum = self.ConvertData(self.avgreadratenum,self.unitfordatatorecover,self.tmp,100000,1000,True)

            #Then perform the calculation and round it.
            calculationresult = float((int(self.datatorecover)-int(self.recovereddatanum))/int(self.avgreadratenum))

            #Convert between mins,hrs etc...
            if calculationresult <= 60:
                return str(round(calculationresult,1))+" seconds"
            elif calculationresult >= 60 and calculationresult <= 3600: 
                return str(round(calculationresult/60,1))+" minutes"
            elif calculationresult > 3600:
                return str(round(calculationresult/3600,2))+" hours"
        except: 
            return "Calculating..."

#End Backend thread
app = MyApp(False)
app.MainLoop()