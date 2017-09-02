<!DOCTYPE html>

<!-- Changelogs For GetDevInfo
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

<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>GetDevInfo Changelogs - hamishmb.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Changelogs/getdevinfo'; ?>
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Changelogs For GetDevInfo</h1>
            <!-- In-Page Navigation -->
            <nav>
                <p id="InPageNavTitle">Versions</p>
                <ol id="InPageNavigation">
                    <!-- 1.0 Series -->
                    <li>
                        <a href="#1.0Series">1.0 Series</a>
                        <ol>
                            <li><a href="#1.0.0">1.0.0 (Stable)</a></li>
                        </ol>
                    </li>
                </ol>
            </nav>
            <section>
                <article>
                    <h2 id="1.0.0">GetDevInfo v1.0.0</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/getdevinfo/1.0.0.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
