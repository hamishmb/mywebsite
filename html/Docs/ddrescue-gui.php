<!DOCTYPE html>

<!-- Documentation For DDRescue-GUI
This file is part of my website.
Copyright (C) 2016-2018 Hamish McIntyre-Bhatty
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

<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Documentation For DDRescue-GUI - hamishmb.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Docs/ddrescue-gui'; ?>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>User Guide For DDRescue-GUI</h1>
            <p>
            The current version of the user guide is for DDRescue-GUI 1.7.1 and Higher, for both Mac and Linux.
            </p>

            <p>
            You can view the user guide online, or download in a few formats. Source code for the user guide can be found at <a href="https://github.com/hamishmb/docs" target="_blank">https://github.com/hamishmb/docs</a>.
            </p>

            <p>
            <ul>
                <li><a href="ddrescue-gui/index.html" target="_blank">View Online</a></li>
                <li><a href="ddrescue-gui.pdf">PDF</a></li>
                <li><a href="ddrescue-gui.epub">EPUB (for mobile devices)</li></a>
            </ul>
            </p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
