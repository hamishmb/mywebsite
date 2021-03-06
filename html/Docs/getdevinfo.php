<!DOCTYPE html>

<!-- Documentation For GetDevInfo
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

The GNU GPL version 3 is available on the site at www.hamishmb.com/license.php.-->

<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Documentation For GetDevInfo - www.hamishmb.com</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Docs/getdevinfo'; ?>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Documentation For GetDevInfo</h1>
            <p>
            The current version of the API documentation is for GetDevInfo 1.0.1 and Higher, for both Mac and Linux. This documentation covers both API and dictionary format.
            </p>

            <p>
            You can view the documentation online, or download in a few formats. Source code for the documentation can be found at <a href="https://github.com/hamishmb/getdevinfo" target="_blank">https://github.com/hamishmb/getdevinfo</a>.
            </p>

            <p>
            <ul>
                <li><a href="getdevinfo/index.html" target="_blank">View Documentation Online</a></li>
                <li><a href="getdevinfo.pdf">PDF</a></li>
                <li><a href="getdevinfo.epub">EPUB (for mobile devices)</li></a>
            </ul>
            </p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
