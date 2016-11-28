<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Downloads For DDRescue-GUI - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Downloads/ddrescue-gui'; ?>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>About md5 Checksums and Digital Signatures</h1>
            <h2>Md5 Checksums</h2>
            <p>
            The md5 sums offered on this page can be used to verify that your file downloaded successfully without corrupting in transit. These can be verified (usually on the command-line) using specific instructions for your operating system as detailed below:<br><br>

            <a href="https://help.ubuntu.com/community/HowToMD5SUM" taret="_blank">Instructions for Linux</a><br>
            <a href="https://www.garron.me/en/bits/how-to-md5sum-mac-os-x.html" target="_blank">Instructions for Mac OS X</a><br>
            <a href="https://support.microsoft.com/en-us/kb/841290" target="_blank">Instructions for Windows (2000 or higher)</a><br><br>

            In each of these cases, you can compare the output of the command to the md5 sum in the file (in the table, next to each download file).
            <h2>Digital Signatures</h2>
            The digital signatures on this page can be used to verify that your file was created by me, and hasn't been tampered with, either on the web server, or in transit to your computer. Checking these is more dificult, so I have decided not to include instructions here because they'd have to be very long to do it justice. Instead, please carry out a search on how to verify GPG signatures if you wish to learn how to do it. I will provide instructions in  documentation for my programs when it is created.<br><br>

            As a programmer, I am inclined to say that you should always use both the md6 sum and the signature to verify our downloads, but the average user probably doesn't know how to; if you aren't concerned about it, don't worry too much about it.<br><br></p>
            <h1>Downloads For DDRescue-GUI</h1>
            <p>
            This a a minor update to DDRescue-GUI v1.6 that fixes some bugs on OS X that prevent using a standard file as an output file.<br>
            Other than that, this release is identical to v1.6.<br><br>

            See the v1.6 post on my blog at www.errormania.altervista.org for all the details.<br><br>

            UPDATE 29/8/2016: The Fedora package dependencies have been fixed, sorry for any inconvenience.<br><br>

            UPDATE 9/9/2016: The OS X packages have been confirmed to work with macOS Sierra (10.12).<br><br>

            UPDATE 18/10/2016: There's now a package for Ubuntu 16.10 (Yakkety Yak) as well.<br><br>
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
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Ubuntu 16.10</td>
                    <td><a href="/files/Downloads/ddrescue-gui/1.6.1/Yakkety/ddrescue-gui_1.6.1~yakkety-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/Yakkety/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/Yakkety/ddrescue-gui_1.6.1~yakkety-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Ubuntu 16.04 LTS</td>
                    <td><a href="/files/Downloads/ddrescue-gui/1.6.1/Xenial/ddrescue-gui_1.6.1~xenial-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/Xenial/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/Xenial/ddrescue-gui_1.6.1~xenial-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Ubuntu 14.04 LTS</td>
                    <td><a href="/files/Downloads/ddrescue-gui/1.6.1/Trusty/ddrescue-gui_1.6.1~trusty-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/Trusty/ddrescue-gui_1.6.1~trusty-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Ubuntu 12.04 LTS</td>
                    <td><a href="/files/Downloads/ddrescue-gui/1.6.1/Precise/ddrescue-gui_1.6.1~precise-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/Precise/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/Precise/ddrescue-gui_1.6.1~precise-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Light_Apple_Logo_Free.png" width="34" height="40" alt="Light Apple Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Mac OS X 10.6.8 Or Higher</td>
                    <td>
                        <a href="/files/Downloads/ddrescue-gui/1.6.1/OS%20X/64-bit/DDRescue-GUI64-bit.dmg">64-bit (Recommended)</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/OS%20X/64-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/OS%20X/64-bit/DDRescue-GUI64-bit.dmg.asc">signature</a>)<br>
                        <a href="/files/Downloads/ddrescue-gui/1.6.1/OS%20X/32-bit/DDRescue-GUI32-bit.dmg">32-bit</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/OS%20X/32-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/OS%20X/32-bit/DDRescue-GUI32-bit.dmg.asc">signature</a>)
                    </td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Fedora 23 Or Higher</td>
                    <td>
                        <a href="/files/Downloads/ddrescue-gui/1.6.1/Fedora/64-bit/ddrescue-gui-1.6.1-1.fc24.x86_64.rpm">64-bit (Recommended)</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/Fedora/64-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/Fedora/64-bit/ddrescue-gui-1.6.1-1.fc24.x86_64.rpm.asc">signature</a>)<br>
                        <a href="/files/Downloads/ddrescue-gui/1.6.1/Fedora/32-bit/ddrescue-gui-1.6.1-1.fc24.i686.rpm">32-bit</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/Fedora/32-bit/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/Fedora/32-bit/ddrescue-gui-1.6.1-1.fc24.i686.rpm.asc">signature</a>)
                    </td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Parted Magic</td>
                    <td><a href="/files/Downloads/ddrescue-gui/1.6.1/Pmagic/ddrescue-gui_1.6.1~pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/Pmagic/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/Pmagic/ddrescue-gui_1.6.1~pmagic-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>DDRescue-GUI v1.6.1 For Other Linux Distributions</td>
                    <td><a href="/files/Downloads/ddrescue-gui/1.6.1/OtherDistro/ddrescue-gui_1.6.1~otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/ddrescue-gui/1.6.1/OtherDistro/md5sums.txt">md5sum</a> & <a href="/files/Downloads/ddrescue-gui/1.6.1/OtherDistro/ddrescue-gui_1.6.1~otherdistro-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                    <td>***TODO***</td>
                </tr>
            </table>
            <br>
            <h2>Older Versions?</h2>
            <p>Want to download an older version? Head over to the <a href="/html/Museum/ddrescue-gui.php">Museum</a>.</p>
            <h2>Licences</h2>
            <p>Some of the images and icons used on this page are available under the terms of different licences. For more details and the attributions, see the licenses page <a href="/policies/licenses.php">here</a></p>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
