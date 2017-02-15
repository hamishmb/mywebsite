<!-- Home Page
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php include_once './config.php' ; ?>
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <?php $GLOBALS["CURRENTPAGE"] = 'Home'; ?>
        <link href="./html/style.css" rel="stylesheet" type="text/css">
        <title>Welcome to my website - hamishmb.altervista.org</title>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Welcome to my website!</h1>
            <section>
                <article>
                    <!-- Logos horizontally across top of page -->
                    <table class="IconList">
                        <tr>
                            <td><img src="/files/Logos/DDRescue-GUI.jpg" alt="DDRescue-GUI"></td>
                            <td><img src="/files/Logos/WxFixBoot.jpg" alt="WxFixBoot"></td>
                            <td><img src="/files/Logos/Wine%20Autostart.jpg" alt="Wine Autostart"></td>
                        </tr>
                    </table>

                    I created this website to host my programs and blog all in one place. It's a place where you can view screenshots of my programs, download them, read the changelogs, and download older versions (see the museum).

                    <p>
                    My programs are designed to help people in a sticky spot. For example, DDRescue-GUI helps users recover important data fast, using GNU ddrescue <a href="https://www.gnu.org/software/ddrescue/ddrescue.html">(GNU ddrescue's website)</a>, but without having to use the commandline, which can be a barrier to your average user. WxFixBoot fixes your Linux operating systems if they won't start, and allows you to configure your bootloader. These are advanced topics that are made accessible by the easy-to-use interface.<br><br>

                    All three of these programs are written in Python, and they utilise wxPython, a cross-platform GUI toolkit that I chose because it works on all the major platforms (MacOS, Linux and Windows). Another reason wxPython is great because it's easy to use, but very powerful at the same time. Being written in Python, these programs are naturally quite CPU and memory-efficient and will run even on very old systems without a hitch, which allows them to work quickly and efficiently.
                    </p>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
