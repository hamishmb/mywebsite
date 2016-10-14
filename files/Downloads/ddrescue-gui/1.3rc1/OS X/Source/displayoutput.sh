#!/bin/bash
# View output function for DDRescue-GUI Version 1.3rc1
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

#Display the terminal window from here, as for some unknown reason it refuses to work in pure python. **Suggestions welcome!
/usr/bin/tail -f -n 5 /tmp/ddrescue-gui/ddrescueoutput.txt
