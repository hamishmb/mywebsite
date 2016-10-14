#!/bin/bash
# ddrescue start script for DDRescue-GUI Version 1.3rc1
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

#Get ddrescue's options from commandline.
if [ $# -eq 0 ] ; then
    echo "Starts ddrescue using cmdline options."
    echo "E.g. /opt/ddrescue-gui/startddrescue.sh -o=<youroptionshere>"
    exit 0
fi
while getopts "h?lmo:" opt; do
    case "$opt" in
    h|\?)
        exit 0
        ;;
    l)  
        Linux="1"
        ;;
    m)
        Linux="0"
        ;;
    o)  
        OPTIONS=$OPTARG
        ;;
    esac
done
#Run ddrescue with given options.
if [[ $Linux  == "1" ]]; then
    $(which ddrescue) $OPTIONS > /tmp/ddrescue-gui/ddrescueoutput.txt
else
    /usr/share/ddrescue-gui/ddrescue $OPTIONS > /tmp/ddrescue-gui/ddrescueoutput.txt
fi
