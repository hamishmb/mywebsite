<!-- Use PHP to set 'class="CurrentPage"' where required. -->
<div id="navigation">
    <ul id="navlist">
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Home") { echo "class='CurrentPage'"; } ?> href="/index.php">Home</a></li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Blog") { echo "class='CurrentPage'"; } ?> href="/blog.php">Blog</a></li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots") { echo "class='CurrentPage'"; } ?> href="/screenshots.php">Screenshots</a>

            <ul class="Screenshots">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/Screenshots/ddrescue-gui.php"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/Screenshots/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Screenshots/wineautostart") { echo "class='CurrentPage'"; } ?> href="/Screenshots/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a href="">Changelogs</a>

            <ul class="Changelogs">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/Changelogs/ddrescue-gui.php"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/Changelogs/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Changelogs/wineautostart") { echo "class='CurrentPage'"; } ?> href="/Changelogs/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a href="">Downloads</a>

            <ul class="Downloads">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/Downloads/ddrescue-gui.php"><br>DDRescue-<br>GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/Downloads/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Downloads/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/Downloads/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a href="">Documentation</a>

            <ul class="Documentation">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/Docs/ddrescue-gui.php"><br>DDRescue-GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/Docs/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Docs/wineautostart") { echo "class='CurrentPage'"; } ?> href="/Docs/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a href="">Museum</a>

            <ul class="Museum">
                <li class="first"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/ddrescue-gui") { echo "class='CurrentPage'"; } ?> href="/Museum/ddrescue-gui.php"><br>DDRescue-<br>GUI<br></a></li>
                <li><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/wxfixboot") { echo "class='CurrentPage'"; } ?> href="/Museum/wxfixboot.php"><br>WxFixBoot<br></a></li>
                <li class="last"><a <?php if ($GLOBALS["CURRENTPAGE"] == "Museum/wineautostart") { echo "class='CurrentPage'"; } ?> href="/Museum/wineautostart.php"><br>Wine Autostart<br><br></a></li>
            </ul>

        </li>
        <li class="main"><a <?php if ($GLOBALS["CURRENTPAGE"] == "About") { echo "class='CurrentPage'"; } ?> href="/about.php">About</a></li>
    </ul>
</div>
