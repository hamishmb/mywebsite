<!DOCTYPE html>

<!-- Changelogs For Wine Autostart
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
        <title>Wine Autostart Changelogs - hamishmb.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Changelogs/wineautostart'; ?>
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Changelogs For Wine Autostart</h1>
            <!-- In-Page Navigation -->
            <nav>
                <p id="InPageNavTitle">Versions</p>
                <ol id="InPageNavigation">
                    <!-- 2.0 Series -->
                    <li>
                        <a href="#2.0Series">2.0 Series</a>
                        <ol>
                            <li><a href="#2.0.2">2.0.2 (Stable)</a></li>
                            <li><a href="#2.0.1">2.0.1 (Stable)</a></li>
                            <li><a href="#2.0">2.0 (Stable)</a></li>
                            <li><a href="#2.0rc1">2.0~rc1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- Version 1.0 -->
                    <li><a href="#1.0">1.0 (Stable)</a></li>

                    <!-- Version 0.9 -->
                    <li><a href="#0.9">0.9 (Development)</a></li>

                    <!-- 0.8 Series -->
                    <li>
                        <a href="#0.8Series">0.8 Series</a>
                        <ol>
                            <li><a href="#0.8.5">0.8.5 (Development)</a></li>
                            <li><a href="#0.8">0.8 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- Version 0.7 -->
                    <li><a href="#0.7">0.7 (Development)</a></li>
                </ol>
            </nav>
            <section>
                <h2 id="2.0Series">Wine Autostart 2.0 Series</h2>
                <article>
                    <h3 id="2.0.2">Wine Autostart v2.0.2</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/2.0.2.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="2.0.1">Wine Autostart v2.0.1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/2.0.1.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="2.0">Wine Autostart v2.0</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/2.0.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="2.0rc1">Wine Autostart v2.0~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/2.0rc1.txt"))?>
                    </p>
                </article>
                <article>
                    <h2 id="1.0">Wine Autostart v1.0</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/1.0.txt"))?>
                    </p>
                </article>
                <article>
                    <h2 id="0.9">Wine Autostart v0.9</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/0.9.txt"))?>
                    </p>
                </article>
                <h2 id="0.8Series">Wine Autostart 0.8 Series</h2>
                <article>
                    <h3 id="0.8.5">Wine Autostart v0.8.5</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/0.8.5.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="0.8">Wine Autostart v0.8</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/0.8.txt"))?>
                    </p>
                </article>
                <article>
                    <h2 id="0.7">Wine Autostart v0.7</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/wineautostart/0.7.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
