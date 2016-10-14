#!/usr/bin/env python
# -*- coding: utf-8 -*- 
# Partition view window for DDRescue-GUI Version 1.3
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

#Import modules
import wx
import subprocess
import sys
import os

#If this isn't running as root, exit immediately
if not os.geteuid()==0:
    #Exit.
    sys.exit("\nSorry, this program must be run with root privileges.\nExiting...")

try:
    #Get the device passed to the script
    OutputFileChosen = sys.argv[1]
except:
    sys.exit("\nYou must pass a command to this program.\nExiting...")

#Begin Partition View Window
class PViewWindow(wx.Frame):  
    def __init__(self):
        wx.Frame.__init__(self, None, title="DDRescue-GUI - Select a Partition", size=(600,400), style=wx.DEFAULT_FRAME_STYLE ^ wx.RESIZE_BORDER)
        self.PViewPanel=wx.Panel(self)

        #Create some text.
        wx.StaticText(self.PViewPanel, -1, "Select a partition to mount.", pos=(200,20))

        #Get the list of contained partitions.
        partitions = subprocess.check_output(['kpartx', '-l', OutputFileChosen]).split('\n')

        #Create a listbox and add the partitions to it.
        self.ListBox = wx.ListBox(self.PViewPanel, -1, pos=(20,50), size=(560,300), choices=['-- Please Select --'], style=wx.LB_SINGLE)
        for partition in partitions:
            self.ListBox.Append(partition)

        #Create buttons
        self.OkButton = wx.Button(self.PViewPanel, -1, "Okay", size=(70,30), pos=(500,360))
        self.CancelButton = wx.Button(self.PViewPanel, -1, "Cancel", size=(70,30), pos=(30,360))

        #Bind events.
        self.Bind(wx.EVT_BUTTON, self.returnSelection, self.OkButton)
        self.Bind(wx.EVT_BUTTON, self.Cancel, self.CancelButton)

    def returnSelection(self,e):
        if self.ListBox.GetStringSelection()[0:12] == "loop deleted" or self.ListBox.GetStringSelection()[0:19] == "-- Please Select --":
            #Ignore invalid selections.
            wx.MessageDialog(self.PViewPanel, "Please either cancel or select a valid partition.", "DDRescue-GUI - Warning", style=wx.OK | wx.ICON_WARNING, pos=wx.DefaultPosition).ShowModal()
        else:
            subprocess.call("echo '"+self.ListBox.GetStringSelection()+"' > /tmp/ddrescue-gui/partitiontomount",shell=True)
            self.Destroy()

    def Cancel(self,e):
        subprocess.call("echo 'None' > /tmp/ddrescue-gui/partitiontomount",shell=True)
        self.Destroy()

app = wx.App(False)
MainFrame = PViewWindow()
MainFrame.Show()
app.MainLoop()
