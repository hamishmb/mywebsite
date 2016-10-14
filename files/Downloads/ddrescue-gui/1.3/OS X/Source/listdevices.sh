#!/bin/bash
# Device detector for DDRescue-GUI Version 1.3
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

#Receive info on host OS
if [ $# -eq 0 ] ; then
    exit 0
fi
while getopts "h?lm" opt; do
    case "$opt" in
    h|\?)
        exit 0
        ;;
    l)  
        Linux=1
        ;;
    m)
        Linux=0
        ;;
    esac
done

#Obtain data about connected devices.
if [[ $Linux == 1 ]] ; then
    mount | grep /dev/hd | sed 's/ .*//' > /tmp/ddrescue-gui/idedevices
    mount | grep /dev/sr | sed 's/ .*//' > /tmp/ddrescue-gui/cddvddevices
    mount | grep /dev/sd | sed 's/ .*//' > /tmp/ddrescue-gui/usbsatadevices
else
    mount | grep /dev/disk | sed 's/ .*//' | sed 's/s[0-9].*//' > /tmp/ddrescue-gui/devices
fi
