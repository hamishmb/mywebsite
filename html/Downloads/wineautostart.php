<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Downloads For Wine Autostart - errormania.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Downloads/wineautostart'; ?>
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
            <h1>Downloads For Wine Autostart</h1>
            <p>
            This is a minor update to Wine Autostart that fixes several important bugs, adds a few helpful features, and makes the GUI easier to use.<br><br>

            Most importantly, configuration is saved separately for each user, so it doesn't ask for the password all the time any more, and each user can set Wine Autostart up differently to their taste.<br><br>

            There are also a few performance improvements behind the scenes so you can get to running your software even faster.
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
                    <td>Wine Autostart v2.0.2 For Ubuntu 16.10</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.2/Yakkety/wineautostart_2.0.2yakkety-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.2/Yakkety/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.2/Yakkety/wineautostart_2.0.2yakkety-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.2/Yakkety/wineautostart_2.0.2yakkety-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Wine Autostart v2.0.2 For Ubuntu 16.04 LTS</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.2/Xenial/wineautostart_2.0.2xenial-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.2/Xenial/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.2/Xenial/wineautostart_2.0.2xenial-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.2/Xenial/wineautostart_2.0.2xenial-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Wine Autostart v2.0.2 For Ubuntu 14.04 LTS</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.2/Trusty/wineautostart_2.0.2trusty-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.2/Trusty/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.2/Trusty/wineautostart_2.0.2trusty-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.2/Trusty/wineautostart_2.0.2trusty-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.jpg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Wine Autostart v2.0.2 For Ubuntu 12.04 LTS</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.2/Precise/wineautostart_2.0.2precise-0ubuntu1~ppa1_all.deb">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.2/Precise/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.2/Precise/wineautostart_2.0.2precise-0ubuntu1~ppa1_all.deb.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.2/Precise/wineautostart_2.0.2precise-0ubuntu1~ppa1_all.deb.counter"); ?></td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>Wine Autostart v2.0.2 For Other Linux Distributions</td>
                    <td><a href="/html/thankyou.php?prevpage=/html/Downloads/wineautostart.php&program=Wine%20Autostart&file=/files/Downloads/wineautostart/2.0.2/Otherdistro/wineautostart_2.0.2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a> (<a href="/files/Downloads/wineautostart/2.0.2/Otherdistro/md5sums.txt">md5sum</a> & <a href="/files/Downloads/wineautostart/2.0.2/Otherdistro/wineautostart_2.0.2otherdistro-0ubuntu1~ppa1.tar.gz.asc">signature</a>)</td>
                    <td><?php $junk = readfile($GLOBALS["BASEDIR"] . "/files/Downloads/wineautostart/2.0.2/Otherdistro/wineautostart_2.0.2otherdistro-0ubuntu1~ppa1.tar.gz.counter"); ?></td>
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
