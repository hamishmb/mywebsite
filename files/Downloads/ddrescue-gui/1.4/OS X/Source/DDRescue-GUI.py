#!/usr/bin/env python
# -*- coding: utf-8 -*- 
# DDRescue-GUI Main Script Version 1.4
# This file is part of DDRescue-GUI.
# Copyright (C) 2013-2015 Hamish McIntyre-Bhatty
# DDRescue-GUI is free software: you can redistribute it and/or modify it
# under the terms of the GNU General Public License version 3 or,
# at your option, any later version.
#
# DDRescue-GUI is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with DDRescue-GUI.  If not, see <http://www.gnu.org/licenses/>.

#Do future imports to prepare to support python 3. Use unicode strings rather than ASCII strings, as they fix potential problems.
from __future__ import absolute_import
from __future__ import division
from __future__ import print_function
from __future__ import unicode_literals

#Import other modules
import wx
from wx.animate import Animation
from wx.animate import AnimationCtrl
import wx.lib.stattext
import wx.lib.statbmp
import threading
import getopt
import logging
import time
import subprocess
import re
import os
import sys
import plistlib

#Define the version number and the release date as global variables.
Version = "1.4"
ReleaseDate = "31/7/2015"

def usage():
    print("\nUsage: DDRescue-GUI.py [OPTION]\n\n")
    print("Options:\n")
    print("       -h, --help:                   Show this help message")
    print("       -q, --quiet:                  Show only warnings, errors and critical errors in the log file. Very unhelpful for debugging, and not recommended.")
    print("       -v, --verbose:                Enable logging of info messages, as well as warnings, errors and critical errors.")
    print("                                     Not the best for debugging, but acceptable if there is little disk space.")
    print("       -d, --debug:                  Log lots of boring debug messages, as well as information, warnings, errors and critical errors. Usually used for diagnostic purposes.")
    print("                                     The default, as it's very helpful if problems are encountered, and the user needs help\n")
    print("DDRescue-GUI "+Version+" is released under the GNU GPL Version 3")
    print("Copyright (C) Hamish McIntyre-Bhatty 2013-2015")

#Determine if running on Linux or Mac.
if "wxGTK" in wx.PlatformInfo:
    #Set the resource path to /usr/share/ddrescue-gui/
    RescourcePath = '/usr/share/ddrescue-gui'
    Linux = True

elif "wxMac" in wx.PlatformInfo:
    try:
        #Set the resource path from an environment variable, as mac .apps can be found in various places.
        RescourcePath = os.environ['RESOURCEPATH']
    except KeyError:
        #Use '.' as the rescource path instead as a fallback.
        RescourcePath = "."

    Linux = False

#Check all cmdline options are valid.
try:
    opts, args = getopt.getopt(sys.argv[1:], "hqvd", ["help", "quiet", "verbose", "debug"])
except getopt.GetoptError as err:
    #Invalid option. Show the help message and then exit.
    #Show the error.
    print(unicode(err))
    usage()
    sys.exit(2)

#Determine the option(s) given, and change the level of logging based on cmdline options.
loggerLevel = logging.DEBUG

for o, a in opts:
    if o in ["-q", "--quiet"]:
        loggerLevel = logging.WARNING
    elif o in ["-v", "--verbose"]:
        loggerLevel = logging.INFO
    elif o in ["-d", "--debug"]:
        loggerLevel = logging.DEBUG
    elif o in ["-h", "--help"]:
        usage()
        sys.exit()
    else:
        assert False, "unhandled option"

#If we aren't running as root, relaunch immediately.
if os.geteuid() != 0:
    #Relaunch as root.
    execfile(RescourcePath+"/AuthenticationDialog.py")
    sys.exit("\nSorry, DDRescue-GUI must be run with root (superuser) privileges.\nRestarting as root...")

#Set up logging with default logging mode as debug.
logger = logging.getLogger('DDRescue-GUI 1.4')
logging.basicConfig(filename='/tmp/ddrescue-gui.log', format='%(asctime)s - %(name)s - %(levelname)s: %(message)s', datefmt='%d/%m/%Y %I:%M:%S %p')
logger.setLevel(loggerLevel)

#Log which OS we're running on (helpful for debugging).
if Linux:
    logger.debug("Detected Linux...")
else:
    logger.debug("Detected Mac OS X...")

#Import custom-made modules
import GetDevInfo
import Tools

from GetDevInfo.getdevinfo import Main as DevInfoTools
from Tools.tools import Main as BackendTools

#Setup custom-made modules (make global variables accessible inside the packages).
GetDevInfo.getdevinfo.subprocess = subprocess
GetDevInfo.getdevinfo.re = re
GetDevInfo.getdevinfo.logger = logger
GetDevInfo.getdevinfo.Linux = Linux

Tools.tools.os = os
Tools.tools.subprocess = subprocess
Tools.tools.logger = logger
Tools.tools.time = time
Tools.tools.Linux = Linux

#Begin Disk Information Handler thread.
class GetDiskInformation(threading.Thread):
    def __init__(self, ParentWindow):
        """Initialize and start the thread."""
        self.ParentWindow = ParentWindow
        threading.Thread.__init__(self)
        self.start()

    def run(self):
        """Get Disk Information and return it as a list with embedded lists"""
        #Use a module I've written to collect data about connected Disks, and return it.
        wx.CallAfter(self.ParentWindow.ReceiveDiskInfo, DevInfoTools().GetInfo())

#End Disk Information Handler thread.
#Starter Class
class MyApp(wx.App):
    def OnInit(self):
        Splash = ShowSplash()
        Splash.Show()
        return True

    def MacReopenApp(self):
        """Called when the doc icon is clicked, shows the top-level window again even if it's minimised"""
        self.GetTopWindow().Raise()

#End Starter Class
#Begin splash screen
class ShowSplash(wx.SplashScreen):
    def __init__(self, parent=None):
        """Prepare and display a splash screen"""
        #Convert the image to a bitmap.
        Splash = wx.Image(name = RescourcePath+"/images/ddgoestotherescue.jpg").ConvertToBitmap()

        self.AlreadyExited = False

        #Display the splash screen.
        wx.SplashScreen.__init__(self, Splash, wx.SPLASH_CENTRE_ON_SCREEN | wx.SPLASH_TIMEOUT, 1500, parent)
        self.Bind(wx.EVT_CLOSE, self.OnExit)

        #Make sure it's painted, which fixes the problem with the previous tempramental splash screen.
        wx.Yield()

    def OnExit(self, Event=None):
        """Close the splash screen and start MainWindow"""
        self.Hide()

        if self.AlreadyExited == False:
            #Stop this from executing twice when the splash is clicked.
            self.AlreadyExited = True
            MainFrame = MainWindow()
            app.SetTopWindow(MainFrame)
            MainFrame.Show(True)

            #Skip handling the event so the main frame starts.
            Event.Skip()

#End splash screen
#Begin Main Window   
class MainWindow(wx.Frame):
    def __init__(self):
        """Initialize MainWindow"""
        wx.Frame.__init__(self, None, title="DDRescue-GUI", size=(936,360), style=wx.DEFAULT_FRAME_STYLE)
        self.MainPanel = wx.Panel(self)
        self.SetClientSize(wx.Size(936,360))

        print("DDRescue-GUI Version 1.4 Starting...")
        logger.info("DDRescue-GUI Version 1.4 Starting...")
        logger.info("Release date: "+ReleaseDate)
        logger.info("Running on Python version: "+unicode(sys.version_info)+"...")
        logger.info("Running on wxPython version: "+wx.version()+"...")

        #Set the frame's icon.
        global AppIcon
        AppIcon = wx.Icon(RescourcePath+"/images/Logo.png", wx.BITMAP_TYPE_PNG)
        wx.Frame.SetIcon(self, AppIcon)

        #Set some variables
        logger.debug("MainWindow().__init__(): Setting some essential variables...")
        self.SetVars()
        self.Starting = True

        #Create a Statusbar in the bottom of the window and set the text.
        logger.debug("MainWindow().__init__(): Creating Status Bar...")
        self.MakeStatusBar()

        #Add text
        logger.debug("MainWindow().__init__(): Creating text...")
        self.CreateText()

        #Create some buttons
        logger.debug("MainWindow().__init__(): Creating buttons...")
        self.CreateButtons()

        #Create the choiceboxes.
        logger.debug("MainWindow().__init__(): Creating choiceboxes...")
        self.CreateChoiceBoxes()

        #Create other widgets.
        logger.debug("MainWindow().__init__(): Creating all other widgets...")
        self.CreateOtherWidgets()

        #Create the menus.
        logger.debug("MainWindow().__init__(): Creating menus...")
        self.CreateMenus()

        #Update the Disk info.
        logger.debug("MainWindow().__init__(): Updating Disk info...")
        self.GetDiskInfo()

        #Set up sizers.
        logger.debug("MainWindow().__init__(): Setting up sizers...")
        self.SetupSizers()

        #Bind all events.
        logger.debug("MainWindow().__init__(): Binding events...")
        self.BindEvents()

        #Make sure the window is displayed properly.
        self.OnDetailedInfo()
        self.OnTerminalOutput()
        self.ListCtrl.SetColumnWidth(0, 150)

        #Call Layout() on self.MainPanel() to ensure it displays properly.
        self.MainPanel.Layout()

        logger.info("MainWindow().__init__(): Ready. Waiting for events...")

    def SetVars(self):
        """Set some essential variables"""
        #Globals.
        global InputFile
        global OutputFile
        global LogFile
        global RecoveringData
        global CheckedSettings
        RecoveringData = False
        CheckedSettings = False
        InputFile = None
        OutputFile = None
        LogFile = ""

        #Local to this function.
        self.AbortedRecovery = False
        self.RunTimeSecs = 0

        #Set the wildcards and make it easy for the user to find his/her home directory (helps make DDRescue-GUI more user friendly).
        if Linux:
            self.InputWildcard = "SATA HDDs/USB Drives|sd*|IDE/ATA HDDs|hd*|Optical Drives|sr*|Floppy Drives|fd*|IMG Disk Image (*.img)|*.img|ISO (CD/DVD) Disk Image (*.iso)|*.iso|All Files/Disks (*)|*"
            self.OutputWildcard = "IMG Disk Image (*.img)|*.img|ISO (CD/DVD) Disk Image (*.iso)|*.iso|SATA HDDs/USB Drives|sd*|IDE/ATA HDDs|hd*|Floppy Drives|fd*|All Files/Disks (*)|*"
            self.UserHomeDir = "/home"

        else:
            self.InputWildcard = "Disk Drives|disk*|IMG Disk Image (*.img)|*.img|DMG Disk Image (*.dmg)|*.dmg|ISO (CD/DVD) Disk Image (*.iso)|*.iso|All Files/Disks (*)|*"
            self.OutputWildcard = "IMG Disk Image (*.img)|*.img|DMG Disk Image (*.dmg)|*.dmg|ISO (CD/DVD) Disk Image (*.iso)|*.iso|All Files/Disks (*)|*"
            self.UserHomeDir = "/Users"

    def MakeStatusBar(self):
        """Create and set up a statusbar"""
        self.StatusBar = self.CreateStatusBar()
        self.StatusBar.SetFieldsCount(2)
        self.StatusBar.SetStatusWidths([-1, 150])
        self.StatusBar.SetStatusText("Ready.", 0)
        self.StatusBar.SetStatusText("v"+Version+" ("+ReleaseDate+")", 1)

    def CreateText(self):
        """Create all text for MainWindow"""
        self.TitleText = wx.StaticText(self.MainPanel, -1, "Welcome to DDRescue-GUI!")
        self.InputText = wx.StaticText(self.MainPanel, -1, "Image Source:")
        self.LogFileText = wx.StaticText(self.MainPanel, -1, "Log File:")
        self.OutputText = wx.StaticText(self.MainPanel, -1, "Image Destination:") 

        #Also create special text for showing and hiding recovery info and terminal output.
        self.DetailedInfoText = wx.lib.stattext.GenStaticText(self.MainPanel, -1, "Detailed Info")
        self.TerminalOutputText = wx.lib.stattext.GenStaticText(self.MainPanel, -1, "Terminal Output")

        #And some text for basic recovery information.
        self.TimeElapsedText = wx.StaticText(self.MainPanel, -1, "Time Elapsed:")
        self.TimeRemainingText = wx.StaticText(self.MainPanel, -1, "Estimated Time Remaining:")

    def CreateButtons(self):
        """Create all buttons for MainWindow"""
        self.SettingsButton = wx.Button(self.MainPanel, -1, "Settings")
        self.UpdateDiskInfoButton = wx.Button(self.MainPanel, -1, "Update Disk Info")          
        self.ShowDiskInfoButton = wx.Button(self.MainPanel, -1, "Disk Information")
        self.ControlButton = wx.Button(self.MainPanel, -1, "Start")

    def CreateChoiceBoxes(self):
        """Create all choiceboxes for MainWindow"""
        self.InputChoiceBox = wx.Choice(self.MainPanel, -1, choices=['-- Please Select --', 'Select a File/Disk'])
        self.LogChoiceBox = wx.Choice(self.MainPanel, -1, choices=['-- Please Select --', 'Select a File', 'None (not supported)'])
        self.OutputChoiceBox = wx.Choice(self.MainPanel, -1, choices=['-- Please Select --', 'Select a File/Disk'])

        #Set the default value.
        self.InputChoiceBox.SetStringSelection("-- Please Select --")
        self.LogChoiceBox.SetStringSelection("-- Please Select --")
        self.OutputChoiceBox.SetStringSelection("-- Please Select --")

        #Log files aren't supported on OS X.
        self.LogChoiceBox.SetStringSelection("None (not supported)")
        self.LogChoiceBox.Disable()

    def CreateOtherWidgets(self):
        """Create all other widgets for MainWindow"""
        #Create the animation for the throbber.
        throb = wx.animate.Animation(RescourcePath+"/images/Throbber.gif")
        self.Throbber = wx.animate.AnimationCtrl(self.MainPanel, -1, throb)
        self.Throbber.SetUseWindowBackgroundColour(True)
        self.Throbber.SetInactiveBitmap(wx.Bitmap(RescourcePath+"/images/ThrobberRest.png", wx.BITMAP_TYPE_PNG))
        self.Throbber.SetClientSize(wx.Size(30,30))

        #Create the list control for the detailed info.
        self.ListCtrl = wx.ListCtrl(self.MainPanel, -1, style=wx.LC_REPORT|wx.BORDER_SUNKEN|wx.LC_VRULES)
        self.ListCtrl.InsertColumn(col=0, heading="Category", format=wx.LIST_FORMAT_CENTRE, width=150)
        self.ListCtrl.InsertColumn(col=1, heading="Value", format=wx.LIST_FORMAT_CENTRE, width=-1)

        #Create a text control for terminal output.
        self.OutputBox = wx.TextCtrl(self.MainPanel, -1, "", style=wx.TE_MULTILINE|wx.TE_READONLY|wx.TE_WORDWRAP)
        self.OutputBox.SetBackgroundColour((0,0,0))
        self.OutputBox.SetDefaultStyle(wx.TextAttr(wx.WHITE))

        #Create the arrows.
        img1 = wx.Image(RescourcePath+"/images/ArrowDown.png", wx.BITMAP_TYPE_PNG)
        img2 = wx.Image(RescourcePath+"/images/ArrowRight.png", wx.BITMAP_TYPE_PNG)
        self.DownArrowImage = wx.BitmapFromImage(img1)
        self.RightArrowImage = wx.BitmapFromImage(img2)

        self.Arrow1 = wx.lib.statbmp.GenStaticBitmap(self.MainPanel, -1, self.DownArrowImage)
        self.Arrow2 = wx.lib.statbmp.GenStaticBitmap(self.MainPanel, -1, self.DownArrowImage)

        #Create the progress bar.
        self.ProgressBar = wx.Gauge(self.MainPanel, -1, 5000)

        #Create a timer to count elapsed time.
        self.Timer = wx.Timer(self)

    def SetupSizers(self):
        """Setup sizers for MainWindow"""
        #Make the main boxsizer.
        MainSizer = wx.BoxSizer(wx.VERTICAL)

        #Make the file choices sizer.
        FileChoicesSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Make the input sizer.
        InputSizer = wx.BoxSizer(wx.VERTICAL)

        #Add items to the input sizer.
        InputSizer.Add(self.InputText, 1, wx.TOP|wx.BOTTOM|wx.ALIGN_CENTER, 10)
        InputSizer.Add(self.InputChoiceBox, 1, wx.BOTTOM|wx.ALIGN_CENTER, 10)

        #Make the log sizer.
        LogSizer = wx.BoxSizer(wx.VERTICAL)

        #Add items to the log sizer.
        LogSizer.Add(self.LogFileText, 1, wx.TOP|wx.BOTTOM|wx.ALIGN_CENTER, 10)
        LogSizer.Add(self.LogChoiceBox, 1, wx.BOTTOM|wx.ALIGN_CENTER, 10)

        #Make the output sizer.
        OutputSizer = wx.BoxSizer(wx.VERTICAL)

        #Add items to the output sizer.
        OutputSizer.Add(self.OutputText, 1, wx.TOP|wx.BOTTOM|wx.ALIGN_CENTER, 10)
        OutputSizer.Add(self.OutputChoiceBox, 1, wx.BOTTOM|wx.ALIGN_CENTER, 10)

        #Add items to the file choices sizer.
        FileChoicesSizer.Add(InputSizer, 1, wx.ALIGN_CENTER)
        FileChoicesSizer.Add(LogSizer, 1, wx.ALIGN_CENTER)
        FileChoicesSizer.Add(OutputSizer, 1, wx.ALIGN_CENTER)

        #Make the button sizer.
        ButtonSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Add items to the button sizer.
        ButtonSizer.Add(self.SettingsButton, 1, wx.RIGHT|wx.ALIGN_CENTER|wx.EXPAND, 10)
        ButtonSizer.Add(self.UpdateDiskInfoButton, 1, wx.ALIGN_CENTER|wx.EXPAND, 10)
        ButtonSizer.Add(self.ShowDiskInfoButton, 1, wx.LEFT|wx.ALIGN_CENTER|wx.EXPAND, 10)

        #Make the throbber sizer.
        ThrobberSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Add items to the throbber sizer.
        ThrobberSizer.Add(self.Arrow1, 0, wx.LEFT|wx.ALIGN_LEFT|wx.ALIGN_CENTER_VERTICAL, 10)
        ThrobberSizer.Add(self.DetailedInfoText, 1, wx.LEFT|wx.ALIGN_LEFT|wx.ALIGN_CENTER_VERTICAL, 10)
        ThrobberSizer.Add(self.Throbber, 0, wx.LEFT|wx.RIGHT|wx.ALIGN_CENTER|wx.ALIGN_CENTER_VERTICAL|wx.FIXED_MINSIZE, 10)
        ThrobberSizer.Add(self.Arrow2, 0, wx.RIGHT|wx.ALIGN_RIGHT|wx.ALIGN_CENTER_VERTICAL, 10)
        ThrobberSizer.Add(self.TerminalOutputText, 1, wx.RIGHT|wx.ALIGN_RIGHT|wx.ALIGN_CENTER_VERTICAL, 10)

        #Make the info sizer.
        self.InfoSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Add items to the info sizer.
        self.InfoSizer.Add(self.ListCtrl, 1, wx.RIGHT|wx.LEFT|wx.ALIGN_CENTER|wx.EXPAND, 22)
        self.InfoSizer.Add(self.OutputBox, 1, wx.RIGHT|wx.LEFT|wx.ALIGN_CENTER|wx.EXPAND, 22)

        #Make the info text sizer.
        InfoTextSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Add items to the info text sizer.
        InfoTextSizer.Add(self.TimeElapsedText, 1, wx.RIGHT|wx.ALIGN_CENTER, 22)
        InfoTextSizer.Add(self.TimeRemainingText, 1, wx.LEFT|wx.ALIGN_CENTER, 22)

        #Arrow1 is horizontal when starting, so hide self.ListCtrl.
        self.InfoSizer.Detach(self.ListCtrl)
        self.ListCtrl.Hide()

        #Arrow2 is horizontal when starting, so hide self.OutputBox.
        self.InfoSizer.Detach(self.OutputBox)
        self.OutputBox.Hide()

        #Insert some empty space. (Fixes a GUI bug in wxpython > 2.8.11.1)
        self.InfoSizer.Add((1,1), 1, wx.EXPAND)

        #Make the progress sizer.
        self.ProgressSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Add items to the progress sizer.
        self.ProgressSizer.Add(self.ProgressBar, 1, wx.ALL|wx.ALIGN_CENTER, 10)
        self.ProgressSizer.Add(self.ControlButton, 0, wx.ALL|wx.ALIGN_RIGHT, 10)

        #Add items to the main sizer.
        MainSizer.Add(self.TitleText, 0, wx.TOP|wx.ALIGN_CENTER, 10)
        MainSizer.Add(wx.StaticLine(self.MainPanel), 0, wx.ALL|wx.EXPAND, 10)
        MainSizer.Add(FileChoicesSizer, 0, wx.ALL|wx.ALIGN_CENTER|wx.EXPAND, 10)
        MainSizer.Add(wx.StaticLine(self.MainPanel), 0, wx.ALL|wx.EXPAND, 10)
        MainSizer.Add(ButtonSizer, 0, wx.ALL|wx.ALIGN_CENTER|wx.EXPAND, 10)
        MainSizer.Add(wx.StaticLine(self.MainPanel), 0, wx.TOP|wx.EXPAND, 10)
        MainSizer.Add(ThrobberSizer, 0, wx.ALL|wx.ALIGN_CENTER|wx.EXPAND, 5)
        MainSizer.Add(self.InfoSizer, 1, wx.TOP|wx.BOTTOM|wx.ALIGN_CENTER|wx.EXPAND, 10)
        MainSizer.Add(InfoTextSizer, 0, wx.ALL|wx.ALIGN_CENTER|wx.EXPAND, 10)
        MainSizer.Add(self.ProgressSizer, 0, wx.TOP|wx.BOTTOM|wx.ALIGN_CENTER|wx.EXPAND, 10)

        #Get the sizer set up for the frame.
        self.MainPanel.SetSizer(MainSizer)
        MainSizer.SetMinSize(wx.Size(936,360))
        MainSizer.SetSizeHints(self)

    def CreateMenus(self):
        """Create the menus"""
        FileMenu = wx.Menu()
        EditMenu = wx.Menu()
        ViewMenu = wx.Menu()
        HelpMenu = wx.Menu() 
   
        #Add Menu Items.
        self.MenuExit = FileMenu.Append(wx.ID_ANY, "&Quit", "Close DDRescue-GUI")
        self.MenuSettings = EditMenu.Append(wx.ID_ANY, "&Settings", "Recovery settings")
        self.MenuDiskInfo = ViewMenu.Append(wx.ID_ANY,"&Disk Information", "Information about all detected Disks")
        self.MenuPrivacyPolicy = ViewMenu.Append(wx.ID_ANY,"&Privacy Policy", "View DDRescue-GUI's privacy policy")
        self.MenuAbout = HelpMenu.Append(wx.ID_ANY, "&About DDRescue-GUI", "Information about DDRescue-GUI")

        #Creating the menubar.
        self.MenuBar = wx.MenuBar()

        #Adding menus to the MenuBar
        self.MenuBar.Append(FileMenu,"&File")
        self.MenuBar.Append(EditMenu,"&Edit")
        self.MenuBar.Append(ViewMenu,"&View")
        self.MenuBar.Append(HelpMenu,"&Help")

        #Adding the MenuBar to the Frame content.
        self.SetMenuBar(self.MenuBar)

    def BindEvents(self): 
        """Bind all events for MainWindow"""
        #Menus.
        self.Bind(wx.EVT_MENU, self.ShowSettings, self.MenuSettings)
        self.Bind(wx.EVT_MENU, self.OnAbout, self.MenuAbout)
        self.Bind(wx.EVT_MENU, self.ShowDevInfo, self.MenuDiskInfo)
        self.Bind(wx.EVT_MENU, self.ShowPrivacyPolicy, self.MenuPrivacyPolicy)

        #Choiceboxes.
        self.Bind(wx.EVT_CHOICE, self.SetInputFile, self.InputChoiceBox)
        self.Bind(wx.EVT_CHOICE, self.SetOutputFile, self.OutputChoiceBox)
        self.Bind(wx.EVT_CHOICE, self.SetLogFile, self.LogChoiceBox)

        #Buttons.
        self.Bind(wx.EVT_BUTTON, self.OnControlButton, self.ControlButton)
        self.Bind(wx.EVT_BUTTON, self.GetDiskInfo, self.UpdateDiskInfoButton)
        self.Bind(wx.EVT_BUTTON, self.ShowSettings, self.SettingsButton)
        self.Bind(wx.EVT_BUTTON, self.ShowDevInfo, self.ShowDiskInfoButton)

        #Text.
        self.DetailedInfoText.Bind(wx.EVT_LEFT_DOWN, self.OnDetailedInfo)
        self.TerminalOutputText.Bind(wx.EVT_LEFT_DOWN, self.OnTerminalOutput)

        #Images.
        self.Arrow1.Bind(wx.EVT_LEFT_DOWN, self.OnDetailedInfo)
        self.Arrow2.Bind(wx.EVT_LEFT_DOWN, self.OnTerminalOutput)

        #Size events.
        self.Bind(wx.EVT_SIZE, self.OnSize)

        #Timer event.
        self.Bind(wx.EVT_TIMER, self.UpdateElapsedTime, self.Timer)

        #OnExit events.        
        self.Bind(wx.EVT_MENU, self.OnExit, self.MenuExit)
        self.Bind(wx.EVT_CLOSE, self.OnExit)

    def OnSize(self, Event=None):
        """Auto resize the ListCtrl columns"""
        #Force the width and height of the ListCtrl to be the right size, as the sizer won't shrink it on wxpython > 2.8.12.1.
        #Get the width and height of the frame.
        Width, Height = self.GetClientSizeTuple()

        #Calculate the correct width for the ListCtrl.
        if self.OutputBox.IsShown():
            ListCtrlWidth = (Width - 88)//2
        else:
            ListCtrlWidth = (Width - 44)

        #Set the size.
        self.ListCtrl.SetColumnWidth(1, ListCtrlWidth - 150)
        self.ListCtrl.SetClientSize(wx.Size(ListCtrlWidth, 240))

        if Event != None:
            Event.Skip()

    def OnDetailedInfo(self, Event=None):
        """Show/Hide the detailed info, and rotate the arrow"""
        #Get the width and height of the frame.
        Width, Height = self.GetClientSizeTuple()

        if self.ListCtrl.IsShown() or self.Starting:
            self.Arrow1.SetBitmap(self.RightArrowImage)

            #Arrow1 is now horizontal, so hide self.ListCtrl.
            self.InfoSizer.Detach(self.ListCtrl)
            self.ListCtrl.Hide()

            if self.OutputBox.IsShown() == False:
                self.SetClientSize(wx.Size(Width,360))
                #Insert some empty space.
                self.InfoSizer.Add((1,1), 1, wx.EXPAND)

        else:
            self.Arrow1.SetBitmap(self.DownArrowImage)

            #Arrow1 is now vertical, so show self.ListCtrl2
            if self.OutputBox.IsShown() == False:
                #Remove the empty space.
                self.InfoSizer.Clear()

            self.InfoSizer.Insert(0, self.ListCtrl, 1, wx.RIGHT|wx.LEFT|wx.ALIGN_CENTER|wx.EXPAND, 22)
            self.ListCtrl.Show()

            self.SetClientSize(wx.Size(Width,600))

        #Call Layout() on self.MainPanel() and self.OnSize() to ensure it displays properly.
        self.OnSize()
        self.MainPanel.Layout()

    def OnTerminalOutput(self, Event=None):
        """Show/Hide the terminal output, and rotate the arrow"""
        #Get the width and height of the frame.
        Width, Height = self.GetClientSizeTuple()

        if self.OutputBox.IsShown() or self.Starting:
            self.Arrow2.SetBitmap(self.RightArrowImage)

            #Arrow2 is now horizontal, so hide self.OutputBox.
            self.InfoSizer.Detach(self.OutputBox)
            self.OutputBox.Hide()

            if self.ListCtrl.IsShown() == False:
                self.SetClientSize(wx.Size(Width,360))
                #Insert some empty space.
                self.InfoSizer.Add((1,1), 1, wx.EXPAND)

        else:
            self.Arrow2.SetBitmap(self.DownArrowImage)

            #Arrow2 is now vertical, so show self.OutputBox.
            if self.ListCtrl.IsShown():
                self.InfoSizer.Insert(1, self.OutputBox, 1, wx.RIGHT|wx.LEFT|wx.ALIGN_CENTER|wx.EXPAND, 22)

            else:
                #Remove the empty space.
                self.InfoSizer.Clear()
                self.InfoSizer.Insert(0, self.OutputBox, 1, wx.RIGHT|wx.LEFT|wx.ALIGN_CENTER|wx.EXPAND, 22)

            self.OutputBox.Show()
            self.SetClientSize(wx.Size(Width,600))

        #Call Layout() on self.MainPanel() and self.OnSize to ensure it displays properly.
        self.OnSize()
        self.MainPanel.Layout()

    def GetDiskInfo(self, Event=None):
        """Call the thread to get Disk info, disable the update button, and start the throbber"""
        logger.info("MainWindow().GetDiskInfo(): Getting new Disk information...")
        self.UpdateStatusBar("Getting new Disk information... Please wait...")

        #Disable stuff to prevent problems.
        self.SettingsButton.Disable()
        self.UpdateDiskInfoButton.Disable()
        self.ShowDiskInfoButton.Disable()
        self.InputChoiceBox.Disable()
        self.OutputChoiceBox.Disable()
        self.MenuDiskInfo.Enable(False)
        self.MenuSettings.Enable(False)

        #Call the thread and get the throbber going.
        GetDiskInformation(self)
        self.Throbber.Play()

    def ReceiveDiskInfo(self, Info):
        """Get new Disk info and to call the function that updates the choiceboxes"""
        logger.info("MainWindow().ReceiveDiskInfo(): Getting new Disk information...")
        global DiskInfo
        DiskInfo = Info

        #Update the file choices.
        self.UpdateFileChoices()
        self.Starting = False

        #Stop the throbber and enable stuff again.
        self.Throbber.Stop()

        self.SettingsButton.Enable()
        self.UpdateDiskInfoButton.Enable()
        self.ShowDiskInfoButton.Enable()
        self.InputChoiceBox.Enable()
        self.OutputChoiceBox.Enable()
        self.MenuDiskInfo.Enable()
        self.MenuSettings.Enable()

    def UpdateFileChoices(self):
        """Update the Disk entries in the choiceboxes"""
        logger.info("MainWindow().UpdateFileChoices(): Updating the GUI with the new Disk information...")

        #Grab the Disk list from the other Disk info.
        DiskList = DiskInfo[0]

        if self.Starting:
            #We are starting up, so do some extra stuff.
            #Prepare some choiceboxes using the newly created Disk list.
            logger.info("MainWindow().UpdateFileChoices(): Preparing choiceboxes...")

            #Make note that there are no custom selections yet, because we haven't even finished the startup routine yet!
            self.CustomInputPathsList = []
            self.CustomOutputPathsList = []

        #Keep the user's current selections and any custom paths added to the choiceboxes while we update them.
        logger.info("MainWindow().UpdateFileChoices(): Updating choiceboxes...")

        #Grab Current selection.
        CurrentInputStringSelection = self.InputChoiceBox.GetStringSelection()
        CurrentOutputStringSelection = self.OutputChoiceBox.GetStringSelection()

        #Set all the items.
        self.InputChoiceBox.SetItems(['-- Please Select --', 'Select a File/Disk'] + sorted(DiskList + self.CustomInputPathsList))
        self.OutputChoiceBox.SetItems(['-- Please Select --', 'Select a File/Disk'] + sorted(DiskList + self.CustomOutputPathsList))

        #Set the current selections again, if we can (if the selection is a Disk, it may have been removed).
        if self.InputChoiceBox.FindString(CurrentInputStringSelection) != -1:
            self.InputChoiceBox.SetStringSelection(CurrentInputStringSelection)

        else:
            self.InputChoiceBox.SetStringSelection('-- Please Select --')

        if self.OutputChoiceBox.FindString(CurrentOutputStringSelection) != -1:
            self.OutputChoiceBox.SetStringSelection(CurrentOutputStringSelection)

        else:
            self.OutputChoiceBox.SetStringSelection('-- Please Select --')

        #Notify the user with the statusbar.
        self.UpdateStatusBar("Ready.")

    def SetInputFile(self, Event=None):
        """Get the input file/Disk and set a variable to the selected value"""
        logger.debug("MainWindow().SelectInputFile(): Getting user selection...")
        global InputFile
        InputFile = self.InputChoiceBox.GetStringSelection()

        if InputFile == "Select a File/Disk":
            InputFileDlg = wx.FileDialog(self.MainPanel, "Select Input File/Disk...", defaultDir="/dev", wildcard=self.InputWildcard, style=wx.OPEN)

            #Change the default dir on OS X.
            if Linux == False:
                InputFileDlg.SetDirectory("/Users")

            if InputFileDlg.ShowModal() == wx.ID_OK:
                InputFile = InputFileDlg.GetPath()
                logger.info("MainWindow().SelectInputFile(): User selected custom file: "+InputFile+"...")
                self.CustomInputPathsList.append(InputFile)
                self.InputChoiceBox.Append(InputFile)
                self.InputChoiceBox.SetStringSelection(InputFile)

            else:
                logger.info("MainWindow().SelectInputFile(): User declined custom file selection. Resetting InputFile...")
                InputFile = None
                self.InputChoiceBox.SetStringSelection("-- Please Select --")

        elif InputFile not in [None, "-- Please Select --"] and InputFile == OutputFile:
            logger.warning("MainWindow().SelectInputFile(): InputFile equals OutputFile!, resetting to None and warning user...")
            wx.MessageDialog(self.MainPanel, "You can't use the same disk/file as both the source and the destination!", 'DDRescue-GUI - Error!', wx.OK | wx.ICON_ERROR).ShowModal()
            InputFile = None
            self.InputChoiceBox.SetStringSelection("-- Please Select --")

        elif InputFile == "-- Please Select --":
            logger.info("MainWindow().SelectInputFile(): Input file reset..")
            InputFile = None

    def SetOutputFile(self, Event=None):
        """Get the output file/Disk and set a variable to the selected value"""
        logger.debug("MainWindow().SelectOutputFile(): Getting user selection...")
        global OutputFile
        OutputFile = self.OutputChoiceBox.GetStringSelection()

        if OutputFile == "Select a File/Disk":
            OutputFileDlg = wx.FileDialog(self.MainPanel, "Select Output File/Disk...", defaultDir=self.UserHomeDir, wildcard=self.OutputWildcard, style=wx.SAVE)

            if OutputFileDlg.ShowModal() == wx.ID_OK:
                OutputFile = OutputFileDlg.GetPath()
                logger.info("MainWindow().SelectOutputFile(): User selected custom file: "+OutputFile+"...")
                self.CustomOutputPathsList.append(OutputFile)
                self.OutputChoiceBox.Append(OutputFile)
                self.OutputChoiceBox.SetStringSelection(OutputFile)

            else:
                logger.info("MainWindow().SelectOutputFile(): User declined custom file selection. Resetting OutputFile...")
                OutputFile = None
                self.OutputChoiceBox.SetStringSelection("-- Please Select --")

        elif OutputFile not in [None, "-- Please Select --"] and OutputFile == InputFile:
            logger.warning("MainWindow().SelectOutputFile(): OutputFile equals InputFile!, resetting to None and warning user...")
            wx.MessageDialog(self.MainPanel, "You can't use the same Disk/file as both the source and the destination!", 'DDRescue-GUI - Error!', wx.OK | wx.ICON_ERROR).ShowModal()
            OutputFile = None
            self.OutputChoiceBox.SetStringSelection("-- Please Select --")

        elif OutputFile == "-- Please Select --":
            logger.debug("MainWindow().SelectInputFile(): Output file reset...")
            OutputFile = None

        #Check with the user if the output file already exists.
        if OutputFile != None:
            if os.path.exists(OutputFile):
                logger.info("MainWindow().SelectInputFile(): Selected file already exists! Showing warning to user...")
                Dlg = wx.MessageDialog(self.MainPanel, "The file you selected already exists!\n\nIf you're doing a two-stage recovery, *and* you've selected a logfile, DDRescue-GUI will resume where it left off on the previous run, and it is safe to continue.\n\nOtherwise, you will lose data on this file or device.\n\nPlease be sure you selected the right file. Do you want to accept this file as your output file?", 'DDRescue-GUI -- Warning!', wx.YES_NO | wx.ICON_EXCLAMATION)

                if Dlg.ShowModal() == wx.ID_YES:
                    logger.warning("MainWindow().SelectOutputFile(): Accepted already-present file as output file!")

                else:
                    logger.info("MainWindow().SelectOutputFile(): User declined the selection. Resetting OutputFile...")
                    OutputFile = None
                    self.OutputChoiceBox.SetStringSelection("-- Please Select --")

        #If the file selected is a Disk, ask the user to enable the option labeled 'Overwrite output Disk or partition' in the settings window.
        if OutputFile != None:
            if OutputFile[0:5] == "/dev/":
                wx.MessageDialog(self.MainPanel, "You have selected a Disk to recover to rather than an image, so please enable the option labeled 'Overwrite output Disk or partition' in the settings window.", 'DDRescue-GUI -- Information', wx.OK | wx.ICON_INFORMATION).ShowModal()

    def SetLogFile(self, Event=None):
        """Get the log file position/name and set a variable to the selected value"""
        logger.debug("MainWindow().SelectLogFile(): Getting user selection...")
        global LogFile
        LogFile = self.LogChoiceBox.GetStringSelection()

        if LogFile == "None (not supported)":
            Dlg = wx.MessageDialog(self.MainPanel, "You have not chosen to use a log file. If you do not use one, you will have to start from scratch in the event of a power outage, or if DDRescue-GUI is interrupted. Additionally, you can't do a two-stage recovery without a log file.\n\nAre you really sure you do not want to use a logfile?", "DDRescue-GUI - Warning", wx.YES_NO | wx.ICON_EXCLAMATION).ShowModal()

            if Dlg == wx.ID_YES:
                logger.warning("MainWindow().SelectLogFile(): User isn't using a log file, despite our warning!")
                LogFile = ""

            else:
                logger.info("MainWindow().SelectLogFile(): User decided against not using a log file. Good!")
                LogFile = None
                self.LogChoiceBox.SetStringSelection("-- Please Select --")

        elif LogFile == "Select a File":
            LogFileDlg = wx.FileDialog(self.MainPanel, "Select Log File Position & Name...", defaultDir=self.UserHomeDir, wildcard="Log Files (*.log)|*.log", style=wx.SAVE)

            if LogFileDlg.ShowModal() == wx.ID_OK:
                LogFile = LogFileDlg.GetPath()
                logger.debug("MainWindow().SelectLogFile(): User selected custom file: "+LogFile+"...")
                self.LogChoiceBox.Append(LogFile)
                self.LogChoiceBox.SetStringSelection(LogFile)

            else:
                logger.debug("MainWindow().SelectLogFile(): User declined custom file selection. Resetting LogFile...")
                LogFile = None
                self.LogChoiceBox.SetStringSelection("-- Please Select --")

        elif LogFile == "-- Please Select --":
            logger.debug("MainWindow().SelectLogFile(): LogFile reset.")
            LogFile = None

    def OnAbout(self, Event=None):
        """Show the about box"""
        logger.debug("MainWindow().OnAbout(): Showing about box...")
        aboutbox = wx.AboutDialogInfo()
        aboutbox.SetIcon(AppIcon)
        aboutbox.Name = "DDRescue-GUI"
        aboutbox.Version = Version
        aboutbox.Copyright = "(C) 2013-2015 Hamish McIntyre-Bhatty"
        aboutbox.Description = "GUI frontend for GNU ddrescue"
        aboutbox.WebSite = ("https://launchpad.net/ddrescue-gui", "Launchpad page")
        aboutbox.Developers = ["Hamish McIntyre-Bhatty", "Minnie McIntyre-Bhatty (GUI Design)"]
        aboutbox.Artists = ["Holly McIntyre-Bhatty", "Hamish McIntyre-Bhatty (Throbber designs)"]
        aboutbox.License = "DDRescue-GUI is free software: you can redistribute it and/or modify it\nunder the terms of the GNU General Public License version 3 or,\nat your option, any later version.\n\nDDRescue-GUI is distributed in the hope that it will be useful,\nbut WITHOUT ANY WARRANTY; without even the implied warranty of\nMERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the\nGNU General Public License for more details.\n\nYou should have received a copy of the GNU General Public License\nalong with DDRescue-GUI.  If not, see <http://www.gnu.org/licenses/>.\n\nGNU ddrescue is released under the GPLv2, may be redistributed under\nthe terms of the GPLv2 or newer, and bundled with the Mac OS X\nversion of DDRescue-GUI, but I am NOT the author of GNU ddrescue.\n\nFor more information on GNU ddrescue, visit\nhttps://www.gnu.org/software/ddrescue/ddrescue.html"

        #Show the about box
        wx.AboutBox(aboutbox)

    def ShowSettings(self, Event=None):
        """Show the Settings Window"""
        #If input and output files are set (do not equal None) then continue.
        if None not in [InputFile, OutputFile]:
            SettingsWindow(self).Show()

        else:
            wx.MessageDialog(self.MainPanel, 'Please select input and output files first!', 'DDRescue-GUI - Error!', wx.OK | wx.ICON_ERROR).ShowModal()

    def ShowDevInfo(self, Event=None):
        """Show the Disk Information Window"""
        DevInfoWindow(self).Show()

    def ShowPrivacyPolicy(self, Event=None):
        """Show PrivPolWindow"""
        PrivPolWindow(self).Show()

    def OnControlButton(self, Event=None):
        """Handle events from the control button, as its purpose changes during and after recovery. Call self.OnAbort() or self.OnStart() as required."""
        if RecoveringData:
            self.OnAbort()

        else:
            self.OnStart()

    def OnStart(self):
        """Check the settings, prepare to start ddrescue and start the backend thread"""
        logger.info("MainWindow().OnStart(): Checking settings...")
        self.UpdateStatusBar("Preparing to start ddrescue...")

        if CheckedSettings == False:
            logger.error("MainWindow().OnStart(): The settings haven't been checked properly! Aborting recovery...")
            wx.MessageDialog(self.MainPanel, "Please check the settings before starting the recovery.", "DDRescue-GUI - Warning", wx.OK | wx.ICON_EXCLAMATION).ShowModal()
            self.UpdateStatusBar("Ready.")

        elif None not in [InputFile, LogFile, OutputFile]:
            #Attempt to unmount input/output Disks now, if needed.
            logger.info("MainWindow().OnStart(): Unmounting input and output files if needed...")

            for Disk in [InputFile, OutputFile]:
                if BackendTools().GetDiskMountPoint(Disk) != None or DevInfoTools().IsPartition(Disk, DiskInfo[0]) == False:
                    #The Disk is mounted.
                    logger.info("MainWindow().OnStart(): Unmounting "+Disk+"...")
                    self.UpdateStatusBar("Unmounting "+Disk+". This may take a few moments...")
                    wx.Yield()

                    if DevInfoTools().IsPartition(Disk, DiskInfo[0]):
                        #Unmount it.
                        logger.debug("MainWindow().OnStart(): "+Disk+" is a partition. Unmounting "+Disk+"...")
                        Retval = BackendTools().UnmountDisk(Disk)

                    else:
                        #Unmount any partitions belonging to the device.
                        logger.debug("MainWindow().OnStart(): "+Disk+" is a device. Unmounting any partitions contained by "+Disk+"...")
                        Retvals = []
                        Retval = 0

                        for Partition in DevInfoTools().GetPartitions(Disk, DiskInfo[0]):
                            logger.info("MainWindow().OnStart(): Unmounting "+Partition+"...")
                            Retvals.append(BackendTools().UnmountDisk(Partition))

                        #Check the return values, and raise an error if any of them aren't 0.
                        for Integer in Retvals:
                            if Integer != 0:
                                Retval = Integer
                                break

                    #Check it worked.
                    if Retval != 0:
                        #It didn't. Warn the user, and exit the function.
                        logger.info("MainWindow().OnStart(): Failed! Warning user...")
                        wx.MessageDialog(self.MainPanel, "Could not unmount disk "+Disk+"! Please close all other programs and anything that may be accessing this disk (or any of its partitions), and try again.", "DDRescue-GUI - Error!", wx.OK | wx.ICON_ERROR).ShowModal()
                        self.UpdateStatusBar("Ready.")
                        return 0

                    else:
                        logger.info("MainWindow().OnStart(): Success...")

                else:
                    logger.info("MainWindow().OnStart(): "+Disk+" is not mounted...")

            #Create the items for self.ListCtrl.
            Width, Height = self.ListCtrl.GetClientSizeTuple()

            #First column.
            self.ListCtrl.InsertStringItem(index=0, label="Recovered Data")
            self.ListCtrl.InsertStringItem(index=1, label="Unreadable Data")
            self.ListCtrl.InsertStringItem(index=2, label="Current Read Rate")
            self.ListCtrl.InsertStringItem(index=3, label="Average Read Rate")
            self.ListCtrl.InsertStringItem(index=4, label="Bad Sectors")
            self.ListCtrl.InsertStringItem(index=5, label="Input Position")
            self.ListCtrl.InsertStringItem(index=6, label="Output Position")
            self.ListCtrl.InsertStringItem(index=7, label="Time Since Last Read")
            self.ListCtrl.SetColumnWidth(0, 150)

            #Second column.
            self.ListCtrl.SetStringItem(index=0, col=1, label="Unknown")
            self.ListCtrl.SetStringItem(index=1, col=1, label="Unknown")
            self.ListCtrl.SetStringItem(index=2, col=1, label="Unknown")
            self.ListCtrl.SetStringItem(index=3, col=1, label="Unknown")
            self.ListCtrl.SetStringItem(index=4, col=1, label="Unknown")
            self.ListCtrl.SetStringItem(index=5, col=1, label="Unknown")
            self.ListCtrl.SetStringItem(index=6, col=1, label="Unknown")
            self.ListCtrl.SetStringItem(index=7, col=1, label="Unknown")
            self.ListCtrl.SetColumnWidth(1, Width - 150)

            logger.info("MainWindow().OnStart(): Settings check complete. Starting BackendThread()...")
            self.UpdateStatusBar("Starting ddrescue...")
            wx.Yield()

            #Notify the user (Linux only).
            if Linux:
                BackendTools().StartProcess(Command="notify-send 'DDRescue-GUI' 'The recovery is about to start...' -i /usr/share/pixmaps/ddrescue-gui.png", ReturnOutput=False)

            #Disable and enable all necessary items.
            self.SettingsButton.Disable()
            self.UpdateDiskInfoButton.Disable()
            self.InputChoiceBox.Disable()
            self.OutputChoiceBox.Disable()
            self.LogChoiceBox.Disable()
            self.MenuAbout.Enable(False)
            self.MenuExit.Enable(False) 
            self.MenuDiskInfo.Enable(False)
            self.MenuSettings.Enable(False)
            self.ControlButton.SetLabel("Abort")

            #Start the timer.
            self.Timer.Start(1000)

            #Start the backend thread.
            BackendThread(self)

        else:
            logger.error("MainWindow().OnStart(): One or more of InputFIle, OutputFile or LogFile hasn't been set! Aborting Recovery...")
            wx.MessageDialog(self.MainPanel, 'Please set the Input file, Log file and Output file correctly before starting!', 'DDRescue-GUI - Error!', wx.OK | wx.ICON_ERROR).ShowModal()
            self.UpdateStatusBar("Ready.")

    #The next functions are to update the display with info from the backend.
    def SetProgressBarRange(self, Message):
        """Set the progressbar's range""" 
        logger.debug("MainWindow().SetProgressBarRange(): Setting range "+unicode(Message)+" for self.ProgressBar...")
        self.ProgressBar.SetRange(Message)

    def UpdateLine1Info(self, Recovered, Errsize, ReadRate):
        """Update the items that display info on the current amount of recovered data, unreadable data, and the current read rate"""
        self.ListCtrl.SetStringItem(index=0, col=1, label=Recovered)
        self.ListCtrl.SetStringItem(index=1, col=1, label=Errsize)
        self.ListCtrl.SetStringItem(index=2, col=1, label=ReadRate)

    def UpdateLine2Info(self, IPos, AvgReadRate, NumErrs, TimeLeft):
        """Update the items that display info on the current input position, average read rate, number of errors, and time remaining"""
        self.ListCtrl.SetStringItem(index=5, col=1, label=IPos)
        self.ListCtrl.SetStringItem(index=3, col=1, label=AvgReadRate)
        self.ListCtrl.SetStringItem(index=4, col=1, label=NumErrs)
        self.TimeRemainingText.SetLabel("Time Remaining: "+TimeLeft)

    def UpdateLine3Info(self, OPos, LastRead):
        """Update the items that display info on the current output position, and the time since the last successful read"""
        self.ListCtrl.SetStringItem(index=6, col=1, label=OPos)
        self.ListCtrl.SetStringItem(index=7, col=1, label=LastRead)

    def UpdateOutputBox(self, Line):
        """Update the output box"""
        #Check if we need to remove old lines (this avoids a memory leak).
        if self.OutputBox.GetNumberOfLines() > 30:
             FirstLine = self.OutputBox.GetLineLength(0)+1
             self.OutputBox.Remove(0, FirstLine)

        self.OutputBox.AppendText(Line)

    def UpdateElapsedTime(self, Event=None):
        self.RunTimeSecs += 1

        #Convert between Seconds, Minutes, Hours, and Days to make the value as understandable as possible.
        if self.RunTimeSecs <= 60:
            RunTime = self.RunTimeSecs
            Unit = " seconds"

        elif self.RunTimeSecs >= 60 and self.RunTimeSecs <= 3600: 
            RunTime = self.RunTimeSecs//60
            Unit = " minutes"

        elif self.RunTimeSecs > 3600 and self.RunTimeSecs <= 86400:
            RunTime = round(self.RunTimeSecs/3600,2)
            Unit = " hours"

        elif self.RunTimeSecs > 86400:
            RunTime = round(self.RunTimeSecs/86400,2)
            Unit = " days"

        #Update the text.
        self.TimeElapsedText.SetLabel("Time Elapsed: "+unicode(RunTime)+Unit)

    def UpdateStatusBar(self, Message):
        """Update the statusbar with a new message"""
        logger.debug("MainWindow().UpdateStatusBar(): New status bar message: "+Message)
        self.StatusBar.SetStatusText(Message, 0)

    def UpdateProgress(self, RecoveredData, DiskCapacity):
        """Update the progressbar and the title"""
        self.ProgressBar.SetValue(RecoveredData)
        self.SetTitle("DDRescue-GUI - "+unicode(int(RecoveredData * 100 // DiskCapacity))+"%")

    def OnAbort(self):
        """Abort the recovery"""
        #Ask ddrescue to exit.
        logger.info("MainWindow().OnAbort(): Attempting to kill ddrescue...")
        BackendTools().StartProcess("killall ddrescue")
        self.AbortedRecovery = True

        #Disable control button.
        self.ControlButton.Disable()

        #Notify user with throbber.
        self.Throbber.Play()

    def RecoveryEnded(self, Result, ReturnCode=None):
        """Called to show FinishedWindow when a recovery is completed or aborted by the user"""
        #Stop the timer and the throbber.
        self.Timer.Stop()
        self.Throbber.Stop()

        #Handle any errors.
        if self.AbortedRecovery:
            logger.info("MainWindow().RecoveryEnded(): ddrescue was aborted by the user...")
            #Notify user (Linux only).
            if Linux:
                BackendTools().StartProcess(Command="notify-send 'DDRescue-GUI' 'Recovery Aborted by user.' -i /usr/share/pixmaps/ddrescue-gui.png", ReturnOutput=False)

            wx.MessageDialog(self.MainPanel, "Your recovery has been aborted as you requested.\n\nNote: Your recovered data may be incomplete at this point, so you may now want to run a second recovery to try and grab the remaining data. If you wish to, you may now use DDRescue-GUI to mount your destination drive/file so you can access your data, although some/all of it may be unreadable in its current state.", "DDRescue-GUI - Information", wx.OK | wx.ICON_INFORMATION).ShowModal()

        elif Result == "NoInitialStatus":
            logger.error("MainWindow().RecoveryEnded(): We didn't get ddrescue's initial status! This probably means ddrescue aborted immediately. Maybe settings are incorrect?")

            #Notify user (Linux only).
            if Linux:
                BackendTools().StartProcess(Command="notify-send 'DDRescue-GUI' 'Recovery Error! ddrescue aborted immediately. See the GUI for more details.' -i /usr/share/pixmaps/ddrescue-gui.png", ReturnOutput=True)

            wx.MessageDialog(self.MainPanel, "We didn't get ddrescue's initial status! This probably means ddrescue aborted immediately. Please check all of your settings, and try again. Note: Overwriting the output Disk is required when recovering to a Disk.", "DDRescue-GUI - Error!", wx.OK | wx.ICON_ERROR).ShowModal()

        elif Result == "BadReturnCode":
            logger.error("MainWindow().RecoveryEnded(): ddrescue exited with nonzero exit status "+unicode(ReturnCode)+"! Perhaps the output file/disk is full?")

            #Notify user (Linux only).
            if Linux:
                BackendTools().StartProcess(Command="notify-send 'DDRescue-GUI' 'Recovery Error! ddrescue exited with exit status "+unicode(ReturnCode)+"!' -i /usr/share/pixmaps/ddrescue-gui.png", ReturnOutput=False)

            wx.MessageDialog(self.MainPanel, "Ddrescue exited with nonzero exit status "+unicode(ReturnCode)+"! Perhaps the output file/disk is full? Please check all of your settings, and try again.", "DDRescue-GUI - Error!", wx.OK | wx.ICON_ERROR).ShowModal()

        elif Result == "Success":
            logger.info("MainWindow().RecoveryEnded(): Recovery finished!")

            #Check if we got all the data.
            if self.ProgressBar.GetValue() >= self.ProgressBar.GetRange():
                Message = "Your recovery is complete, with all data recovered from your source disk/file.\n\nNote: If you wish to, you may now use DDRescue-GUI to mount your destination drive/file so you can access your data."
                #Notify user (Linux only).
                if Linux:
                    BackendTools().StartProcess(Command="notify-send 'DDRescue-GUI' 'Recovery Finished with all data!' -i /usr/share/pixmaps/ddrescue-gui.png", ReturnOutput=False)

            else:
                Message = "Your recovery is finished, but not all of your data appears to have been recovered. You may now want to run a second recovery to try and grab the remaining data. If you wish to, you may now use DDRescue-GUI to mount your destination drive/file so you can access your data, although some/all of it may be unreadable in its current state.\n\nNote: If you are running OS X, and the progress bar looks full, your recovery may indeed be complete, as there is a slight rounding issue when obtaining disk sizes on OS X."

                #Notify user (Linux only).
                if Linux:
                    BackendTools().StartProcess(Command="notify-send 'DDRescue-GUI' 'Recovery Finished, but not all data was recovered' -i /usr/share/pixmaps/ddrescue-gui.png", ReturnOutput=False)

            wx.MessageDialog(self.MainPanel, Message, "DDRescue-GUI - Information", wx.OK | wx.ICON_INFORMATION).ShowModal()

        #Disable the control button.
        self.ControlButton.Disable()

        FinishedWindow(self).Show()

    def Reload(self):
        """Reload and reset MainWindow, so MainWindow is as it was when DDRescue-GUI was started""" 
        logger.info("MainWindow().Reload(): Reloading and resetting MainWindow...")
        self.UpdateStatusBar("Restarting, please wait...")

        #Set everything back the way it was before
        self.SetTitle("DDRescue-GUI")
        self.UpdateDiskInfoButton.Enable()
        self.ControlButton.Enable()
        self.SettingsButton.Enable()
        self.InputChoiceBox.Enable()
        self.OutputChoiceBox.Enable()
        self.LogChoiceBox.Disable()
        self.MenuAbout.Enable(True)
        self.MenuExit.Enable(True) 
        self.MenuDiskInfo.Enable(True)
        self.MenuSettings.Enable(True)

        #Reset recovery information.
        self.OutputBox.Clear()
        self.ListCtrl.ClearAll()
        self.ListCtrl.InsertColumn(col=0, heading="Category", format=wx.LIST_FORMAT_CENTRE, width=-1)
        self.ListCtrl.InsertColumn(col=1, heading="Value", format=wx.LIST_FORMAT_CENTRE, width=-1)
        self.ControlButton.SetLabel("Start")
        self.TimeRemainingText.SetLabel("Time Remaining:")
        self.TimeElapsedText.SetLabel("Time Elapsed:")

        #Reset the ProgressBar
        self.ProgressBar.SetValue(0)

        #Reset essential variables.
        self.SetVars()

        #Update choice dialogs and reset checked settings to False
        self.UpdateFileChoices()

        #Reset the choice dialogs.
        self.InputChoiceBox.SetStringSelection("-- Please Select --")
        self.OutputChoiceBox.SetStringSelection("-- Please Select --")
        self.LogChoiceBox.SetStringSelection("None (not supported)")

        #Get new Disk info.
        self.GetDiskInfo()

        logger.info("MainWindow().Reload(): Done. Waiting for events...")
        self.UpdateStatusBar("Ready.")

    def OnExit(self, Event=None, JustFinishedRec=False):
        """Exit DDRescue-GUI, if certain conditions are met"""
        logger.info("MainWindow().OnExit(): Preparing to exit...")

        #Check if DDRescue-GUI is recovering data.
        if RecoveringData:
            logger.error("MainWindow().OnExit(): Can't exit while recovering data! Aborting exit attempt...")
            wx.MessageDialog(self.MainPanel, "You can't exit DDRescue-GUI while recovering data!", "DDRescue-GUI - Error!", wx.OK | wx.ICON_ERROR).ShowModal()

        else:
            logger.info("MainWindow().OnExit(): Double-checking the exit attempt with the user...")
            dlg = wx.MessageDialog(self.MainPanel, 'Are you sure you want to exit?', 'DDRescue-GUI - Question!', wx.YES_NO | wx.ICON_QUESTION).ShowModal()

            if dlg == wx.ID_YES:
                #Run the exit sequence
                logger.info("MainWindow().OnExit(): Exiting...")

                #Destroy the Timer.
                self.Timer.Destroy()

                #Shutdown the logger.
                logging.shutdown()

                #Prompt user to save the log file.
                dlg = wx.MessageDialog(self.MainPanel, "Do you want to keep DDRescue-GUI's log file? For privacy reasons, DDRescue-GUI will delete its log file when closing. If you want to save it, which is helpful for debugging if something went wrong, click yes, and otherwise click no.", "DDRescue-GUI - Question", style=wx.YES_NO | wx.ICON_QUESTION, pos=wx.DefaultPosition)

                if dlg.ShowModal() == wx.ID_YES:
                    #Ask the user where to save it.
                    Dlg = wx.FileDialog(self.MainPanel, "Save log file to...", defaultDir=self.UserHomeDir, wildcard="Log Files (*.log)|*.log" , style=wx.SAVE)

                    if Dlg.ShowModal() == wx.ID_OK:
                        #Get the path.
                        File = Dlg.GetPath()

                        #Copy it to the specified path, using a one-liner, and don't bother handling any errors, because this is run as root.
                        BackendTools().StartProcess(Command="cp /tmp/ddrescue-gui.log "+File, ReturnOutput=False)

                        wx.MessageDialog(self.MainPanel, 'Done! DDRescue-GUI will now exit.', 'DDRescue-GUI - Information', wx.OK | wx.ICON_INFORMATION).ShowModal()

                    else:
                        wx.MessageDialog(self.MainPanel, 'Okay, DDRescue-GUI will now exit without saving the log file.', 'DDRescue-GUI - Information', wx.OK | wx.ICON_INFORMATION).ShowModal()

                else:
                    wx.MessageDialog(self.MainPanel, 'Okay, DDRescue-GUI will now exit without saving the log file.', 'DDRescue-GUI - Information', wx.OK | wx.ICON_INFORMATION).ShowModal()

                #Delete the log file, and don't bother handling any errors, because this is run as root.
                os.remove('/tmp/ddrescue-gui.log')

                self.Destroy()

            else:
                #Check if exit was initated by finisheddlg.
                logger.warning("MainWindow().OnExit(): User cancelled exit attempt! Aborting exit attempt...")
                if JustFinishedRec:
                    #If so return to finisheddlg.
                    logger.info("MainWindow().OnExit(): Showing FinishedWindow() again...")
                    FinishedWindow(self).Show()

#End Main Window
#Begin Disk Info Window
class DevInfoWindow(wx.Frame):
    def __init__(self,ParentWindow):
        """Initialize DevInfoWindow"""
        wx.Frame.__init__(self, wx.GetApp().TopWindow, title="DDRescue-GUI - Disk Information", size=(780,310), style=wx.DEFAULT_FRAME_STYLE)
        self.DevInfoPanel=wx.Panel(self)
        self.SetClientSize(wx.Size(780,310))
        self.ParentWindow = ParentWindow
        wx.Frame.SetIcon(self, AppIcon)

        logger.debug("DevInfoWindow().__init__(): Creating widgets...")
        self.CreateWidgets()

        logger.debug("DevInfoWindow().__init__(): Setting up sizers...")
        self.SetupSizers()

        logger.debug("DevInfoWindow().__init__(): Binding events...")
        self.BindEvents()

        #Use already-present info for the list ctrl if possible.
        if 'DiskInfo' in globals():
            logger.debug("DevInfoWindow().__init__(): Updating list ctrl with Disk info already present...")
            self.UpdateListCtrl()

        #Call Layout() on self.DevInfoPanel() to ensure it displays properly.
        self.DevInfoPanel.Layout()

        logger.info("DevInfoWindow().__init__(): Ready. Waiting for events...")

    def CreateWidgets(self):
        """Create all widgets for DevInfoWindow"""
        self.TitleText = wx.StaticText(self.DevInfoPanel, -1, "Here are all the detected disks on your computer")
        self.ListCtrl = wx.ListCtrl(self.DevInfoPanel, -1, style=wx.LC_REPORT|wx.LC_VRULES)
        self.OkayButton = wx.Button(self.DevInfoPanel, -1, "Okay")
        self.RefreshButton = wx.Button(self.DevInfoPanel, -1, "Refresh")

        #Disable the refresh button if we're recovering data.
        if RecoveringData:
            self.RefreshButton.Disable()

        #Create the animation for the throbber.
        throb = wx.animate.Animation(RescourcePath+"/images/Throbber.gif")
        self.Throbber = wx.animate.AnimationCtrl(self.DevInfoPanel, -1, throb)
        self.Throbber.SetUseWindowBackgroundColour(True)
        self.Throbber.SetInactiveBitmap(wx.Bitmap(RescourcePath+"/images/ThrobberRest.png", wx.BITMAP_TYPE_PNG))
        self.Throbber.SetClientSize(wx.Size(30,30))

    def SetupSizers(self):
        """Set up the sizers for DevInfoWindow"""
        #Make a button boxsizer.
        BottomSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Add each object to the bottom sizer.
        BottomSizer.Add(self.RefreshButton, 0, wx.LEFT|wx.RIGHT|wx.ALIGN_LEFT, 10)
        BottomSizer.Add((20,20), 1)
        BottomSizer.Add(self.Throbber, 0, wx.ALIGN_CENTER|wx.FIXED_MINSIZE)
        BottomSizer.Add((20,20), 1)
        BottomSizer.Add(self.OkayButton, 0, wx.LEFT|wx.RIGHT|wx.ALIGN_RIGHT, 10)

        #Make a boxsizer.
        MainSizer = wx.BoxSizer(wx.VERTICAL)

        #Add each object to the main sizer.
        MainSizer.Add(self.TitleText, 0, wx.ALL|wx.CENTER, 10)
        MainSizer.Add(self.ListCtrl, 1, wx.EXPAND|wx.ALL, 10)
        MainSizer.Add(BottomSizer, 0, wx.EXPAND|wx.ALL ^ wx.TOP, 10)

        #Get the sizer set up for the frame.
        self.DevInfoPanel.SetSizer(MainSizer)
        MainSizer.SetMinSize(wx.Size(780,310))
        MainSizer.SetSizeHints(self)

    def BindEvents(self):
        """Bind all events for DevInfoWindow"""
        self.Bind(wx.EVT_BUTTON, self.GetDiskInfo, self.RefreshButton)
        self.Bind(wx.EVT_BUTTON, self.OnExit, self.OkayButton)
        self.Bind(wx.EVT_SIZE, self.OnSize)
        self.Bind(wx.EVT_CLOSE, self.OnExit)

    def OnSize(self, Event=None):
        """Auto resize the ListCtrl columns"""
        Width, Height = self.ListCtrl.GetClientSizeTuple()

        self.ListCtrl.SetColumnWidth(0, int(Width * 0.15))
        self.ListCtrl.SetColumnWidth(1, int(Width * 0.1))
        self.ListCtrl.SetColumnWidth(2, int(Width * 0.1))
        self.ListCtrl.SetColumnWidth(3, int(Width * 0.3))
        self.ListCtrl.SetColumnWidth(4, int(Width * 0.15))
        self.ListCtrl.SetColumnWidth(5, int(Width * 0.2))

        if Event != None:
            Event.Skip()

    def GetDiskInfo(self, Event=None):
        """Call the thread to get Disk info, disable the refresh button, and start the throbber"""
        logger.info("DevInfoWindow().UpdateDevInfo(): Generating new Disk info...")
        self.RefreshButton.Disable()
        self.Throbber.Play()
        GetDiskInformation(self)

    def ReceiveDiskInfo(self, Info):
        """Get Disk data, call self.UpdateListCtrl(), and then call MainWindow().UpdateFileChoices() to refresh the file choices with the new info"""
        global DiskInfo
        DiskInfo = Info

        #Update the list control.
        logger.debug("DevInfoWindow().UpdateDevInfo(): Calling self.UpdateListCtrl()...")
        self.UpdateListCtrl()

        #Send update signal to mainwindow.
        logger.debug("DevInfoWindow().UpdateDevInfo(): Calling self.ParentWindow.UpdateFileChoices()...")
        wx.CallAfter(self.ParentWindow.UpdateFileChoices)

        #Stop the throbber and enable the refresh button.
        self.Throbber.Stop()
        self.RefreshButton.Enable()

    def UpdateListCtrl(self, Event=None):
        """Update the list control"""
        logger.debug("DevInfoWindow().UpdateListCtrl(): Clearing all objects in list ctrl...")
        self.ListCtrl.ClearAll()

        #Create the columns.
        logger.debug("DevInfoWindow().UpdateListCtrl(): Inserting columns into list ctrl...")
        self.ListCtrl.InsertColumn(col=0, heading="Name", format=wx.LIST_FORMAT_CENTRE)
        self.ListCtrl.InsertColumn(col=1, heading="Type", format=wx.LIST_FORMAT_CENTRE)
        self.ListCtrl.InsertColumn(col=2, heading="Vendor", format=wx.LIST_FORMAT_CENTRE)
        self.ListCtrl.InsertColumn(col=3, heading="Product", format=wx.LIST_FORMAT_CENTRE)
        self.ListCtrl.InsertColumn(col=4, heading="Size", format=wx.LIST_FORMAT_CENTRE)
        self.ListCtrl.InsertColumn(col=5, heading="Description", format=wx.LIST_FORMAT_CENTRE) 

        #Add info from the custom module.
        logger.debug("DevInfoWindow().UpdateListCtrl(): Adding Disk info to list ctrl...")

        DiskList = DiskInfo[0]
        DiskTypeInfoList = DiskInfo[1]
        VendorInfoList = DiskInfo[2]
        ProductInfoList = DiskInfo[3]
        SizeInfoList = DiskInfo[4]
        DescriptionInfoList = DiskInfo[5]

        #Do all of the data at the same time.
        for DiskName in DiskList:
            Number = DiskList.index(DiskName)
            self.ListCtrl.InsertStringItem(index=Number, label=DiskName)
            self.ListCtrl.SetStringItem(index=Number, col=1, label=DiskTypeInfoList[Number])
            self.ListCtrl.SetStringItem(index=Number, col=2, label=VendorInfoList[Number])
            self.ListCtrl.SetStringItem(index=Number, col=3, label=ProductInfoList[Number])
            self.ListCtrl.SetStringItem(index=Number, col=4, label=SizeInfoList[Number])
            self.ListCtrl.SetStringItem(index=Number, col=5, label=DescriptionInfoList[Number])

        #Auto Resize the columns.
        self.OnSize()

    def OnExit(self, Event=None):
        """Exit DevInfoWindow"""
        logger.info("DevInfoWindow().OnExit(): Closing DevInfoWindow...")
        self.Destroy()

#End Disk Info Window
#Begin Settings Window
class SettingsWindow(wx.Frame):
    def __init__(self,ParentWindow):
        """Initialize SettingsWindow"""
        wx.Frame.__init__(self, wx.GetApp().TopWindow, title="DDRescue-GUI - Settings", size=(569,479), style=wx.DEFAULT_FRAME_STYLE)
        self.SettingsPanel=wx.Panel(self)
        self.SetClientSize(wx.Size(569,479))
        self.ParentWindow = ParentWindow
        wx.Frame.SetIcon(self, AppIcon)

        #Notify MainWindow that this has been run.
        logger.debug("SettingsWindow().__init__(): Setting CheckedSettings to True...")
        global CheckedSettings
        CheckedSettings = True

        #Create all of the widgets first.
        logger.debug("SettingsWindow().__init__(): Creating buttons...")
        self.CreateButtons()

        logger.debug("SettingsWindow().__init__(): Creating text...")
        self.CreateText()

        logger.debug("SettingsWindow().__init__(): Creating Checkboxes...")
        self.CreateCheckBoxes()

        logger.debug("SettingsWindow().__init__(): Creating Choiceboxes...")
        self.CreateChoiceBoxes()

        #Then setup the sizers and bind events.
        logger.debug("SettingsWindow().__init__(): Setting up sizers...")
        self.SetupSizers()

        logger.debug("SettingsWindow().__init__(): Binding events...")
        self.BindEvents()

        #Call Layout() on self.SettingsPanel() to ensure it displays properly.
        self.SettingsPanel.Layout()

        logger.info("SettingsWindow().__init__(): Ready. Waiting for events...")

    def CreateButtons(self):
        """Create all buttons for SettingsWindow"""
        self.FastRecButton = wx.Button(self.SettingsPanel, -1, "Set to fastest recovery")
        self.BestRecButton = wx.Button(self.SettingsPanel, -1, "Set to best recovery")
        self.DefaultRecButton = wx.Button(self.SettingsPanel, -1, "Balanced (default)")
        self.ExitButton = wx.Button(self.SettingsPanel, -1, "Save settings and close") 

    def CreateText(self):
        """Create all text for SettingsWindow"""
        self.TitleText = wx.StaticText(self.SettingsPanel, -1, "Welcome to Settings.")
        self.BadSectText = wx.StaticText(self.SettingsPanel, -1, "No. of times to retry bad sectors:")
        self.MaxErrorsText = wx.StaticText(self.SettingsPanel, -1, "Maximum number of errors before exiting:")
        self.ClustSizeText = wx.StaticText(self.SettingsPanel, -1, "Number of clusters to copy at a time:")

    def CreateCheckBoxes(self):
        """Create all CheckBoxes for SettingsWindow, and set their default states (all unchecked)"""
        self.DirectAccessCB = wx.CheckBox(self.SettingsPanel, -1, "Use Direct Disk Access (Recommended)")
        self.OverwriteCB = wx.CheckBox(self.SettingsPanel, -1, "Overwrite output file/disk (Enable if recovering to a disk)")
        self.ReverseCB = wx.CheckBox(self.SettingsPanel, -1, "Read the input file/disk backwards (Not supported on OS X)")
        self.PreallocCB = wx.CheckBox(self.SettingsPanel, -1, "Preallocate space on disc for output file/disk")
        self.NoSplitCB = wx.CheckBox(self.SettingsPanel, -1, "Do a soft run (don't attempt to read bad sectors)")

        #Reverse isn't supported on OS X.
        self.ReverseCB.Disable()

    def CreateChoiceBoxes(self):
        """Create all ChoiceBoxes for SettingsWindow, and call self.SetDefaultRec()"""
        self.BadSectChoice = wx.Choice(self.SettingsPanel, -1, choices=['0', '1', 'Default (2)', '3', '5', 'Forever'])  
        self.MaxErrorsChoice = wx.Choice(self.SettingsPanel, -1, choices=['Default (Infinite)', '1000', '500', '100', '50', '10'])
        self.ClustSizeChoice = wx.Choice(self.SettingsPanel, -1, choices=['256', 'Default (128)', '64', '32']) 

        #Set default settings.
        self.SetDefaultRec()

    def SetupSizers(self):
        """Set up all sizers for SettingsWindow"""
        #Make a sizer for each choicebox with text, and add the objects for each sizer.
        #Retry bad sectors sizer.
        RetryBSSizer = wx.BoxSizer(wx.HORIZONTAL)
        RetryBSSizer.Add(self.BadSectText, 1, wx.LEFT|wx.RIGHT|wx.ALIGN_CENTER, 10)
        RetryBSSizer.Add(self.BadSectChoice, 1, wx.RIGHT|wx.ALIGN_CENTER, 10)

        #Max errors sizer.
        MaxErrorsSizer = wx.BoxSizer(wx.HORIZONTAL)
        MaxErrorsSizer.Add(self.MaxErrorsText, 1, wx.LEFT|wx.RIGHT|wx.ALIGN_CENTER, 10)
        MaxErrorsSizer.Add(self.MaxErrorsChoice, 1, wx.RIGHT|wx.ALIGN_CENTER, 10)

        #Cluster Size Sizer.
        ClustSizeSizer = wx.BoxSizer(wx.HORIZONTAL)
        ClustSizeSizer.Add(self.ClustSizeText, 1, wx.LEFT|wx.RIGHT|wx.ALIGN_CENTER, 10)
        ClustSizeSizer.Add(self.ClustSizeChoice, 1, wx.RIGHT|wx.ALIGN_CENTER, 10)

        #Make a sizer for the best and fastest recovery buttons now, and add the objects.
        ButtonSizer = wx.BoxSizer(wx.HORIZONTAL)
        ButtonSizer.Add(self.BestRecButton, 3, wx.LEFT|wx.EXPAND, 10)
        ButtonSizer.Add((20,20), 1)
        ButtonSizer.Add(self.FastRecButton, 3, wx.RIGHT|wx.EXPAND, 10)

        #Now create and add all objects to the main sizer in order.
        MainSizer = wx.BoxSizer(wx.VERTICAL)

        #Checkboxes.
        MainSizer.Add(self.TitleText, 3, wx.CENTER|wx.TOP, 10)
        MainSizer.Add(self.DirectAccessCB, 3, wx.CENTER|wx.ALL, 5)
        MainSizer.Add(self.ReverseCB, 3, wx.CENTER|wx.ALL, 5)
        MainSizer.Add(self.PreallocCB, 3, wx.CENTER|wx.ALL, 5)
        MainSizer.Add(self.NoSplitCB, 3, wx.CENTER|wx.ALL, 5)
        MainSizer.Add(self.OverwriteCB, 3, wx.CENTER|wx.ALL, 5)

        #Choice box sizers.
        MainSizer.Add(RetryBSSizer, 4, wx.CENTER|wx.EXPAND|wx.ALL, 10)
        MainSizer.Add(MaxErrorsSizer, 4, wx.CENTER|wx.EXPAND|wx.ALL, 10)
        MainSizer.Add(ClustSizeSizer, 4, wx.CENTER|wx.EXPAND|wx.ALL, 10)

        #Add the buttons, and the button sizer.
        MainSizer.Add(self.DefaultRecButton, 4, wx.CENTER|wx.ALL, 10)
        MainSizer.Add(ButtonSizer, 4, wx.CENTER|wx.EXPAND|wx.ALL, 10)
        MainSizer.Add(self.ExitButton, 4, wx.CENTER|wx.ALL, 10)

        #Get the main sizer set up for the frame.
        self.SettingsPanel.SetSizer(MainSizer)
        MainSizer.SetMinSize(wx.Size(569,479))
        MainSizer.SetSizeHints(self)

    def BindEvents(self):
        """Bind all events for SettingsWindow"""
        self.Bind(wx.EVT_CHECKBOX, self.SetSoftRun, self.NoSplitCB)
        self.Bind(wx.EVT_BUTTON, self.SetDefaultRec, self.DefaultRecButton)
        self.Bind(wx.EVT_BUTTON, self.SetFastRec, self.FastRecButton)
        self.Bind(wx.EVT_BUTTON, self.SetBestRec, self.BestRecButton)
        self.Bind(wx.EVT_BUTTON, self.SaveOptions, self.ExitButton)
        self.Bind(wx.EVT_CLOSE, self.SaveOptions)

    def SetSoftRun(self, Event=None):
        """Set up SettingsWindow based on the value of self.NoSplitCB (the "do soft run" CheckBox)"""
        logger.debug("SettingsWindow().SetSoftRun(): Do soft run: "+unicode(self.NoSplitCB.GetValue())+". Setting up SettingsWindow accordingly...")

        if self.NoSplitCB.IsChecked():
            self.BadSectChoice.SetSelection(0)
            self.BadSectChoice.Disable()
        else:
            self.BadSectChoice.Enable()
            self.SetDefaultRec()

    def SetDefaultRec(self, Event=None):
        """Set selections for the Choiceboxes to default settings"""
        logger.debug("SettingsWindow().SetDefaultRec(): Setting up SettingsWindow for default recovery settings...")

        if self.BadSectChoice.IsEnabled():
            self.BadSectChoice.SetSelection(2)

        self.MaxErrorsChoice.SetSelection(0)
        self.ClustSizeChoice.SetSelection(1)

    def SetFastRec(self, Event=None):
        """Set selections for the Choiceboxes to fast recovery settings"""
        logger.debug("SettingsWindow().SetFastRec(): Setting up SettingsWindow for fast recovery settings...")

        if self.BadSectChoice.IsEnabled():
            self.BadSectChoice.SetSelection(0)

        self.MaxErrorsChoice.SetSelection(2)
        self.ClustSizeChoice.SetSelection(0)

    def SetBestRec(self, Event=None):
        """Set selections for the Choiceboxes to best recovery settings"""
        logger.debug("SettingsWindow().SetBestRec(): Setting up SettingsWindow for best recovery settings...")
        if self.BadSectChoice.IsEnabled():
            self.BadSectChoice.SetSelection(2)

        self.MaxErrorsChoice.SetSelection(0)
        self.ClustSizeChoice.SetSelection(3)

    def SaveOptions(self, Event=None):
        """Save all options, and exit SettingsWindow"""
        logger.info("SettingsWindow().SaveOptions(): Saving Options...")

        #Define global variables:
        global DirectAccess
        global OverwriteOutputFile
        global Reverse
        global Preallocate
        global NoSplit
        global InputFileBlockSize
        global BadSectorRetries
        global MaxErrors
        global ClusterSize

        #Checkboxes:
        #Direct disk access setting.
        if self.DirectAccessCB.IsChecked():
            DirectAccess = "-d"
        else:
            DirectAccess = ""

        logger.info("SettingsWindow().SaveOptions(): Use Direct Disk Access: "+unicode(bool(DirectAccess))+".")

        #Overwrite output Disk setting.
        if self.OverwriteCB.IsChecked():
            OverwriteOutputFile = "-f"
        else:
            OverwriteOutputFile = ""

        logger.info("SettingsWindow().SaveOptions(): Overwriting output file: "+unicode(bool(OverwriteOutputFile))+".")

        #Reverse (read data from the end to the start of the input file) setting.
        if self.ReverseCB.IsChecked():
            Reverse = "-R"
        else:
            Reverse = ""

        logger.info("SettingsWindow().SaveOptions(): Reverse direction of read operations: "+unicode(bool(Reverse))+".")

        #Preallocate (preallocate space in the output file) setting.
        if self.PreallocCB.IsChecked():
            Preallocate = "-p"
        else:
            Preallocate = ""

        logger.info("SettingsWindow().SaveOptions(): Preallocate disk space: "+unicode(bool(Preallocate))+".")

        #NoSplit (Don't split failed blocks) option.
        if self.NoSplitCB.IsChecked():
            NoSplit = "-n"
        else:
            NoSplit = ""

        logger.info("SettingsWindow().SaveOptions(): Split failed blocks: "+unicode(bool(NoSplit))+".")

        #ChoiceBoxes:
        #Retry bad sectors option.
        BadSectSelection = self.BadSectChoice.GetCurrentSelection()

        if BadSectSelection == 2:
            BadSectorRetries = "-r 2"
        elif BadSectSelection == 5:
            BadSectorRetries = "-r -1"
        else:
            BadSectorRetries = "-r "+unicode(BadSectSelection)

        logger.info("SettingsWindow().SaveOptions(): Retrying bad sectors "+BadSectorRetries[3:]+" times.")

        #Maximum errors before exiting option.
        MaxErrorsSelection = self.MaxErrorsChoice.GetStringSelection()

        if MaxErrorsSelection == "Default (Infinite)":
            MaxErrors = ""
            logger.info("SettingsWindow().SaveOptions(): Allowing an infinite number of errors before exiting.") 
        else:
            MaxErrors = "-e "+MaxErrorsSelection
            logger.info("SettingsWindow().SaveOptions(): Allowing "+MaxErrors[3:]+" errors before exiting.")

        #ClusterSize (No. of sectors to copy at a time) option.
        ClustSizeSelection = self.ClustSizeChoice.GetStringSelection()

        if ClustSizeSelection == "Default (128)":
            ClusterSize = "-c 128"
        else:
            ClusterSize = "-c "+ClustSizeSelection

        logger.info("SettingsWindow().SaveOptions(): ClusterSize is "+ClusterSize[3:]+".")

        #BlockSize detection.
        logger.info("SettingsWindow().SaveOptions(): Determining blocksize of input file...")
        InputFileBlockSize = DevInfoTools().GetBlockSize(InputFile)

        if InputFileBlockSize != None:
            logger.info("SettingsWindow().SaveOptions(): BlockSize of input file: "+InputFileBlockSize+" (bytes).")
            InputFileBlockSize = "-b "+InputFileBlockSize

        else:
            #Input file is standard file, don't set blocksize, notify user.
            InputFileBlockSize = ""
            logger.info("SettingsWindow().SaveOptions(): Input file is a standard file, and therefore has no blocksize.")

        #Finally, exit
        logger.info("SettingsWindow().SaveOptions(): Finished saving options. Closing Settings Window...")
        self.Destroy()

#End Settings Window
#Begin Privacy Policy Window.
class PrivPolWindow(wx.Frame):
    def __init__(self, ParentWindow):
        """Initialize PrivPolWindow"""
        wx.Frame.__init__(self, parent=wx.GetApp().TopWindow, title="DDRescue-GUI - Privacy Policy", size=(400,310), style=wx.DEFAULT_FRAME_STYLE)
        self.PrivPolPanel = wx.Panel(self)
        self.SetClientSize(wx.Size(400,310))
        self.ParentWindow = ParentWindow
        wx.Frame.SetIcon(self, AppIcon)

        logger.debug("PrivPolWindow().__init__(): Creating widgets...")
        self.CreateWidgets()

        logger.debug("PrivPolWindow().__init__(): Setting up sizers...")
        self.SetupSizers()

        logger.debug("PrivPolWindow().__init__(): Binding Events...")
        self.BindEvents()

        #Call Layout() on self.PrivPolPanel() to ensure it displays properly.
        self.PrivPolPanel.Layout()

        logger.debug("PrivPolWindow().__init__(): Ready. Waiting for events...")

    def CreateWidgets(self):
        """Create all widgets for PrivPolWindow"""
        #Make a text box to contain the policy's text.
        self.TextBox = wx.TextCtrl(self.PrivPolPanel, -1, "", style=wx.TE_MULTILINE|wx.TE_READONLY|wx.TE_WORDWRAP)

        #Populate the text box.
        PolicyFile = open(RescourcePath+"/other/privacypolicy.txt", "r")
        Lines = PolicyFile.readlines()

        for EachLine in Lines:
            self.TextBox.AppendText(EachLine)

        PolicyFile.close()

        #Scroll the text box back up to the top.
        self.TextBox.SetInsertionPoint(0)

        #Make a button to close the dialog.
        self.CloseButton = wx.Button(self.PrivPolPanel, -1, "Okay")

    def SetupSizers(self):
        """Set up sizers for PrivPolWindow"""
        #Make a boxsizer.
        MainSizer = wx.BoxSizer(wx.VERTICAL)

        #Add each object to the main sizer.
        MainSizer.Add(self.TextBox, 1, wx.EXPAND|wx.ALL, 10)
        MainSizer.Add(self.CloseButton, 0, wx.BOTTOM|wx.CENTER, 10)

        #Get the sizer set up for the frame.
        self.PrivPolPanel.SetSizer(MainSizer)
        MainSizer.SetMinSize(wx.Size(400,310))
        MainSizer.SetSizeHints(self)

    def BindEvents(self):
        """Bind events so we can close this window."""
        self.Bind(wx.EVT_BUTTON, self.OnClose, self.CloseButton)
        self.Bind(wx.EVT_CLOSE, self.OnClose)

    def OnClose(self,Event=None):
        """Close PrivPolWindow"""
        self.Destroy()

#End Privacy Policy Window.
#Begin Finished Window
class FinishedWindow(wx.Frame):  
    def __init__(self,ParentWindow):
        """Initialize FinishedWindow"""
        wx.Frame.__init__(self, wx.GetApp().TopWindow, title="DDRescue-GUI - Finished!", size=(350,120), style=wx.DEFAULT_FRAME_STYLE)
        self.FinishedPanel = wx.Panel(self)
        self.SetClientSize(wx.Size(350,120))
        self.ParentWindow = ParentWindow
        self.OutputFileType = None
        self.OutputFileMountPoint = None
        wx.Frame.SetIcon(self, AppIcon)

        logger.debug("FinishedWindow().__init__(): Creating buttons...")
        self.CreateButtons()

        logger.debug("FinishedWindow().__init__(): Creating Text...")
        self.CreateText()

        logger.debug("FinishedWindow().__init__(): Setting up sizers...")
        self.SetupSizers()

        logger.debug("FinishedWindow().__init__(): Binding events...")
        self.BindEvents()

        #Call Layout() on self.FinishedPanel() to ensure it displays properly.
        self.FinishedPanel.Layout()

        logger.info("FinishedWindow().__init__(): Ready. Waiting for events...")

    def CreateButtons(self):
        """Create all buttons for FinishedWindow"""
        self.RestartButton = wx.Button(self.FinishedPanel, -1, "Reset")
        self.MountButton = wx.Button(self.FinishedPanel, -1, "Mount Image/Disk")
        self.QuitButton = wx.Button(self.FinishedPanel, -1, "Quit")

    def CreateText(self):
        """Create all text for FinishedWindow"""
        self.TopText = wx.StaticText(self.FinishedPanel, -1, "Your recovered data is at:")
        self.PathText = wx.StaticText(self.FinishedPanel, -1, OutputFile)
        self.BottomText = wx.StaticText(self.FinishedPanel, -1, "What do you want to do now?")
    
    def SetupSizers(self):
        """Set up all sizers for FinishedWindow"""
        #Make a button boxsizer.
        ButtonSizer = wx.BoxSizer(wx.HORIZONTAL)

        #Add each object to the button sizer.
        ButtonSizer.Add(self.RestartButton, 4, wx.ALIGN_CENTER_VERTICAL|wx.LEFT, 10)
        ButtonSizer.Add((5,5), 1)
        ButtonSizer.Add(self.MountButton, 8, wx.ALIGN_CENTER_VERTICAL)
        ButtonSizer.Add((5,5), 1)
        ButtonSizer.Add(self.QuitButton, 4, wx.ALIGN_CENTER_VERTICAL|wx.RIGHT, 10)

        #Make a boxsizer.
        MainSizer = wx.BoxSizer(wx.VERTICAL)

        #Add each object to the main sizer.
        MainSizer.Add(self.TopText, 1, wx.ALL ^ wx.BOTTOM|wx.CENTER, 10)
        MainSizer.Add(self.PathText, 1, wx.ALL ^ wx.BOTTOM|wx.CENTER, 10)
        MainSizer.Add(self.BottomText, 1, wx.ALL ^ wx.BOTTOM|wx.CENTER, 10)
        MainSizer.Add(ButtonSizer, 0, wx.BOTTOM|wx.EXPAND, 10)

        #Get the sizer set up for the frame.
        self.FinishedPanel.SetSizer(MainSizer)
        MainSizer.SetMinSize(wx.Size(350,120))
        MainSizer.SetSizeHints(self)

    def Restart(self, Event=None):
        """Close FinishedWindow and call MainWindow().Reload() to re-display and reset MainWindow"""
        logger.debug("FinishedWindow().Restart(): Triggering restart and closing FinishedWindow()...")
        wx.CallAfter(self.ParentWindow.Reload)
        self.Destroy()

    def OnMountButton(self, Event=None):
        """Triggered when mount button is pressed"""
        if self.MountButton.GetLabel() == "Mount Image/Disk":
            Success = self.MountOutputFile()

            #Change some stuff if it worked.
            if Success:
                self.TopText.SetLabel("Your recovered data is now mounted at:")
                self.PathText.SetLabel(self.OutputFileMountPoint)
                self.MountButton.SetLabel("Unmount Image/Disk")
                self.RestartButton.Disable()
                self.QuitButton.Disable()

                #Call Layout() on self.FinishedPanel() to ensure it displays properly.
                self.FinishedPanel.Layout()

                wx.MessageDialog(self.FinishedPanel, "Your output file is now mounted. Leave DDRescue-GUI open and click unmount when you're finished.", "DDRescue-GUI - Information", style=wx.OK | wx.ICON_INFORMATION, pos=wx.DefaultPosition).ShowModal()

        else:
            Success = self.UnmountOutputFile()

            #Change some stuff if it worked.
            if Success:
                self.TopText.SetLabel("Your recovered data is at:")
                self.PathText.SetLabel(OutputFile)
                self.MountButton.SetLabel("Mount Image/Disk")
                self.RestartButton.Enable()
                self.QuitButton.Enable()

                #Call Layout() on self.FinishedPanel() to ensure it displays properly.
                self.FinishedPanel.Layout()

        wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Finished")

    def MountOutputFile(self, Event=None):
        """Handle errors and call the platform-dependent mounter function to mount the output file"""
        logger.debug("FinishedWindow().MountOutputFile(): Preparing to mount the output file...")

        #Use different methods for OS X and Linux. Also catch any unhandled errors.
        if Linux:
            try:
                return self.MountDiskLinux()

            except:
                #An error has occured.
                logger.error("FinishedWindow().MountOutputFile(): Couldn't mount output file. Warning user...")
                wx.MessageDialog(self.FinishedPanel, "Your output file could not be mounted!\n\nThe most likely reason for this is that the disk image is incomplete. If the disk image is complete, it may use an unsupported filesystem.\n\nIf you were asked which partition to mount, try again and choose a different one.", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
                return False

        else:
            try:
                return self.MountDiskOSX()

            except:
                #An error has occured.
                logger.error("FinishedWindow().MountOutputFile(): Couldn't mount output file. Warning user...")
                wx.MessageDialog(self.FinishedPanel, "Your output file could not be mounted!\n\nThe most likely reason for this is that the disk image is incomplete. If the disk image is complete, it may use an unsupported filesystem (OS X can read only FAT, NTFS and HFS/HFS+ filesystems).\n\nIf you were asked which partition to mount, try again and choose a different one.", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
                return False

    def UnmountOutputFile(self, Event=None):
        """Unmount the output file"""
        logger.info("FinishedWindow().UnmountOutputFile(): Attempting to unmount output file...")
        wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Unmounting output file. This may take a few moments...")
        wx.Yield()
        Retval = BackendTools().UnmountDisk(self.OutputFileMountPoint)

        #Check if it worked.
        if Retval == 0:
            logger.info("FinishedWindow().UnmountOutputFile(): Successfully unmounted output file...")
            ReturnValue = True

        else:
            logger.error("FinishedWindow().UnmountOutputFile(): Error unmounting output file! Return value: "+Retval+"...")
            ReturnValue = False

        #Linux: Pull down loops if the OutputFile is a Device. OS X: Detach the image's device file.
        if self.OutputFileType == "Device" and Linux:
             logger.debug("FinishedWindow().UnmountOutputFile(): Pulling down loop device...")
             BackendTools().StartProcess(Command="kpartx -d "+OutputFile, ReturnOutput=False)

        elif Linux == False:
            logger.error("FinishedWindow().UnmountOutputFile(): Detaching the device that represents the image...")
            BackendTools().StartProcess(Command="hdiutil detach "+self.OutputFileDeviceName, ReturnOutput=False)

        return ReturnValue

    def MountDiskOSX(self):
        """Mount the output file on OS X"""
        logger.info("FinishedWindow().MountDiskOSX(): Mounting Disk: "+OutputFile+"...")
        wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Preparing to mount output file. Please Wait...")
        wx.Yield()

        #Determine if the OutputFile is a partition.
        Output = BackendTools().StartProcess(Command="hdiutil imageinfo "+OutputFile+" -plist", ReturnOutput=True)[1]

        if "whole disk" in Output:
            #The Output File must be a partition.
            logger.debug("FinishedWindow().MountDiskOSX(): Output file is a partition! Continuing...")
            wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Mounting output file. This may take a few moments...")
            wx.Yield()
            self.OutputFileType = "Partition"

            #Attempt to mount the disk.
            Retval, Output = BackendTools().StartProcess(Command="hdiutil mount "+OutputFile+" -plist", ReturnOutput=True)

            #Parse the plist (Property List).
            Plist = plistlib.readPlistFromString(Output)

            #Get the mountpoint.
            MountedDisk = Plist["system-entities"][0]

            self.OutputFileDeviceName = MountedDisk["dev-entry"]
            self.OutputFileMountPoint = MountedDisk["mount-point"]

            #Check it worked.
            if Retval == 0:
                logger.info("FinishedWindow().MountDiskOSX(): Success! Waiting for user to finish with it and prompt to unmount it...")
                return True

            else:
                logger.error("FinishedWindow().MountDiskOSX(): Error! Warning the user...")
                wx.MessageDialog(self.FinishedPanel, "Couldn't mount your output file. Perhaps it uses an unsupported filesystem?", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
                return False

        else:
            #The Output File must NOT be a partition!
            logger.debug("FinishedWindow().MountDiskOSX(): Output file isn't a partition! Getting list of contained partitions...")
            self.OutputFileType = "Device"

            #Parse the plist (Property List).
            Plist = plistlib.readPlistFromString(Output)

            #Get the list of contained partitions.
            TempList = Plist["partitions"]["partitions"]
            Partitions = []

            #Find real partitions, not GPT headers and similar. If there's no partition number, ignore it.
            for Partition in TempList:
                try:
                    Temp = Partition["partition-number"]

                except KeyError: 
                    pass

                else:
                     Partitions.append(Partition)

            #Get the block size of the image.
            Blocksize = Plist["partitions"]["block-size"]

            #Smarten this list up, and make it appear intuitive to the user.
            Choices = []

            for Partition in Partitions:
                #Get the info related to this partition.
                #Partition number.
                PartNum = Partition["partition-number"]

                #Disk size.
                DiskSize = (Partition["partition-length"] * Blocksize) / 1000000

                #Add stuff in an intuitive way.
                Choices.append("Partition "+unicode(PartNum)+" with size "+unicode(DiskSize)+" MB")

            #Ask the user which partition to mount.
            logger.debug("FinishedWindow().MountDiskOSX(): Asking user which partition to mount...")
            dlg = wx.SingleChoiceDialog(self.FinishedPanel, "Please select which partition you wish to mount", "DDRescue-GUI - Select a Partition", Choices, pos=wx.DefaultPosition)

            #Respond to the user's action.
            if dlg.ShowModal() != wx.ID_OK:
                self.OutputFileMountPoint = None
                logger.debug("FinishedWindow().MountDiskOSX(): User declined to mount any partitions...")
                return False

            else:
                SelectedPartNum = dlg.GetStringSelection().split()[1]

            #Attempt to mount the disk.
            wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Mounting output file. This may take a few moments...")
            wx.Yield()
            logger.info("FinishedWindow().MountDiskOSX(): Mounting disk "+OutputFile+"...")
            Retval, Output = BackendTools().StartProcess(Command="hdiutil mount "+OutputFile+" -plist", ReturnOutput=True)

            #Parse the plist (Property List).
            Plist = plistlib.readPlistFromString(Output)
            Temp = Plist["system-entities"]

            #Get the device name (it doesn't matter which partition Temp[0] is, as hdiutil detach removes all of them anyway).
            self.OutputFileDeviceName = Temp[0]["dev-entry"]

            for Partition in Temp:
                Disk = Partition["dev-entry"]

                if "s" in Disk and Disk[-1] == SelectedPartNum:
                    #Check if the partition we want was mounted (hdiutil mounts all mountable partitions in the image automatically).
                    try:
                        self.OutputFileMountPoint = Partition["mount-point"]

                    except KeyError:
                        #It wasn't! Set Retval to 1 so we can handle the error and unmount the image again
                        Retval = 1
                        self.UnmountOutputFile()

                    else:
                        #It was! Set Retval to 0.
                        Retval = 0

            #Check it worked.
            if Retval == 0:
                logger.info("FinishedWindow().MountDiskOSX(): Success! Waiting for user to finish with it and prompt to unmount it...")
                return True

            else:
                logger.error("FinishedWindow().MountDiskOSX(): Error! Warning the user...")
                wx.MessageDialog(self.FinishedPanel, "Couldn't mount your selected partition. Perhaps it uses an unsupported filesystem?", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
                return False

    def MountDiskLinux(self):
        """Mount the output file on Linux"""
        logger.info("FinishedWindow().MountDiskLinux(): Mounting Disk: "+OutputFile+"...")
        wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Preparing to mount output file. Please Wait...")
        wx.Yield()

        #Determine if the OutputFile is a partition.
        Output = BackendTools().StartProcess(Command="parted "+OutputFile+" print", ReturnOutput=True)[1]

        if "loop" in Output:
            #The Output File must be a partition.
            logger.debug("FinishedWindow().MountDiskLinux(): Output file is a partition! Continuing...")
            wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Mounting output file. This may take a few moments...")
            wx.Yield()
            self.OutputFileType = "Partition"
            self.OutputFileMountPoint = "/mnt"+InputFile

            #Attempt to mount the disk.
            Retval = BackendTools().MountDisk(Disk=OutputFile, MountPoint=self.OutputFileMountPoint)
            
            #Check it worked.
            if Retval == 0:
                logger.info("FinishedWindow().MountDiskLinux(): Success! Waiting for user to finish with it and prompt to unmount it...")
                return True

            else:
                logger.error("FinishedWindow().MountDiskLinux(): Error! Warning the user...")
                wx.MessageDialog(self.FinishedPanel, "Couldn't mount your output file. Perhaps it uses an unsupported filesystem?", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
                return False

        else:
            #The Output File must NOT be a partition!
            logger.debug("FinishedWindow().MountDiskLinux(): Output file isn't a partition! Getting list of contained partitions...")
            self.OutputFileType = "Device"

            #Get the list of contained partitions.
            Partitions = BackendTools().StartProcess(Command="kpartx -l "+OutputFile, ReturnOutput=True)[1].split('\n')

            #Create loop devices for all contained partitions.
            logger.info("FinishedWindow().MountDiskLinux(): Creating loop device...")
            BackendTools().StartProcess(Command="kpartx -a "+OutputFile, ReturnOutput=False)

            #Get some Disk information.
            Output = BackendTools().StartProcess(Command="lsblk -r -o NAME,FSTYPE,SIZE", ReturnOutput=True)[1].split('\n')

            #Smarten this list up, and make it appear intuitive to the user.
            Choices = []

            for Partition in Partitions:
                if Partition[0:12] != "loop deleted" and Partition != "":
                    #Get the info related to this partition.
                    for Line in Output:
                        try:
                            if Partition.split()[0] in Line:
                                OutputLine = Line
                                break

                        except IndexError:
                            continue

                    #Add stuff in an intuitive way.
                    Choices.append("Partition "+Partition.split()[0][-1]+", Filesystem: "+OutputLine.split()[-2]+", Size: "+OutputLine.split()[-1])

            #Ask the user which partition to mount.
            logger.debug("FinishedWindow().MountDiskLinux(): Asking user which partition to mount...")
            dlg = wx.SingleChoiceDialog(self.FinishedPanel, "Please select which partition you wish to mount", "DDRescue-GUI - Select a Partition", Choices, pos=wx.DefaultPosition)

            #Respond to the user's action.
            if dlg.ShowModal() != wx.ID_OK:
                self.OutputFileMountPoint = None
                logger.debug("FinishedWindow().MountDiskLinux(): Pulling down loop device...")
                BackendTools().StartProcess(Command="kpartx -d "+OutputFile, ReturnOutput=False)
                return False

            else:
                for Partition in Partitions:
                    if Partition[0:12] != "loop deleted" and Partition != "":
                        CorrectDisk = Partition[0:6]+dlg.GetStringSelection().split()[1].replace(",", "")
                        break

                PartitionToMount = "/dev/mapper/"+CorrectDisk
                self.OutputFileMountPoint = "/mnt"+PartitionToMount

            #Attempt to mount the disk.
            logger.info("FinishedWindow().MountDiskLinux(): Mounting disk "+PartitionToMount+"...")
            wx.CallAfter(self.ParentWindow.UpdateStatusBar, "Mounting output file. This may take a few moments...")
            wx.Yield()
            Retval = BackendTools().MountDisk(Disk=PartitionToMount, MountPoint=self.OutputFileMountPoint)
            
            #Check it worked.
            if Retval == 0:
                logger.info("FinishedWindow().MountDiskLinux(): Success! Waiting for user to finish with it and prompt to unmount it...")
                return True

            else:
                logger.error("FinishedWindow().MountDiskLinux(): Error! Warning the user...")
                wx.MessageDialog(self.FinishedPanel, "Couldn't mount your selected partition. Perhaps it uses an unsupported filesystem?", "DDRescue-GUI - Error!", style=wx.OK | wx.ICON_ERROR, pos=wx.DefaultPosition).ShowModal()
                return False

    def CloseFinished(self, Event=None):
        """Close FinishedWindow and trigger closure of MainWindow"""
        logger.info("FinishedWindow().CloseFinished(): Closing FinishedWindow() and calling self.ParentWindow().OnExit()...")
        self.Destroy()
        wx.CallAfter(self.ParentWindow.OnExit, JustFinishedRec=True)

    def BindEvents(self):
        """Bind all events for FinishedWindow"""
        self.Bind(wx.EVT_BUTTON, self.Restart, self.RestartButton)
        self.Bind(wx.EVT_BUTTON, self.OnMountButton, self.MountButton)
        self.Bind(wx.EVT_BUTTON, self.CloseFinished, self.QuitButton)
        self.Bind(wx.EVT_CLOSE, self.CloseFinished)

#End Finished Window
#Begin Backend Thread.
class BackendThread(threading.Thread):
    def __init__(self, ParentWindow):
        """Initialize and start the thread."""
        self.ParentWindow = ParentWindow
        self.OldStatus = ""
        self.GotInitialStatus = False
        self.UnitList = ['null', 'B', 'k', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y']
        threading.Thread.__init__(self)
        self.start()

    def run(self):
        """Main body of the thread, started with self.start()"""
        #Prepare to start ddrescue.
        logger.debug("MainBackendThread(): Preparing to start ddrescue...")
        OptionsList = [DirectAccess, OverwriteOutputFile, Reverse, Preallocate, NoSplit, BadSectorRetries, MaxErrors, ClusterSize, InputFileBlockSize, InputFile, OutputFile, LogFile]

        if Linux:
            ExecList = ["ddrescue", "-v"]
        else:
            ExecList = [RescourcePath+"/ddrescue", "-v"]

        for Option in OptionsList:
            #Handle direct disk access on OS X.
            if Linux == False and OptionsList.index(Option) == 0 and Option != "":
                #If we're recovering from a file, don't enable direct disk access (it won't work).
                if InputFile[0:5] == "/dev/":
                    #Remove InputFile and switch it with a string that uses /dev/rdisk (raw disk) instead of /dev/disk.
                    OptionsList.pop(9)
                    OptionsList.insert(2, "/dev/r" + InputFile.split("/dev/")[1])

                else:
                    #Make sure "-d" isn't added to the ExecList (continue to next iteration of loop).
                    continue
 
            elif Option != "":
                ExecList.append(Option)

        #Start ddrescue.
        logger.debug("MainBackendThread(): Running ddrescue with: '"+' '.join(ExecList)+"'...")

        #Ensure the exit sequence knows we are recovering data.
        global RecoveringData
        RecoveringData = True

        cmd = subprocess.Popen(ExecList, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
        Line = ""
        LineList = []
        counter = 0

        #Give ddrescue plenty of time to start.
        time.sleep(2)

        #Grab information from ddrescue. (After ddrescue exits, attempt to read an extra 1000 chars to grab any remaining output)
        while cmd.poll() == None or counter < 1000:
            if cmd.poll() != None:
                counter += 1

            Char = cmd.stdout.read(1)
            Line += Char

            #If this is the end of the line (or carriage return), process it, and send the results to the GUI thread.
            if Char in ["\n", "\r"]:
                Line = Line.replace("\x1b[A", "")
                self.ProcessLine(Line.replace("\n", "").replace("\r", ""))
                wx.CallAfter(self.ParentWindow.UpdateOutputBox, Line)

                #Reset Line.
                Line = ""

        #Let the GUI know that we are no longer recovering any data.
        RecoveringData = False

        #Check if we got ddrescue's init status, and if ddrescue exited with a status other than 0.
        if self.GotInitialStatus == False:
            logger.error("MainBackendThread(): We didn't get the initial status before ddrescue exited! Something has gone wrong. Telling MainWindow and exiting...")
            wx.CallAfter(self.ParentWindow.RecoveryEnded, Result="NoInitialStatus", ReturnCode=int(cmd.returncode))

        elif int(cmd.returncode) != 0:
            logger.error("MainBackendThread(): ddrescue exited with exit status "+unicode(cmd.returncode)+"! Something has gone wrong. Telling MainWindow and exiting...")
            wx.CallAfter(self.ParentWindow.RecoveryEnded, Result="BadReturnCode", ReturnCode=int(cmd.returncode))

        else:
            logger.info("MainBackendThread(): ddrescue finished recovering data. Telling MainWindow and exiting...")
            wx.CallAfter(self.ParentWindow.RecoveryEnded, Result="Success", ReturnCode=int(cmd.returncode))

    def ProcessLine(self, Line):
        """Process a given line to get ddrescue's current status and recovery information and send it to the GUI Thread""" 
        if Line != "":
            SplitLine = Line.split()

            if SplitLine[0] == "About":
                #Initial status.
                logger.info("MainBackendThread().Processline(): Got Initial Status... Setting up the progressbar...")
                self.GotInitialStatus = True

                #This is platform-specific.
                if Linux or InputFile[0:5] != "/dev/":
                    #Use ddrescue's output.
                    self.DiskCapacity = int(SplitLine[3])
                    self.DiskCapacityUnit = SplitLine[4]

                else:
                    #Use disk utility to calculate the disk size.
                    Output = BackendTools().StartProcess(Command="diskutil list", ReturnOutput=True)[1].replace("*", "").split("\n")

                    #Grab the info.
                    #Get the right line.
                    for Line in Output:
                        if "/dev" not in Line and InputFile.split("/dev/")[1] in Line:
                            CorrectLine = Line
                            break

                    #Get the size, and change the unit if needed.
                    self.DiskCapacityUnit = CorrectLine.split()[-2]
                    Size = float(CorrectLine.split()[-3])

                    while Size < 1000:
                        NewUnit = self.UnitList[self.UnitList.index(self.DiskCapacityUnit[0])-1] + "B"
                        Size, self.DiskCapacityUnit = self.ChangeUnits(Size, self.DiskCapacityUnit, NewUnit)

                    self.DiskCapacity = int(round(Size))

                wx.CallAfter(self.ParentWindow.SetProgressBarRange, self.DiskCapacity)

            elif SplitLine[0] == "rescued:":
                #Line 1
                self.RecoveredData = SplitLine[1]
                self.RecoveredDataUnit = SplitLine[2][:2]
                self.ErrorSize = ' '.join(SplitLine[4:6]).replace(",", "")
                self.CurrentReadRate = ' '.join(SplitLine[8:10])

                #Change the unit of measurement of the current amount of recovered data if needed.
                self.RecoveredData, self.RecoveredDataUnit = self.ChangeUnits(float(self.RecoveredData), self.RecoveredDataUnit, self.DiskCapacityUnit)
                self.RecoveredData = round(self.RecoveredData,3)

                #Update the GUI.
                wx.CallAfter(self.ParentWindow.UpdateProgress, self.RecoveredData, self.DiskCapacity)
                wx.CallAfter(self.ParentWindow.UpdateLine1Info, unicode(self.RecoveredData)+" "+self.RecoveredDataUnit, self.ErrorSize, self.CurrentReadRate)

            elif SplitLine[0] == "ipos:":
                #Line 2
                self.InputPos = ' '.join(SplitLine[1:3]).replace(",", "")
                self.NumErrors = SplitLine[4].replace(",", "")
                self.AverageReadRate = SplitLine[7]
                self.AverageReadRateUnit = SplitLine[8]

                #Calculate time remaining.
                self.TimeRemaining = self.CalculateTimeRemaining()

                #Handle negative times. Sometimes happens on Mac OS X when the size calculation is inaccurate.
                if self.TimeRemaining[0] == "-":
                    self.TimeRemaining = "Nearly Finished..."

                #Update the GUI.
                wx.CallAfter(self.ParentWindow.UpdateLine2Info, self.InputPos, unicode(self.AverageReadRate)+" "+self.AverageReadRateUnit, self.NumErrors, self.TimeRemaining)

            elif SplitLine[0] == "opos:":
                #Line 3
                self.OutputPos = ' '.join(SplitLine[1:3]).replace(",", "")

                #Add compatibility for newer versions of ddrescue (the syntax changed when 'run time' was introduced with v1.18).
                if SplitLine[-1] != "ago":
                    self.TimeSinceLastRead = ' '.join(SplitLine[-2:])
                else:
                    self.TimeSinceLastRead = ' '.join(SplitLine[-3:-1])

                #Update the GUI.
                wx.CallAfter(self.ParentWindow.UpdateLine3Info, self.OutputPos, self.TimeSinceLastRead)

            elif SplitLine != []:
                #Status Line. Only update it if the status has changed.
                if Line != self.OldStatus:
                    wx.CallAfter(self.ParentWindow.UpdateStatusBar, Line)

                self.OldStatus = Line

    def ChangeUnits(self, NumberToChange, CurrentUnit, RequiredUnit):
        """Convert data so it uses the correct unit of measurement"""
        #Prepare for the change.
        CurrentUnitNumber = self.UnitList.index(CurrentUnit[0])
        RequiredUnitNumber = self.UnitList.index(RequiredUnit[0])
        ChangeInUnitNumber = RequiredUnitNumber - CurrentUnitNumber
        Power = -ChangeInUnitNumber * 3

        #Do it.
        return NumberToChange * 10**Power, RequiredUnit[:2]

    def CalculateTimeRemaining(self):
        """Calculate remaining time based on the average read rate and the current amount of data recovered"""
        #Make sure everything's in the correct units.
        NewAverageReadRate = self.ChangeUnits(float(self.AverageReadRate), self.AverageReadRateUnit, self.DiskCapacityUnit)[0]

        try:
            #Perform the calculation and round it.
            Result = (int(self.DiskCapacity) - self.RecoveredData) / NewAverageReadRate

            #Convert between Seconds, Minutes, Hours, and Days to make the value as understandable as possible.
            if Result <= 60:
                return unicode(int(round(Result)))+" seconds"
            elif Result >= 60 and Result <= 3600: 
                return unicode(round(Result/60,1))+" minutes"
            elif Result > 3600 and Result <= 86400:
                return unicode(round(Result/3600,2))+" hours"
            elif Result > 86400:
                return unicode(round(Result/86400,2))+" days"

        except ZeroDivisionError as Error:
            #We can't divide by zero!
            logger.warning("MainBackendThread().CalculateTimeRemaining(): Attempted to divide by zero! Error: "+unicode(Error)+". Returning 'Unknown'")
            return "Unknown"

#End Backend thread

if __name__ == "__main__":
    app = MyApp(False)
    app.MainLoop()