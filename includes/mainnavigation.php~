<!-- Navigation Toolbar file
This file is part of my website.
Copyright (C) 2016-2017 Hamish McIntyre-Bhatty
My website is free software: you can redistribute it and/or modify it
under the terms of the GNU General Public License version 3 or,
at your option, any later version.

My website is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with My website.  If not, see <http://www.gnu.org/licenses/>.

The GNU GPL version 3 is available on the site at hamishmb.altervista.org/license.php.-->

<!-- Use PHP to set 'class="CurrentPage"' where required. Use regexps too. -->
<!-- TODO Use a for loop for this? -->

<!-- Uncomment to display maintenance page instead of whatever page was requested. -->
<?php //header("Location: /maintenance.php"); ?>

<div id="navigation">
    <ul id="navlist">
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Home") { echo "class='CurrentPage'"; } ?> href="/index.php">Home</a></li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Blog") { echo "class='CurrentPage'"; } ?> href="/blog">Blog</a></li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots") { echo "class='CurrentPage'"; } ?> href="/html/screenshots.php">Screenshots</a></li>
        <li class="main"><a <?php if (preg_match("/changelogs/i", $GLOBALS["CURRENTPAGE"])) { echo "class='CurrentPage'"; } ?> href="#">Changelogs</a>

            <ul class="Changelogs">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/changelogs.php?program_name=ddrescue-gui"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/changelogs.php?program_name=wxfixboot"><br>WxFixBoot<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/stroodlr") { echo "class='CurrentPage'"; } ?> href="/html/changelogs.php?program_name=stroodlr"><br>Stroodlr<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/getdevinfo") { echo "class='CurrentPage'"; } ?> href="/html/changelogs.php?program_name=getdevinfo"><br>GetDevInfo<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/changelogs.php?program_name=wineautostart"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if (preg_match("/downloads/i", $GLOBALS["CURRENTPAGE"])) { echo "class='CurrentPage'"; } ?> href="#">Downloads</a>

            <ul class="Downloads">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/downloads.php?program_name=ddrescue-gui"><br>DDRescue-<br>GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/downloads.php?program_name=wxfixboot"><br>WxFixBoot<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/stroodlr") { echo "class='CurrentPage'"; } ?> href="/html/downloads.php?program_name=stroodlr"><br>Stroodlr<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/getdevinfo") { echo "class='CurrentPage'"; } ?> href="/html/downloads.php?program_name=getdevinfo"><br>GetDevInfo<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/downloads.php?program_name=wineautostart"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if (preg_match("/docs/i", $GLOBALS["CURRENTPAGE"])) { echo "class='CurrentPage'"; } ?> href="#">Documentation</a>

            <ul class="Documentation">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/Docs/ddrescue-gui.php"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/Docs/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/stroodlr") { echo "class='CurrentPage'"; } ?> href="/html/Docs/stroodlr.php"><br>Stroodlr<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/getdevinfo") { echo "class='CurrentPage'"; } ?> href="/html/Docs/getdevinfo.php"><br>GetDevInfo<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/Docs/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if (preg_match("/museum/i", $GLOBALS["CURRENTPAGE"])) { echo "class='CurrentPage'"; } ?> href="#">Museum</a>

            <ul class="Museum">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/museum.php?program_name=ddrescue-gui"><br>DDRescue-<br>GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/museum.php?program_name=wxfixboot"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/museum.php?program_name=wineautostart"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "About") { echo "class='CurrentPage'"; } ?> href="/html/about.php">About</a></li>
    </ul>
</div>
