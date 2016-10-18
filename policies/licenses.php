<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Sample Page - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/html/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Home'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <p>
            Creative Commons work was used in the creation of this website. Here folows a list of the works used and creditations:
            <ul>
                <li>The "Ubuntu" Logo used in the downloads section of the website was created By Macguy314 - Own work, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=2629119, titled 'Ubuntu logo copyleft 1.svg', and is available at <a href="https://commons.wikimedia.org/wiki/File:Ubuntu_logo_copyleft_1.svg">https://commons.wikimedia.org/wiki/File:Ubuntu_logo_copyleft_1.svg</a>, under the Creative Commons 3.0 Unported License, available at <a href="https://creativecommons.org/licenses/by-sa/3.0/deed.en">https://creativecommons.org/licenses/by-sa/3.0/deed.en</a></li>
            </ul>
            </p>
            <p>
            Additionally, some works that have no license were used in the creation of this website. Here is a list of all such works:
            <ul>
                <li>The "OS X" Logo used in the downloads section of the website was created By EdibleKarma - Own work, Public Domain, https://commons.wikimedia.org/w/index.php?curid=3625913, titled 'Light Apple Logo Free.png', and is available at <a href="https://commons.wikimedia.org/wiki/File:Light_Apple_Logo_Free.png">https://commons.wikimedia.org/wiki/File:Light_Apple_Logo_Free.png?uselang=en-gb</a>, under no license, except under countries where this is not possible, in which case "I grant anyone the right to use this work for any purpose, without any conditions, unless such conditions are required by law."</li>
                <li>The Linux Logo used in the downloads section of the website was created by Larry Ewing (email: lewing@isc.tamu.edu), and is provided for anyone to use, for any purpose, as long as the copyright holder is properly attributed. It is available for download at <a href="https://commons.wikimedia.org/wiki/File:Linux_logo.jpg?uselang=en-gb">https://commons.wikimedia.org/wiki/File:Linux_logo.jpg?uselang=en-gb</a></li>
            </ul>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
