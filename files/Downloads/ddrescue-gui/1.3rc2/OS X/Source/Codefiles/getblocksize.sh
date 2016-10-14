#!/bin/bash
# Blocksize detector for DDRescue-GUI Version 1.3rc1
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

#Get Input file from commandline options.
if [ $# -eq 0 ] ; then
    echo "Gets blocksizes of devices for DDRescue-GUI. Can also be used seperately."
    echo "E.g. /opt/ddrescue-gui/DDrescue-gui-getblocksize.sh -d <yourdevicehere>"
    exit 0
fi
while getopts "h?lmd:" opt; do
    case "$opt" in
    h|\?)
        echo "Gets blocksizes of devices for DDRescue-GUI. Can also be used seperately."
        echo "E.g. /opt/ddrescue-gui/DDrescue-gui-getblocksize.sh -d <yourdevicehere>"
        exit 0
        ;;
    l)
        Linux=1
        ;;
    m)
        Linux=0
        ;;
    d)  
        InputFileChosen=$OPTARG
        ;;
    esac
done
#Get given device's blocksize and output it into a file.
if [[ $Linux == "1" ]] ; then
    Blocksize=$(/sbin/blockdev --getpbsz $InputFileChosen)
else
    Blocksize=$(diskutil info $InputFileChosen | grep "Block" | awk '{print $4}')
    echo $Blocksize
fi
if [[ $? == "0" ]] ; then 
    #$Blocksize cannot be an error message.   
    echo $Blocksize > /tmp/ddrescue-gui/devblocksize
    exit 0
else
    #$Blocksize must be an error message.
    echo "" > /tmp/ddrescue-gui/devblocksize
    exit 1
fi
