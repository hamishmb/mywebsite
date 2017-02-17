<!DOCTYPE html>

<!-- Thank you for downloading page
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
        <title>Thank You - hamishmb.altervista.org</title>
        <?php include_once '../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Home'; ?>
    </head>
    <body>
        <!-- Safety Check - Do the download file and counter exist? -->
        <?php
            $junk = file_exists($GLOBALS["BASEDIR"] . $_GET['file']) or die("Invalid request.");
            $junk = file_exists($GLOBALS["BASEDIR"] . $_GET['file'] . ".counter") or die("Invalid request.");
        ?>

        <!-- Navigation Between Pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Thank You For Downloading <?php echo($_GET['program']) ?></h1>
            <p style="text-align: center;">
            Your file should begin downloading automatically. If it doesn't, start the download manually by clicking <a href=<?php echo("'" . $_GET['file'] . "'")?>>here.</a><br>
            To go back to the page you were on before, click <a href=<?php echo("'" . $_GET['prevpage'] . "'")?>>here.</a> To go to the home page, click <a href="/html/index.php">here.</a>
            </p>

            <!-- Provide the file after a delay of 1 second -->
            <script type="text/javascript">
                window.onload = setTimeout(function(){
                document.location = <?php echo("'" . $_GET['file'] . "'") ?>;
                },1000)
            </script>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
        <!-- Update the counter -->
        <!-- Read counter value -->
        <?php
            $counter = fopen($GLOBALS["BASEDIR"] . $_GET['file'] . ".counter", "r") or die("Unable to update counter!");
            $NumberOfDownloads = (int)fread($counter,filesize($GLOBALS["BASEDIR"] . $_GET['file'] . ".counter"));
            fclose($counter);
        ?>

        <!-- Write new value to counter -->
        <?php
            $NumberOfDownloads = $NumberOfDownloads + 1;
            $counter = fopen($GLOBALS["BASEDIR"] . $_GET['file'] . ".counter", "w") or die("Unable to update counter!");
            fwrite($counter, (string)$NumberOfDownloads);
            fclose($counter);
        ?>

    </body>
</html>
