<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>Wine Autostart Museum - errormania.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Museum/wineautostart'; ?>
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
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
            <h1>Wine Autostart Museum</h1>
            <h3>Here you can download older versions of Wine Autostart.</h3>
            <p>These versions can be downloaded for educational purposes and are useful if
            you're trying to run one of my programs on an operating system that I no longer
            support, such as Ubuntu 12.10.<br><br>

            Note: Some of these downloads are .tar.gz packages instead of installable packages. I don't have .deb packages for some of the older versions, so I just uploaded what I have.
            </p>
            <h1>About md5 Checksums and Digital Signatures</h1>
            <h2>Md5 Checksums</h2>
            The md5 sums offered on this page can be used to verify that your file downloaded successfully without corrupting in transit. These can be verified (usually on the command-line) using specific instructions for your operating system as detailed below:<br><br>

            <a href="https://help.ubuntu.com/community/HowToMD5SUM" target="_blank">Instructions for Linux</a><br>
            <a href="https://www.garron.me/en/bits/how-to-md5sum-mac-os-x.html" target="_blank">Instructions for Mac OS X</a><br>
            <a href="https://support.microsoft.com/en-us/kb/841290" target="_blank">Instructions for Windows (2000 or higher)</a><br><br>

            In each of these cases, you can compare the output of the command to the md5 sum in the file (in the table, next to each download file).
            <h2>Digital Signatures</h2>
            The digital signatures on this page can be used to verify that your file was created by me, and hasn't been tampered with, either on the web server, or in transit to your computer. Checking these is more dificult, so I have decided not to include instructions here because they'd have to be very long to do it justice. Instead, please carry out a search on how to verify GPG signatures if you wish to learn how to do it. I will provide instructions in  documentation for my programs when it is created.<br><br>

            As a programmer, I am inclined to say that you should always use both the md6 sum and the signature to verify our downloads, but the average user probably doesn't know how to; if you aren't concerned about it, don't worry too much about it.<br><br>
            <section>
                <h2 id="2.0Series">Wine Autostart 2.0 Series</h2>
                <article>
                    <h3 id="2.0.1">Wine Autostart v2.0.1</h3>
                    <p>
                    This is a maintenance release that fixes just one very occasional but annoying bug in v2.0, where Wine Autostart may prompt you to check a disk for software twice, or three times. The issue was actually a weird race condition when stopping the backend thread.<br><br>

                    Other than that fix, this release is identical to the last one.<br><br>

                    I hope you enjoy using this program, and you can check out my other packages at www.launchpad.net/~hamishmb/+related-projects<br><br>

                    UPDATE 17/4/2016: There's now a package for Ubuntu 16.04 (Xenial Xerus).<br><br>

                    UPDATE 18/10/2016: There's now a package for Ubuntu 16.10 (Yakkety Yak).<br><br>
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0.1 For Ubuntu 16.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.1/Yakkety/wineautostart_2.0.1yakkety-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.1/Yakkety/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.1/Yakkety/wineautostart_2.0.1yakkety-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.1/Yakkety/wineautostart_2.0.1yakkety-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0.1 For Ubuntu 16.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.1/Xenial/wineautostart_2.0.1xenial-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.1/Xenial/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.1/Xenial/wineautostart_2.0.1xenial-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.1/Xenial/wineautostart_2.0.1xenial-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0.1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.1/Trusty/wineautostart_2.0.1trusty-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.1/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.1/Trusty/wineautostart_2.0.1trusty-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.1/Trusty/wineautostart_2.0.1trusty-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0.1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.1/Precise/wineautostart_2.0.1precise-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.1/Precise/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.1/Precise/wineautostart_2.0.1precise-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.1/Precise/wineautostart_2.0.1precise-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                            <td>Wine Autostart v2.0.1 For Other Linux Distributions</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.1/Otherdistro/wineautostart_2.0.1otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.1/Otherdistro/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.1/Otherdistro/wineautostart_2.0.1otherdistro-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.1/Otherdistro/wineautostart_2.0.1otherdistro-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="2.0">Wine Autostart v2.0</h3>
                    <p>
                    This is the new stable version, finally ready after around 3-4 months of development!<br>
                    It is now ready for download here and in my PPA.<br><br>

                    It features the ability to monitor more than one CD/DVD drive at once, start on boot, check for updates, and it is easier to use than ever before, by far!<br><br>

                    It runs much more quickly and efficently than previous releases, and way more reliably, and it can recover from errors more easily as well.<br><br>

                    This should be a rock-solid release, but if you run into any errors or glitches, stopping and restarting Wine Autostart through controls>start/stop in the indicator may help you work around the issue.<br><br>

                    UPDATE 15/8/2015: A package has now been added for Ubuntu 15.10 (Wily Werewolf).<br><br>

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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 15.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0/Wily/wineautostart_2.0wily-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0/Wily/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0/Wily/wineautostart_2.0wily-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0/Wily/wineautostart_2.0wily-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 15.04</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0/Vivid/wineautostart_2.0vivid-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0/Vivid/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0/Vivid/wineautostart_2.0vivid-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0/Vivid/wineautostart_2.0vivid-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 14.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0/Utopic/wineautostart_2.0utopic-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0/Utopic/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0/Utopic/wineautostart_2.0utopic-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0/Utopic/wineautostart_2.0utopic-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 14.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0/Trusty/wineautostart_2.0trusty-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0/Trusty/wineautostart_2.0trusty-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0/Trusty/wineautostart_2.0trusty-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 12.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0/Precise/wineautostart_2.0precise-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0/Precise/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0/Precise/wineautostart_2.0precise-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0/Precise/wineautostart_2.0precise-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                            <td>Wine Autostart v2.0 For Other Linux Distributions</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0/Otherdistro/wineautostart_2.0otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0/Otherdistro/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0/Otherdistro/wineautostart_2.0otherdistro-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0/Otherdistro/wineautostart_2.0otherdistro-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="2.0rc1">Wine Autostart v2.0~rc1</h3>
                    <p>
                    This is the first, and the only release candidate for version 2.0.<br><br>

                    This has now been released. 2.0 stable was released on the 5th of May. As I expected, this was almost exactly the same as 2.0, bar the version name and the release date, and all went to plan.<br><br>#

                    UPDATE 5/5/2015: There have been several updates to these packages to fix various last-minute bugs.
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 15.04</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0~rc1/Vivid/wineautostart_2.0~rc1vivid-0ubuntu1-update2~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0~rc1/Vivid/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0~rc1/Vivid/wineautostart_2.0~rc1vivid-0ubuntu1-update2~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0~rc1/Vivid/wineautostart_2.0~rc1vivid-0ubuntu1-update2~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 14.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0~rc1/Utopic/wineautostart_2.0~rc1utopic-0ubuntu1-update2~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0~rc1/Utopic/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0~rc1/Utopic/wineautostart_2.0~rc1utopic-0ubuntu1-update2~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0~rc1/Utopic/wineautostart_2.0~rc1utopic-0ubuntu1-update2~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0~rc1/Trusty/wineautostart_2.0~rc1trusty-0ubuntu1-update2~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0~rc1/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0~rc1/Trusty/wineautostart_2.0~rc1trusty-0ubuntu1-update2~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0~rc1/Trusty/wineautostart_2.0~rc1trusty-0ubuntu1-update2~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0~rc1/Precise/wineautostart_2.0~rc1precise-0ubuntu1-update5~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0~rc1/Precise/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0~rc1/Precise/wineautostart_2.0~rc1precise-0ubuntu1-update5~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0~rc1/Precise/wineautostart_2.0~rc1precise-0ubuntu1-update5~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                            <td>Wine Autostart v2.0~rc1 For Other Linux Distributions</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0~rc1/OtherDistro/wineautostart_2.0~rc1otherdistro-0ubuntu1-update2~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0~rc1/OtherDistro/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0~rc1/OtherDistro/wineautostart_2.0~rc1otherdistro-0ubuntu1-update2~ppa1.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0~rc1/OtherDistro/wineautostart_2.0~rc1otherdistro-0ubuntu1-update2~ppa1.tar.gz.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h2 id="1.0">Wine Autostart v1.0</h2>
                    <p>
                    The latest-and-greatest version of Wine Autostart so far! It has many new features, noted in the release notes, including a new indicator and a complete rewrite in python with pygtk and wxpython. The deb (installer) packages are now available, also in the PPA at www.launchpad.net/~hamishmb/+archive/myppa<br><br>

                    * This has now been updated to include a package for Ubuntu 14.04 LTS, and Ubuntu 14.10.<br><br>

                    UPDATE 18/2/2015: A package for Ubuntu 15.04 has now been added. It is also available in my ppa.<br><br>

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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 15.04</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/1.0/Vivid/wineautostart_1.0vivid-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/1.0/Vivid/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/1.0/Vivid/wineautostart_1.0vivid-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/1.0/Vivid/wineautostart_1.0vivid-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 14.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/1.0/Utopic/wineautostart_1.0utopic-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/1.0/Utopic/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/1.0/Utopic/wineautostart_1.0utopic-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/1.0/Utopic/wineautostart_1.0utopic-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 14.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/1.0/Trusty/wineautostart_1.0trusty-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/1.0/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/1.0/Trusty/wineautostart_1.0trusty-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/1.0/Trusty/wineautostart_1.0trusty-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 13.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/1.0/Saucy/wineautostart_1.0saucy-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/1.0/Saucy/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/1.0/Saucy/wineautostart_1.0saucy-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/1.0/Saucy/wineautostart_1.0saucy-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 13.04</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/1.0/Raring/wineautostart_1.0raring-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/1.0/Raring/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/1.0/Raring/wineautostart_1.0raring-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/1.0/Raring/wineautostart_1.0raring-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 12.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/1.0/Quantal/wineautostart_1.0quantal-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/1.0/Quantal/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/1.0/Quantal/wineautostart_1.0quantal-0ubuntu1~ppa1_all.deb.asc">signature</a></td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/1.0/Quantal/wineautostart_1.0quantal-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 12.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/1.0/Precise/wineautostart_1.0precise-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/1.0/Precise/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/1.0/Precise/wineautostart_1.0precise-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/1.0/Precise/wineautostart_1.0precise-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h2 id="0.9">Wine Autostart v0.9</h2>
                    <p>
                    A newer, more stable version of Wine Autostart focusing on stability and, using a new technique to start wine, reliability as well. It's still a development version, but it's a big step closer to being stable, and will be the last development version. It is a known bug that this version has incorrect permissions inside the package, but that isn't an issue (ubuntu software centre just gives an ugly warning, it's safe to continue). It also has a slight problem with the ejecting area of the program (always comes up even if no software was run), but not a huge problem and will be fixed with the stable release.<br><br>

                    This version and all previous versions used a python script which powered the indicator (cappind.py), which is written by WebUpd8 reader Reda El Khattabi, and may well be helpful for others.
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 13.04</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/0.9/Raring/wineautostart_0.9raring-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/0.9/Raring/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/0.9/Raring/wineautostart_0.9raring-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/0.9/Raring/wineautostart_0.9raring-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 12.10</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/0.9/Quantal/wineautostart_0.9quantal-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/0.9/Quantal/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/0.9/Quantal/wineautostart_0.9quantal-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/0.9/Quantal/wineautostart_0.9quantal-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 12.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/0.9/Precise/wineautostart_0.9precise-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/0.9/Precise/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/0.9/Precise/wineautostart_0.9precise-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/0.9/Precise/wineautostart_0.9precise-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 10.04 LTS</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/0.9/Lucid/wineautostart_0.9lucid-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/0.9/Lucid/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/0.9/Lucid/wineautostart_0.9lucid-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/0.9/Lucid/wineautostart_0.9lucid-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <h2 id="0.8Series">Wine Autostart 0.8 Series</h2>
                <article>
                    <h3 id="0.8.5">Wine Autostart v0.8.5</h3>
                    <p>
                    Beta preview for version 0.9 to include the general idea for the new layout of the code.
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v0.8.5 For Ubuntu</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/0.8.5/wineautostart_0.8.5-ubuntu1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/0.8.5/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/0.8.5/wineautostart_0.8.5-ubuntu1_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/0.8.5/wineautostart_0.8.5-ubuntu1_all.deb.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h3 id="0.8">Wine Autostart v0.8</h3>
                    <p>
                    An updated version of Wine Autostart, featuring many bugfixes, simplifications to the code and a modified indicator.
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v0.8 For Ubuntu</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/0.8/Wineautostart-0.8-all.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/0.8/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/0.8/Wineautostart-0.8-all.tar.gz.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/0.8/Wineautostart-0.8-all.tar.gz.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h2 id="0.7">Wine Autostart v0.7</h2>
                    <p>
                    Broken. Very few features, and most of those features don't work without modification
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td>Wine Autostart v0.7 For Ubuntu</td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/0.7/wineautostart_0.7-ubuntu_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/0.7/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/0.7/wineautostart_0.7-ubuntu_all.deb.asc">signature</a>)</td>
                            <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/0.7/wineautostart_0.7-ubuntu_all.deb.counter"); ?></td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br>
                </article>
            </section>
            <h2>Licences</h2>
            <p>Some of the images and icons used on this page are available under the terms of different licences. For more details and the attributions, see the licenses page <a href="/policies/licenses.php">here</a></p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
