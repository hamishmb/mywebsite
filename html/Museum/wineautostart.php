<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>Wine Autostart Museum - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Museum/wineautostart'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Wine Autostart Museum</h1>
            <h3>Here you can download older versions of Wine Autostart.</h3>
            <p>These versions can be downloaded for educational purposes and are useful if
            you're trying to run one of my programs on an operating system that I no longer
            support, such as Ubuntu 12.10.
            </p>
            <!-- In-Page Navigation -->
            <nav>
                <p id="InPageNavTitle">Versions</p>
                <ol id="InPageNavigation">
                    <!-- 2.0 Series -->
                    <li>
                        <a href="#2.0Series">2.0 Series</a>
                        <ol>
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/wineautostart/2.0/Wily/wineautostart_2.0wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/wineautostart/2.0/Vivid/wineautostart_2.0vivid-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/wineautostart/2.0/Utopic/wineautostart_2.0utopic-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/2.0/Trusty/wineautostart_2.0trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/2.0/Precise/wineautostart_2.0precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>Wine Autostart v2.0 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wineautostart/2.0/Otherdistro/wineautostart_2.0otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/wineautostart/2.0~rc1/Vivid/wineautostart_2.0~rc1vivid-0ubuntu1-update2~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/wineautostart/2.0~rc1/Utopic/wineautostart_2.0~rc1utopic-0ubuntu1-update2~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/2.0~rc1/Trusty/wineautostart_2.0~rc1trusty-0ubuntu1-update2~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v2.0~rc1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/2.0~rc1/Precise/wineautostart_2.0~rc1precise-0ubuntu1-update5~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>Wine Autostart v2.0~rc1 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wineautostart/2.0~rc1/OtherDistro/wineautostart_2.0~rc1otherdistro-0ubuntu1-update2~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/wineautostart/1.0/Vivid/wineautostart_1.0vivid-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/wineautostart/1.0/Utopic/wineautostart_1.0utopic-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/1.0/Trusty/wineautostart_1.0trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 13.10</td>
                            <td><a href="/files/Downloads/wineautostart/1.0/Saucy/wineautostart_1.0saucy-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 13.04</td>
                            <td><a href="/files/Downloads/wineautostart/1.0/Raring/wineautostart_1.0raring-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 12.10</td>
                            <td><a href="/files/Downloads/wineautostart/1.0/Quantal/wineautostart_1.0quantal-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v1.0 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/1.0/Precise/wineautostart_1.0precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 13.04</td>
                            <td><a href="/files/Downloads/wineautostart/0.9/Raring/wineautostart_0.9raring-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 12.10</td>
                            <td><a href="/files/Downloads/wineautostart/0.9/Quantal/wineautostart_0.9quantal-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/0.9/Precise/wineautostart_0.9precise-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v0.9 For Ubuntu 10.04 LTS</td>
                            <td><a href="/files/Downloads/wineautostart/0.9/Lucid/wineautostart_0.9lucid-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v0.8.5 For Ubuntu</td>
                            <td><a href="/files/Downloads/wineautostart/0.8.5/wineautostart_0.8.5-ubuntu1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
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
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>Wine Autostart v0.8 For Ubuntu</td>
                            <td><a href="/files/Downloads/wineautostart/0.8/Wineautostart-0.8-all.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
                <article>
                    <h2 id="0.7">Wine Autostart v0.7</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wineautostart/0.7.txt"))?>
                    </p>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
