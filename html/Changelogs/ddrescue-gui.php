<!DOCTYPE html>

<!-- Changelogs For DDRescue-GUI
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
        <title>DDRescue-GUI Changelogs - hamishmb.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Changelogs/ddrescue-gui'; ?>
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Changelogs For DDRescue-GUI</h1>
            <!-- In-Page Navigation -->
            <nav>
                <p id="InPageNavTitle">Versions</p>
                <ol id="InPageNavigation">
                    <!-- 1.6 Series -->
                    <li>
                        <a href="#1.6Series">1.6 Series</a>
                        <ol>
                            <li><a href="#1.6.1">1.6.1 (Stable)</a></li>
                            <li><a href="#1.6">1.6 (Stable)</a></li>
                        </ol>
                    </li>

                    <!-- 1.5 Series -->
                    <li>
                        <a href="#1.5Series">1.5 Series</a>
                        <ol>
                            <li><a href="#1.5.1">1.5.1 (Stable)</a></li>
                            <li><a href="#1.5">1.5 (Stable)</a></li>
                            <li><a href="#1.5rc1">1.5~rc1 (Development)</a></li>
                            <li><a href="#1.5pre1">1.5~pre1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- 1.4 Series -->
                    <li>
                        <a href="#1.4Series">1.4 Series</a>
                        <ol>
                            <li><a href="#1.4">1.4 (Stable)</a></li>
                            <li><a href="#1.4rc2">1.4~rc2 (Development)</a></li>
                            <li><a href="#1.4rc1">1.4~rc1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- 1.3 Series -->
                    <li>
                        <a href="#1.3Series">1.3 Series</a>
                        <ol>
                            <li><a href="#1.3">1.3 (Stable)</a></li>
                            <li><a href="#1.3rc2">1.3~rc2 (Development)</a></li>
                            <li><a href="#1.3rc1">1.3~rc1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- 1.2 Series -->
                    <li>
                        <a href="#1.2Series">1.2 Series</a>
                        <ol>
                            <li><a href="#1.2">1.2 (Stable)</a></li>
                            <li><a href="#1.2rc1">1.2~rc1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- Version 1.1 -->
                    <li><a href="#1.1">1.1 (Stable)</a></li>

                    <!-- Version 1.0 -->
                    <li><a href="#1.0">1.0 (Stable)</a></li>

                    <!-- Version 0.9 -->
                    <li><a href="#0.9">0.9 (Preview)</a></li>
                </ol>
            </nav>
            <section>
                <h2 id="1.6Series">DDRescue-GUI 1.6 Series</h2>
                <article>
                    <h3 id="1.6.1">DDRescue-GUI v1.6.1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.6.1.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="1.6">DDRescue-GUI v1.6</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.6.txt"))?>
                    </p>
                </article>
                <h2 id="1.5Series">DDRescue-GUI 1.5 Series</h2>
                <article>
                    <h3 id="1.5.1">DDRescue-GUI v1.5.1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.5.1.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="1.5">DDRescue-GUI v1.5</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.5.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="1.5rc1">DDRescue-GUI v1.5~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.5rc1.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="1.5pre1">DDRescue-GUI v1.5~pre1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.5pre1.txt"))?>
                    </p>
                </article>
                <h2 id="1.4Series">DDRescue-GUI 1.4 Series</h2>
                <article>
                    <h3 id="1.4">DDRescue-GUI v1.4</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.4.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="1.4rc2">DDRescue-GUI v1.4~rc2</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.4rc2.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="1.4rc1">DDRescue-GUI v1.4~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.4rc1.txt"))?>
                    </p>
                </article>
                <h2 id="1.3Series">DDRescue-GUI 1.3 Series</h2>
                <article>
                    <h3 id="1.3">DDRescue-GUI v1.3</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.3.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="1.3rc2">DDRescue-GUI v1.3~rc2</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.3rc2.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="1.3rc1">DDRescue-GUI v1.3~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.3rc1.txt"))?>
                    </p>
                </article>
                <h2 id="1.2Series">DDRescue-GUI 1.2 Series</h2>
                <article>
                    <h3 id="1.2">DDRescue-GUI v1.2</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.2.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="1.2rc1">DDRescue-GUI v1.2~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.2rc1.txt"))?>
                    </p>
                </article>
                <article>
                    <h2 id="1.1">DDRescue-GUI v1.1</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.1.txt"))?>
                    </p>
                </article>
                <article>
                    <h2 id="1.0">DDRescue-GUI v1.0</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/1.0.txt"))?>
                    </p>
                </article>
                <article>
                    <h2 id="0.9">DDRescue-GUI v0.9</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($GLOBALS["BASEDIR"] . "/files/Changelogs/ddrescue-gui/0.9.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
