<!DOCTYPE html>

<!-- Museum Page
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

<!-- Figure out what program we're offering downloads for -->
<?php

if (isset($_GET['program_name'])) {
    $program_name = $_GET['program_name'];

    //Check that this is a valid program name.
    $programs = ['wineautostart', 'wxfixboot', 'ddrescue-gui'];
    $programs_user_friendly = ['Wine Autostart', 'WxFixBoot', 'DDRescue-GUI'];

    //If not, we will die with an error.
    if (!in_array($program_name, $programs)) {
        die('Invalid Program Name');

    }

    //If so, get the index of the shortname, and find the user friendly name for it.
    $index = array_search($program_name, $programs);

    $program_user_friendly_name = $programs_user_friendly[$index];

} else {
    die('Invalid Program Name');
}

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title><?php echo $program_user_friendly_name; ?> Museum - hamishmb.altervista.org</title>
        <?php include_once '../config.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'db.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'tables.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'functions.php' ; ?>
        <?php
            list($relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table) = select_tables_by_program_name($program_name);
        ?>

        <?php $GLOBALS["CURRENTPAGE"] = "Museum/${program_name}"; ?>
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
                    <!-- Set 'museum' to true so that the in page nav doesn't link to the newest release :) -->
                    <?php generate_in_page_navigation($relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table, $museum = true); ?>                    
                </ol>
            </nav>
            <h1><?php echo $program_user_friendly_name; ?> Museum</h1>
            <h3>Here you can download older versions of <?php echo $program_user_friendly_name; ?>.</h3>
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

            As a programmer, I am inclined to say that you should always use both the md5 sum and the signature to verify your downloads, but the average user probably doesn't know how to; if you aren't concerned about it, don't worry too much about it.<br><br>
            <section>
                <?php generate_download_tables_and_articles($relinfo_table, $downloads_table, $program_user_friendly_name, $museum = true); ?>
            </section>
            <h2>Licences</h2>
            <p>Some of the images and icons used on this page are available under the terms of different licences. For more details and the attributions, see the licenses page <a href="/policies/licenses.php">here</a></p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
