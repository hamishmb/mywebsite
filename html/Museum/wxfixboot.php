<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>WxFixBoot Museum - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Museum/wxfixboot'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>WxFixBoot Museum</h1>
            <h3>Here you can download older versions of WxFixBoot.</h3>
            <p>These versions can be downloaded for educational purposes and are useful if
            you're trying to run one of my programs on an operating system that I no longer
            support, such as Ubuntu 12.10.
            </p>
            <!-- In-Page Navigation -->
            <nav>
                <strong id="InPageNavTitle">Versions</strong>
                <ol id="InPageNavigation">
                    <!-- 2.0 Series-->
                    <li>
                        <a href="#2.0Series">2.0 Series</a>
                        <ol>
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

            <!-- Page Content -->
            <section>
                <h2 id="2.0Series">WxFixBoot 2.0 Series</h2>
                <article>
                    <h3 id="2.0pre2">WxFixBoot v2.0~pre2</h3>
                    <p>
                    This is the second development release of WxFixBoot 2.0!<br>
                    It brings a lot of important changes and improvements over the last version, and adds much better error detection and avoidance, and support for Fedora!<br>
                    See the page on my blog at www.errormania.altervista.org, and the changelog, for more details.<br>
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Xenial/wxfixboot_2.0~pre2xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Wily/wxfixboot_2.0~pre2wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Trusty/wxfixboot_2.0~pre2trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Precise/wxfixboot_2.0~pre2precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Fedora 22 Or Higher</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Fedora/i686/wxfixboot-2.0~pre2-1.fc24.i686.rpm">32-bit</a> | <a href="/files/Downloads/wxfixboot/2.0~pre2/Fedora/x86_64/wxfixboot-2.0~pre2-1.fc24.x86_64.rpm">64-bit (Recommended)</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Pmagic/wxfixboot_2.0~pre2pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/OtherDistro/wxfixboot_2.0~pre2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="2.0pre1">WxFixBoot v2.0~pre1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/2.0pre1.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <h2 id="1.0Series">WxFixBoot 1.0 Series</h2>
                <article>
                    <h3 id="1.0.2">WxFixBoot v1.0.2</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0.2.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0.1">WxFixBoot v1.0.1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0.1.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0">WxFixBoot v1.0</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc4">WxFixBoot v1.0~rc4</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0rc4.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc3">WxFixBoot v1.0~rc3</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0rc3.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc2">WxFixBoot v1.0~rc2</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0rc2.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc1">WxFixBoot v1.0~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0rc1.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="0.9">WxFixBoot v0.9</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/0.9.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
