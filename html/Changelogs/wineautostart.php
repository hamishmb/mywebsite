<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>Wine Autostart Changelogs - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Changelogs/wineautostart'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
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

            <!-- Page Content *** Sort out exact lengths *** -->
            <!-- Heights are in px, but use digits only -->
            <section>
                <h2 id="2.0Series">Wine Autostart 2.0 Series</h2>
                <article>
                    <h3 id="2.0.1">Wine Autostart v2.0.1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/2.0.1.txt"))?>
                    </p>
                </article>
                <article>
                    <h3 id="2.0">Wine Autostart v2.0</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/2.0.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="2.0rc1">Wine Autostart v2.0~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/2.0rc1.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="1.0">Wine Autostart v1.0</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/1.0.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="0.9">Wine Autostart v0.9</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/0.9.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <h2 id="0.8Series">Wine Autostart 0.8 Series</h2>
                <article>
                    <h3 id="0.8.5">Wine Autostart v0.8.5</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/0.8.5.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="0.8">Wine Autostart v0.8</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/0.8.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="0.7">Wine Autostart v0.7</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/0.7.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
