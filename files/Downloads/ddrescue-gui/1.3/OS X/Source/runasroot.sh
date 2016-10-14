#!/bin/bash
# Starter script for DDRescue-GUI Version 1.3
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

#Determine if system is running Linux or Mac
if [ "$(uname)" == "Darwin" ] ; then
    #Start DDRescue-GUI with administrator rights.
    pw="$(osascript -e 'Tell application "System Events" to display dialog "Password:" default answer "" with hidden answer' -e 'text returned of result' 2>/dev/null)" && echo "$pw" | sudo -S $RESOURCEPATH/../MacOS/DDRescue-GUI
elif [ "$(expr substr $(uname -s) 1 5)" == "Linux" ]; then
    #Get around using pkexec straight from Unity, as it doesn't work in Ubuntu 12.04-13.04.
    pkexec /usr/share/ddrescue-gui/DDRescue-GUI.py
fi
