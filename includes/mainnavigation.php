<!-- Use PHP to set 'class="CurrentPage"' where required. Use regexps too. -->
<div id="navigation">
    <ul id="navlist">
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Home") { echo "class='CurrentPage'"; } ?> href="/html/index.php">Home</a></li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Blog") { echo "class='CurrentPage'"; } ?> href="/html/blog.php">Blog</a></li>
        <li class="main"><a <?php if (preg_match("/screenshots/i", $GLOBALS["CURRENTPAGE"])) { echo "class='CurrentPage'"; } ?> href="/html/screenshots.php">Screenshots</a>

            <ul class="Screenshots">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/Screenshots/ddrescue-gui.php"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/Screenshots/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/Screenshots/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if (preg_match("/changelogs/i", $GLOBALS["CURRENTPAGE"])) { echo "class='CurrentPage'"; } ?> href="">Changelogs</a>

            <ul class="Changelogs">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/Changelogs/ddrescue-gui.php"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/Changelogs/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/Changelogs/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if (preg_match("/downloads/i", $GLOBALS["CURRENTPAGE"])) { echo "class='CurrentPage'"; } ?> href="">Downloads</a>

            <ul class="Downloads">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/Downloads/ddrescue-gui.php"><br>DDRescue-<br>GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/Downloads/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/Downloads/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a href="">Documentation</a>

            <ul class="Documentation">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/Docs/ddrescue-gui.php"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/Docs/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/Docs/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a href="">Museum</a>

            <ul class="Museum">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/html/Museum/ddrescue-gui.php"><br>DDRescue-<br>GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/html/Museum/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/wineautostart") { echo "class='CurrentPage'"; } ?> href="/html/Museum/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "About") { echo "class='CurrentPage'"; } ?> href="/html/about.php">About</a></li>
    </ul>
</div>
