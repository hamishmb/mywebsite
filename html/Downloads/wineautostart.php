<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Downloads For Wine Autostart - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Downloads/wineautostart'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Downloads For Wine Autostart</h1>
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
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Wine Autostart v2.0.1 For Ubuntu 16.10</td>
                    <td><a href="/files/Downloads/wineautostart/2.0.1/Yakkety/wineautostart_2.0.1yakkety-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Wine Autostart v2.0.1 For Ubuntu 16.04 LTS</td>
                    <td><a href="/files/Downloads/wineautostart/2.0.1/Xenial/wineautostart_2.0.1xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Wine Autostart v2.0.1 For Ubuntu 14.04 LTS</td>
                    <td><a href="/files/Downloads/wineautostart/2.0.1/Trusty/wineautostart_2.0.1trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                    <td>Wine Autostart v2.0.1 For Ubuntu 12.04 LTS</td>
                    <td><a href="/files/Downloads/wineautostart/2.0.1/Precise/wineautostart_2.0.1precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                    <td>***TODO***</td>
                </tr>
                <tr>
                    <td><img src="/files/Icons/Linux_logo.jpg" width="34" height="40" alt="Linux Logo"></td>
                    <td>Wine Autostart v2.0.1 For Other Linux Distributions</td>
                    <td><a href="/files/Downloads/wineautostart/2.0.1/Otherdistro/wineautostart_2.0.1otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
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
