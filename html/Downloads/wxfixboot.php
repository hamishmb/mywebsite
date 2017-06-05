<!DOCTYPE html>

<!-- WxFixBoot Downloads Page
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
        <title>Downloads For WxFixBoot - hamishmb.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Downloads/wxfixboot'; ?>
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

            As a programmer, I am inclined to say that you should always use both the md6 sum and the signature to verify our downloads, but the average user probably doesn't know how to; if you aren't concerned about it, don't worry too much about it.<br><br>
            <h1>Downloads For WxFixBoot</h1>
            <p>
            It's time again for a new WxFixBoot. Though it has a minor version number, there are plenty of major changes in this release still.<br><br>

            This release contains multiple bug and crash fixes, as well as important new features like WIndows and macOS detection. See my blog post at www.errormania.altervista.org/wxfixboot-2-0-1-released for all the details.<br><br>

            I would recommend upgrading all existing installations to this one, and as always if you have my PPA, you will automatically get the update.<br><br>
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
                    <td>WxFixBoot v2.0.1 For Ubuntu 14.04 LTS Or Higher</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wxfixboot.php&program=WxFixBoot&file=/files/Downloads/wxfixboot/2.0.1/Trusty/wxfixboot_2.0.1trusty~update1-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wxfixboot/2.0.1/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wxfixboot/2.0.1/Trusty/wxfixboot_2.0.1trusty~update1-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wxfixboot/2.0.1/Trusty/wxfixboot_2.0.1trusty~update1-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>WxFixBoot v2.0.1 For Fedora 24 Or Higher</td>
                    <td>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/wxfixboot.php&program=WxFixBoot&file=/files/Downloads/wxfixboot/2.0.1/Fedora/64-bit/wxfixboot-2.0.1-1.fc24.x86_64.rpm">64-bit (Recommended)</a> (<a href="/files/Downloads/wxfixboot/2.0.1/Fedora/64-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wxfixboot/2.0.1/Fedora/64-bit/wxfixboot-2.0.1-1.fc24.x86_64.rpm.asc">signature</a>)<br>
                        <a href="/html/thankyou.php?prevpage=/html/Downloads/wxfixboot.php&program=WxFixBoot&file=/files/Downloads/wxfixboot/2.0.1/Fedora/32-bit/wxfixboot-2.0.1-1.fc24.i686.rpm">32-bit</a> (<a href="/files/Downloads/wxfixboot/2.0.1/Fedora/32-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wxfixboot/2.0.1/Fedora/32-bit/wxfixboot-2.0.1-1.fc24.i686.rpm.asc">signature</a>)
                    </td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wxfixboot/2.0.1/Fedora/64-bit/wxfixboot-2.0.1-1.fc24.x86_64.rpm.counter"); echo " and "; $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wxfixboot/2.0.1/Fedora/32-bit/wxfixboot-2.0.1-1.fc24.i686.rpm.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>WxFixBoot v2.0.1 For Parted Magic</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wxfixboot.php&program=WxFixBoot&file=/files/Downloads/wxfixboot/2.0.1/Pmagic/wxfixboot_2.0.1pmagic~update1-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wxfixboot/2.0.1/Pmagic/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wxfixboot/2.0.1/Pmagic/wxfixboot_2.0.1pmagic~update1-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wxfixboot/2.0.1/Pmagic/wxfixboot_2.0.1pmagic~update1-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>WxFixBoot v2.0.1 For Other Linux Distributions</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wxfixboot.php&program=WxFixBoot&file=/files/Downloads/wxfixboot/2.0.1/OtherDistro/wxfixboot_2.0.1otherdistro~update1-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wxfixboot/2.0.1/OtherDistro/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wxfixboot/2.0.1/OtherDistro/wxfixboot_2.0.1otherdistro~update1-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wxfixboot/2.0.1/OtherDistro/wxfixboot_2.0.1otherdistro~update1-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
                </tr>
            </table>
            <br>
            <h2>Older Versions?</h2>
            <p>Want to download an older version? Head over to the <a href="/html/Museum/ddrescue-gui.php">Museum</a>.</p>
            <h2>Licences</h2>
            <p>Some of the images and icons used on this page are available under the terms of different licences. For more details and the attributions, see the licenses page <a href="/policies/licenses.php">here</a></p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
