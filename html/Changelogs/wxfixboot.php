<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>WxFixBoot Changelogs - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/html/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Changelogs/wxfixboot'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Changelog For WxFixBoot</h1>
            <!-- In-Page Navigation -->
            <nav>
                <strong id="InPageNavTitle">Versions</strong>
                <ol id="InPageNavigation">
                    <!-- 2.0 Series-->
                    <li>
                        <a href="#2.0Series">2.0 Series</a>
                        <ol>
                            <li><a href="#2.0">2.0 (Stable)</a></li>
                            <li><a href="#2.0rc1">2.0~rc1 (Development)</a></li>
                            <li><a href="#2.0pre2">2.0~pre2 (Development)</a></li>
                            <li><a href="#2.0pre1">2.0~pre1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- 1.0 Series -->
                    <li>
                        <a href="#1.0Series">1.0 Series</a>
                        <ol>
                            <li><a href="#1.0.2">1.0.2 (Stable)</a></li>
                            <li><a href="#1.0.1">1.0.1 (Stable)</a></li>
                            <li><a href="#1.0">1.0 (Stable)</a></li>
                            <li><a href="#1.0rc4">1.0~rc4 (Development)</a></li>
                            <li><a href="#1.0rc3">1.0~rc3 (Development)</a></li>
                            <li><a href="#1.0rc2">1.0~rc2 (Development)</a></li>
                            <li><a href="#1.0rc1">1.0~rc1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- Version 0.9 -->
                    <li><a href="#0.9">0.9 (Preview)</a></li>
                </ol>
            </nav>

            <!-- Page Content *** Sort out exact lengths *** -->
            <!-- Heights are in px, but use digits only -->
            <section>
                <h2 id="2.0Series">WxFixBoot 2.0 Series</h2>
                <article>
                    <h3 id="2.0">WxFixBoot v2.0</h3>
                    <p><iframe class="BesideNav" src="/files/Changelogs/wxfixboot/2.0.txt"></iframe>
                    </p>
                </article>
                <article>
                    <h3 id="2.0rc1">WxFixBoot v2.0~rc1</h3>
                    <p><iframe class="BesideNav" src="/files/Changelogs/wxfixboot/2.0rc1.txt" height="500"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="2.0pre2">WxFixBoot v2.0~pre2</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/2.0pre2.txt" width="100"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="2.0pre1">WxFixBoot v2.0~pre1</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/2.0pre1.txt" height="820"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <h2 id="1.0Series">WxFixBoot 1.0 Series</h2>
                <article>
                    <h3 id="1.0.2">WxFixBoot v1.0.2</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/1.0.2.txt" height="800"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0.1">WxFixBoot v1.0.1</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/1.0.1.txt" height="500"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0">WxFixBoot v1.0</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/1.0.txt" height="1610"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc4">WxFixBoot v1.0~rc4</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/1.0rc4.txt" height="1600"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc3">WxFixBoot v1.0~rc3</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/1.0rc3.txt" height="1100"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc2">WxFixBoot v1.0~rc2</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/1.0rc2.txt" height="800"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc1">WxFixBoot v1.0~rc1</h3>
                    <p><iframe src="/files/Changelogs/wxfixboot/1.0rc1.txt" height="520"></iframe>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="0.9">WxFixBoot v0.9</h2>
                    <p><iframe src="/files/Changelogs/wxfixboot/0.9.txt" height="520"></iframe>
                    <a href="#navigation">Back To Top</a>
                    </p>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
