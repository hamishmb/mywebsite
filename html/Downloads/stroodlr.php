<!DOCTYPE html>

<!-- Stroodlr Downloads Page
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
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Downloads For Stroodlr - hamishmb.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Downloads/stroodlr'; ?>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>About md5 Checksums and Digital Signatures</h1>
            <h2>Md5 Checksums</h2>
            The md5 sums offered on this page can be used to verify that your file downloaded successfully without corrupting in transit. These can be verified (usually on the command-line) using specific instructions for your operating system as detailed below:<br><br>

            <a href="https://help.ubuntu.com/community/HowToMD5SUM" target="_blank">Instructions for Linux</a><br>
            <a href="https://www.garron.me/en/bits/how-to-md5sum-mac-os-x.html" target="_blank">Instructions for Mac OS X</a><br>
            <a href="https://support.microsoft.com/en-us/kb/841290" target="_blank">Instructions for Windows (2000 or higher)</a><br><br>

            In each of these cases, you can compare the output of the command to the md5 sum in the file (in the table, next to each download file).
            <h2>Digital Signatures</h2>
            The digital signatures on this page can be used to verify that your file was created by me, and hasn't been tampered with, either on the web server, or in transit to your computer. Checking these is more dificult, so I have decided not to include instructions here because they'd have to be very long to do it justice. Instead, please carry out a search on how to verify GPG signatures if you wish to learn how to do it. I will provide instructions in  documentation for my programs when it is created.<br><br>

            As a programmer, I am inclined to say that you should always use both the md5 sum and the signature to verify our downloads, but the average user probably doesn't know how to; if you aren't concerned about it, don't worry too much about it.<br><br>
            <h1>Downloads For Stroodlr</h1>
            <p>
            This is the first release of Stroodlr. It is a development release, because while I've found it to be relatively stable, it doesn't have a lot of features.<br><br>

            It is potentially interesting, but not terribly useful at the moment, hence "Apricot Curry".
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
                    <td>Stroodlr v0.9 For Ubuntu 17.04</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Zesty/stroodlr_0.9zesty-0ubuntu1~ppa1_amd64.deb">64-bit (Recommended)</a> (<a href="/files/Downloads/stroodlr/0.9/Zesty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Zesty/stroodlr_0.9zesty-0ubuntu1~ppa1_amd64.deb.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Zesty/stroodlr_0.9zesty-0ubuntu1~ppa1_i386.deb">32-bit</a> (<a href="/files/Downloads/stroodlr/0.9/Zesty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Zesty/stroodlr_0.9zesty-0ubuntu1~ppa1_i386.deb.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Zesty/stroodlr-0.9zesty-0ubuntu1_amd64.deb.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Zesty/stroodlr-0.9zesty-0ubuntu1_i386.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Stroodlr v0.9 For Ubuntu 16.10</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Yakkety/stroodlr_0.9yakkety-0ubuntu1~ppa1_amd64.deb">64-bit (Recommended)</a> (<a href="/files/Downloads/stroodlr/0.9/Yakkety/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Yakkety/stroodlr_0.9yakkety-0ubuntu1~ppa1_amd64.deb.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Yakkety/stroodlr_0.9yakkety-0ubuntu1~ppa1_i386.deb">32-bit</a> (<a href="/files/Downloads/stroodlr/0.9/Yakkety/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Yakkety/stroodlr_0.9yakkety-0ubuntu1~ppa1_i386.deb.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Yakkety/stroodlr-0.9yakkety-0ubuntu1_amd64.deb.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Yakkety/stroodlr-0.9yakkety-0ubuntu1_i386.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Stroodlr v0.9 For Ubuntu 16.04 LTS</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Xenial/stroodlr_0.9xenial-0ubuntu1~ppa1_amd64.deb">64-bit (Recommended)</a> (<a href="/files/Downloads/stroodlr/0.9/Xenial/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Xenial/stroodlr_0.9xenial-0ubuntu1~ppa1_amd64.deb.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Xenial/stroodlr_0.9xenial-0ubuntu1~ppa1_i386.deb">32-bit</a> (<a href="/files/Downloads/stroodlr/0.9/Xenial/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Xenial/stroodlr_0.9xenial-0ubuntu1~ppa1_i386.deb.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Xenial/stroodlr-0.9xenial-0ubuntu1_amd64.deb.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Xenial/stroodlr-0.9xenial-0ubuntu1_i386.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Stroodlr v0.9 For Ubuntu 14.04 LTS</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Trusty/stroodlr_0.9trusty-0ubuntu1~ppa1_amd64.deb">64-bit (Recommended)</a> (<a href="/files/Downloads/stroodlr/0.9/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Trusty/stroodlr_0.9trusty-0ubuntu1~ppa1_amd64.deb.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Trusty/stroodlr_0.9trusty-0ubuntu1~ppa1_i386.deb">32-bit</a> (<a href="/files/Downloads/stroodlr/0.9/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Trusty/stroodlr_0.9trusty-0ubuntu1~ppa1_i386.deb.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Trusty/stroodlr-0.9trusty-0ubuntu1_amd64.deb.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Trusty/stroodlr-0.9trusty-0ubuntu1_i386.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>Stroodlr v0.9 For Fedora 26</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc26.x86_64.rpm">64-bit (Recommended)</a> (<a href="/files/Downloads/stroodlr/0.9/Fedora/64-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc26.x86_64.rpm.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc26.i686.rpm">32-bit</a> (<a href="/files/Downloads/stroodlr/0.9/Fedora/32-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc26.i686.rpm.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc26.x86_64.rpm.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc26.i686.rpm.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>Stroodlr v0.9 For Fedora 25</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc25.x86_64.rpm">64-bit (Recommended)</a> (<a href="/files/Downloads/stroodlr/0.9/Fedora/64-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc25.x86_64.rpm.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc25.i686.rpm">32-bit</a> (<a href="/files/Downloads/stroodlr/0.9/Fedora/32-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc25.i686.rpm.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc25.x86_64.rpm.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc25.i686.rpm.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>Stroodlr v0.9 For Fedora 24</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc24.x86_64.rpm">64-bit (Recommended)</a> (<a href="/files/Downloads/stroodlr/0.9/Fedora/64-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc24.x86_64.rpm.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc24.i686.rpm">32-bit</a> (<a href="/files/Downloads/stroodlr/0.9/Fedora/32-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc24.i686.rpm.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Fedora/64-bit/stroodlr-0.9-1.fc24.x86_64.rpm.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/Fedora/32-bit/stroodlr-0.9-1.fc24.i686.rpm.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>Stroodlr v0.9 For Other Linux Distributions</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/stroodlr.php&program=stroodlr&file=/files/Downloads/stroodlr/0.9/OtherDistro/stroodlr_0.9otherdistro~update1-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/stroodlr/0.9/OtherDistro/md5sums.txt">md5sum</a> & <a href="/files/Downloads/stroodlr/0.9/OtherDistro/stroodlr_0.9otherdistro~update1-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/stroodlr/0.9/OtherDistro/stroodlr_0.9otherdistro~update1-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                </tr>
            </table>
            <br>
            <h2>Older Versions?</h2>
            <p>This is the first version of Stroodlr.</p>
            <h2>Licences</h2>
            <p>Some of the images and icons used on this page are available under the terms of different licences. For more details and the attributions, see the licenses page <a href="/policies/licenses.php">here</a></p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
