<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>DDRescue-GUI Museum - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Museum/ddrescue-gui'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>DDRescue-GUI Museum</h1>
            <h3>Here you can download older versions of DDRescue-GUI.</h3>
            <p>These versions can be downloaded for educational purposes and are useful if
            you're trying to run one of my programs on an operating system that I no longer
            support, such as Ubuntu 12.10.
            </p>
            <!-- In-Page Navigation -->
            <nav>
                <strong id="InPageNavTitle">Versions</strong>
                <ol id="InPageNavigation">
                    <!-- 1.6 Series -->
                    <li>
                        <a href="#1.6Series">1.6 Series</a>
                        <ol>
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

            <!-- Page Content -->
            <section>
                <h2 id="1.6Series">DDRescue-GUI 1.6 Series</h2>
                <article>
                    <h3 id="1.6">DDRescue-GUI v1.6</h3>
                    <p>
                    ***This has been superseded by v1.6.1 ***<br><br>

                    This is the next major release of DDRescue-GUI and it fixes a lot of important bugs, adds some new safety features, and adds support for Fedora! The bundled ddrescue and Python in the OS X package have also been updated.<br><br>

                    See my blog at www.errormania.altervista.org for all the details.
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
                            <td>DDRescue-GUI v1.6 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.6/Xenial/ddrescue-gui_1.6~xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.6 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.6/Trusty/ddrescue-gui_1.6~trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.6 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.6/Precise/ddrescue-gui_1.6~precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.6 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.6/OS%20X/32-bit/DDRescue-GUI32-bit.dmg">32-bit</a> | <a href="/files/Downloads/ddrescue-gui/1.6/OS%20X/64-bit/DDRescue-GUI64-bit.dmg">64-bit (Recommended)</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.6 For Fedora 22 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.6/Fedora/32-bit/ddrescue-gui-1.6-1.fc24.i686.rpm">32-bit</a> | <a href="/files/Downloads/ddrescue-gui/1.6/Fedora/64-bit/ddrescue-gui-1.6-1.fc24.x86_64.rpm">64-bit (Recommended)</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.6 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.6/Pmagic/ddrescue-gui_1.6~pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.6 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.6/OtherDistro/ddrescue-gui_1.6~otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <h2 id="1.5Series">DDRescue-GUI 1.5 Series</h2>
                <article>
                    <h3 id="1.5.1">DDRescue-GUI v1.5.1</h3>
                    <p>
                    Important: This has been replaced by v1.6.1, which fixes a lot of important bugs.<br><br>

                    This release fixes a bug (not security related) in the authentication dialog in v1.5, but other than that it is identical.<br>
                    The release info for v1.5 is as follows:<br><br>

                    This is the latest release of DDRescue-GUI, and it's even more stable than the last one!<br><br>

                    A lot of the changes in this release are to improve stability and to fix bugs, but there are also some new features, such as the output box behaving like a terminal, the settings windows remembering settings if you check back later, and a ton of improvements for Mac users :)<br><br>

                    For more details, see my blog post at http://errormania.altervista.org/ddrescue-gui-v1-5-released/<br><br>

                    As always, thanks to everyone who's helped make this program better by reporting bugs, asking questions and giving me general feedback! :)
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
                            <td>DDRescue-GUI v1.5.1 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5.1/Xenial/ddrescue-gui_1.5.1xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5.1 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5.1/Wily/ddrescue-gui_1.5.1wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5.1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5.1/Trusty/ddrescue-gui_1.5.1trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5.1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5.1/Precise/ddrescue-gui_1.5.1precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5.1 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5.1/OS%20X/32-bit/DDRescue-GUI-32bit.dmg">32-bit</a> | <a href="/files/Downloads/ddrescue-gui/1.5.1/OS%20X/64-bit/DDRescue-GUI-64bit.dmg">64-bit (Recommended)</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5.1 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5.1/Pmagic/ddrescue-gui_1.5.1pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5.1 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5.1/Otherdistro/ddrescue-gui_1.5.1otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.5">DDRescue-GUI v1.5</h3>
                    <p>
                    IMPORTANT: This has been superseded by v1.6.1, please download that instead.<br><br>

                    This is the latest release of DDRescue-GUI, and it's even more stable than the last one!<br><br>

                    A lot of the changes in this release are to improve stability and to fix bugs, but there are also some new features, such as the output box behaving like a terminal, the settings windows remembering settings if you check back later, and a ton of improvements for Mac users :)<br><br>

                    For more details, see my blog post at http://errormania.altervista.org/ddrescue-gui-v1-5-released/<br><br>

                    As always, thanks to everyone who's helped make this program better by reporting bugs, asking questions and giving me general feedback! :)
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
                            <td>DDRescue-GUI v1.5 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/Xenial/ddrescue-gui_1.5xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/Wily/ddrescue-gui_1.5wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/Vivid/ddrescue-gui_1.5vivid-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/Trusty/ddrescue-gui_1.5trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/Precise/ddrescue-gui_1.5precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/OS%20X/Builds/32-bit/Install%20DDRescue-GUI.dmg">32-bit</a> | <a href="/files/Downloads/ddrescue-gui/1.5/OS%20X/Builds/64-bit/Install%20DDRescue-GUI-64bit.dmg">64-bit (Recommended)</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/Pmagic/ddrescue-gui_1.5pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5/OtherDistro/ddrescue-gui_1.5otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.5rc1">DDRescue-GUI v1.5~rc1</h3>
                    <p>
                    *** This has been superseded ***<br><br>

                    This is the first release candidate for DDRescue-GUI v1.5, and it has a lot of fixes and improvements over v1.5~pre1 and v1.4!<br><br>

                    Since v1.5~pre1, the GUI works better and uses much less CPU power on OS X, including the output box especially, the settings window now remembers settings if you check back, direct disk access is enabled by default, the elapsed time counter now works better, and a complete recovery is detected more reliably on OS X. See the changelog for more details.<br><br>

                    If all goes to plan, this will be the same as the stable release.
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
                            <td>DDRescue-GUI v1.5~rc1 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/Xenial/ddrescue-gui_1.5~rc2xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~rc1 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/Wily/ddrescue-gui_1.5~rc2wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~rc1 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/Vivid/ddrescue-gui_1.5~rc2vivid-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~rc1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/Trusty/ddrescue-gui_1.5~rc2trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~rc1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/Precise/ddrescue-gui_1.5~rc2precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~rc1 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/OS%20X/Builds/32-bit/DDRescue-GUI-32-bit.dmg">32-bit</a> | <a href="/files/Downloads/ddrescue-gui/1.5~rc1/OS%20X/Builds/64-bit/DDRescue-GUI-64-bit.dmg">64-bit (Recommended)</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~rc1 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/Pmagic/ddrescue-gui_1.5~rc2pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~rc1 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~rc1/OtherDistro/ddrescue-gui_1.5~rc2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.5pre1">DDRescue-GUI v1.5~pre1</h3>
                    <p>
                    *** This has been superseded ***<br><br>

                    This is the first development version of v1.5, which has loads of little improvements over v1.4 but needs some work to improve the efficiency of the backend, especially on OS X, where for some reason CPU usage is high and there is a big delay before the first GUI update (fixed for 1.5~pre2, memory leak on OS X too! (also fixed)), and some testing, but this is nonetheless helpful for checking that stuff is working properly :)<br><br>

                    Note: This is NOT stable software! This is being released merely for testing by me and any others who wish to help, preferably in a virtual machine, and for informational purposes, so please don't use this on any production system, because it has the potential to do serious damage to your system! Having said that, I think it's reasonably stable, but I haven't yet tested it thoroughly.
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
                            <td>DDRescue-GUI v1.5~pre1 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/Xenial/ddrescue-gui_1.5~pre1xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~pre1 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/Wily/ddrescue-gui_1.5~pre1wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~pre1 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/Vivid/ddrescue-gui_1.5~pre1vivid-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~pre1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/Trusty/ddrescue-gui_1.5~pre1trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~pre1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/Precise/ddrescue-gui_1.5~pre1precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~pre1 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/OS%20X/DDRescue-GUI.dmg">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~pre1 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/Pmagic/ddrescue-gui_1.5~pre1pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.5~pre1 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.5~pre1/OtherDistro/ddrescue-gui_1.5~pre1otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article> <!-- ************************************************************************************ -->
                <h2 id="1.4Series">DDRescue-GUI 1.4 Series</h2>
                <article>
                    <h3 id="1.4">DDRescue-GUI v1.4</h3>
                    <p>
                    *** There is now a newer version available, v1.6. The newer releases fix a lot of important bugs and add new features. ***<br><br>

                    This new version is now finally ready! I said the last version was the best I'd ever released, but this is even better!<br><br>

                    The whole GUI has been redesigned from the ground up, and it's now much faster, sleeker and smoother, as well as more intuitive and helpful to the user.<br><br>

                    On OS X in particular, there are many, many improvements over the last stable version, including new bundled python (v2.7.10), and wxpython (v3.0.2, running on Cocoa), new bundled ddrescue (v1.19) disk image mounting support and stability improvements.<br><br>

                    There are a lot of improvements for Linux as well, especially for efficiency: the new GUI displays much more helpful information to the user during recovery, but even when all of it is visible, it remains as efficient as the last version, as well as starting more quickly.<br><br>

                    There are several improvements for both Linux and OS X as well, including a nice new authentication dialog and direct disk access (most Linux distros, and OS X).<br><br>

                    If you're interested, you can see the full list of changes in the changelog below.<br><br>

                    UPDATE 15/8/2015: A package has now been added for Ubuntu 15.10 (Wily Werewolf).<br><br>

                    UPDATE 2/10/2015: The OS X package has now been tested to work with El Capitan (10.11), even with System Integrity Protection enabled, which is good news!<br><br>

                    UPDATE 27/10/2015: This has now been tested to work with the stable version of Ubuntu 15.10.<br><br>

                    I hope you enjoy using this program, and you can check out my other packages at www.launchpad.net/~hamishmb/+related-projects
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
                            <td>DDRescue-GUI v1.4 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4/Vivid/ddrescue-gui_1.4vivid-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4/Trusty/ddrescue-gui_1.4trusty-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4/Precise/ddrescue-gui_1.4precise-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4/OS%20X/DDRescue-GUI.dmg">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4/Pmagic/ddrescue-gui_1.4pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4/OtherDistro/ddrescue-gui_1.4otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.4rc2">DDRescue-GUI v1.4~rc2</h3>
                    <p>
                    *** v1.5 has now been released, so please download that instead. This is no longer the newest development version and doesn't represent the current state of development. ***<br><br>

                    This is the second and final release candidate for DDRescue-GUI 1.4! There have been further performance tweaks and efficiency improvements over v1.4~rc1, as well as many bug fixes and new features.<br><br>

                    The code can now be considered complete, and reasonably stable; now I just need to test everything again thoroughly, but I don't think there will be any issues.<br><br>

                    If all goes to plan, this will be exactly the same as the stable version, except with a different version number.<br><br>

                    Here's a brief summary of the major changes:<br><br>

                    The backend has now been switched to the new model based on direct Inter-Process Communication,<br>
                    A lot of the code has been revised and improved (both in terms of reliability and speed),<br>
                    The new authentication dialog has been finished and semi-tested,<br>
                    Disk image (and device) mounting is now fully supported and semi-tested on OS X, and improved on Linux,<br>
                    A lot of bugs present when run on wxPython > 2.8.11.1 have been fixed (this affects Mac OS X, Ubuntu 14.10 and 15.04),<br>
                    Elapsed time is now viewable on the Main Window,<br>
                    Direct disk access is now available during a recovery (both OS X and Linux),<br>
                    Python and wxPython have both been upgraded in the OS X bundle (to v2.7.10 and v3.0.2.0 respectively),<br>
                    and various other bugs on Mac OS X have been fixed.<br>

                    Note: This is NOT stable software! This is being released merely for testing by me and any others who wish to help, preferably in a virtual machine, and for informational purposes, so please don't use this on any production system, because it has the potential to do serious damage to your system! Having said that, I think it's very stable, and complete, but I haven't yet tested it thoroughly.<br><br>

                    Note: The file names are wrong because of multiple build attempts because of a packaging problem.
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
                            <td>DDRescue-GUI v1.4~rc2 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc2/Wily/ddrescue-gui_1.4~rc4wily-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc2 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc2/Vivid/ddrescue-gui_1.4~rc4vivid-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc2 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc2/Trusty/ddrescue-gui_1.4~rc4trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc2 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc2/Precise/ddrescue-gui_1.4~rc4precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc2 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc2/OS%20X/DDRescue-GUI.dmg">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc2 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc2/Pmagic/ddrescue-gui_1.4~rc2pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc2 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc2/OtherDistro/ddrescue-gui_1.4~rc2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.4rc1">DDRescue-GUI v1.4~rc1</h3>
                    <p>
                    *** This doesn't represent the current state of development releases ***<br><br>

                    This is the first release candidate for DDRescue-GUI 1.4! It features a completely redesigned GUI, thanks to Minnie McIntyre-Bhatty, and a better device detection system, that displays much more helpful information.<br><br>

                    It also offers many, many bugfixes over 1.3, including some UI tweaks that make it easier to use, improvements in speed and efficiency, and fewer dependencies.<br><br>

                    The backend hasn't been touched yet, at all, but all the modifications have been planned and will be available for testing in the next release candidate, which may perhaps be ready around late May, at a guess.<br><br>

                    There isn't a Mac version for this as I don't currently have access to a Mac, but I tested it at various points during development, so it should be fine. There will be a Mac version for 1.4~rc2.<br><br>

                    This version has now been released, and it should be a good precursor for the next release candidate, which should shortly thereafter become stable.<br><br>

                    Note: This is NOT stable software! This is being released merely for testing by me and any others who wish to help, preferably in a virtual machine, and for informational purposes, so please don't use this on any production system, because it has the potential to do serious damage to your system! Having said that, I consider it incomplete, but reasonably stable, but it hasn't gone through proper testing yet.
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
                            <td>DDRescue-GUI v1.4~rc1 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc1/Vivid/ddrescue-gui_1.4~rc1vivid-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc1 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc1/Utopic/ddrescue-gui_1.4~rc1utopic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc1/Trusty/ddrescue-gui_1.4~rc1trusty-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc1/Precise/ddrescue-gui_1.4~rc1precise-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc1 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc1/Pmagic/ddrescue-gui_1.4~rc1pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.4~rc1 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.4~rc1/OtherDistro/ddrescue-gui_1.4~rc1otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <h2 id="1.3Series">DDRescue-GUI 1.3 Series</h2>
                <article>
                    <h3 id="1.3">DDRescue-GUI v1.3</h3>
                    <p>
                    *** There is now a newer version available ***<br><br>

                    This is, by far and away, the best version of DDRescue-GUI I've ever released! It has even better error detection, fixes formatting issues on some systems (text appears in wrong place during recovery), works on Apple's OS X(R) 10.6 or newer, and include many other fixes, such as a remaining time feature that works when the average speed is being measured in bps, a new device information dialog, and include a fix with the terminal output option. It also can now restart after a recovery, and can (on Linux) mount the finished image (even if it has partitions) for you!<br><br>

                    Note: Please only use the failsafe OS X option if the normal option won't work correctly, as it has more insecure permissions, possibly allowing tampering via other programs.<br><br>

                    UPDATE: A package is now available for Ubuntu 14.10, and it also now works with ddrescue 1.18 -- download the source and follow the instructions inside.<br><br>

                    UPDATE 9/2/2015: The packages for the obsolete Ubuntu 12.10 and 13.10 releases have been removed as they are using unnecessary space on Launchpad's servers.<br><br>

                    UPDATE 17/2/2015: I have released updated packages for Ubuntu 14.10 and 15.04 because of changes in the version of wxpython ubuntu provides.<br><br>

                    UPDATE 24/3/2015: I've now checked that this version also works with OS X Yosemite (10.10), and it's fine.<br><br>

                    UPDATE 15/4/2015: I've fixed a bug for the OS X version that can prevent ddrescue from starting, and the new file is now available here. Please use this version instead.<br><br>

                    I hope you enjoy using this program, and you can check out my other packages at www.launchpad.net/~hamishmb/+related-projects
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
                            <td>DDRescue-GUI v1.3 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/Vivid/ddrescue-gui_1.3vivid-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/Utopic/ddrescue-gui_1.3utopic-0ubuntu1-update1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/Trusty/ddrescue-gui_1.3trusty-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Ubuntu 13.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/Saucy/ddrescue-gui_1.3saucy-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Ubuntu 12.10 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/Quantal/ddrescue-gui_1.3quantal-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/Precise/ddrescue-gui_1.3precise-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/OS%20X/Update%201/Package/DDRescue-GUI~Update1.dmg">All Systems</a> | <a href="/files/Downloads/ddrescue-gui/1.3/OS%20X/DDRescue-GUIFS.dmg">Failsafe</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/Pmagic/ddrescue-gui_1.3pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.3 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3/OtherDistro/ddrescue-gui_1.3otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.3rc2">DDRescue-GUI v1.3~rc2</h3>
                    <p>
                    *UNSTABLE* testing version. Note: the mac version probably won't work at this stage.<br><br>

                    UPDATE: Package is now available for Ubuntu 14.10<br><br>

                    There is now a new stable version, please download that instead.<br>
                    There is also a new development version available.
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.3~rc2 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc2/OS%20X/DDRescue-GUI.app.zip">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.3rc1">DDRescue-GUI v1.3~rc1</h3>
                    <p>
                    *UNSTABLE* testing version.
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
                            <td>DDRescue-GUI v1.3~rc1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc1/Trusty/ddrescue-gui_1.3~rc1trusty-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3~rc1 For Ubuntu 13.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc1/Saucy/ddrescue-gui_1.3~rc1saucy-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3~rc1 For Ubuntu 13.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc1/Raring/ddrescue-gui_1.3~rc1raring-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3~rc1 For Ubuntu 12.10 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc1/Quantal/ddrescue-gui_1.3~rc1quantal-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.3~rc1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc1/Precise/ddrescue-gui_1.3~rc1precise-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.3~rc1 For Mac OS X 10.6.8 Or Higher</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc1/OS%20X/DDRescue-GUI.app.zip">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.3~rc1 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.3rc1/Pmagic/ddrescue-gui_1.3~rc1pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <h2 id="1.2Series">DDRescue-GUI 1.2 Series</h2>
                <article>
                    <h3 id="1.2">DDRescue-GUI v1.2</h3>
                    <p>
                    This version features presets for the preferences dialog, a splash screen, and a time remaining feature, and many more features noted in the release notes. The deb (Installer) packages are now available.
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
                            <td>DDRescue-GUI v1.2 For Ubuntu 13.10</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.2/Saucy/ddrescue-gui_1.2saucy-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.2 For Ubuntu 13.04</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.2/Raring/ddrescue-gui_1.2raring-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.2 For Ubuntu 12.10 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.2/Quantal/ddrescue-gui_1.2quantal-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>DDRescue-GUI v1.2 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.2/Precise/ddrescue-gui_1.2precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.2 For Parted Magic</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.2/Pmagic/ddrescue-gui_1.2pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>DDRescue-GUI v1.2 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/ddrescue-gui/1.2/OtherDistro/ddrescue-gui_1.2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.2rc1">DDRescue-GUI v1.2~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/ddrescue-gui/1.2rc1.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="1.1">DDRescue-GUI v1.1</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/ddrescue-gui/1.1.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="1.0">DDRescue-GUI v1.0</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/ddrescue-gui/1.0.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="0.9">DDRescue-GUI v0.9</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/ddrescue-gui/0.9.txt"))?>
                    </p>
                    <a href="#navigation">Back To Top</a><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
