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

<!-- Figure out what program we're offering downloads for -->
<?php

if (isset($_GET['program_name'])) {
    $program_name = $_GET['program_name'];
    
    //Check that this is a valid program name.
    $programs = ['wineautostart', 'getdevinfo', 'stroodlr', 'wxfixboot', 'ddrescue-gui'];
    $programs_user_friendly = ['Wine Autostart', 'GetDevInfo', 'Stroodlr', 'WxFixBoot', 'DDRescue-GUI'];

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
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Thank You - hamishmb.altervista.org</title>
        <?php include_once '../config.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'db.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'tables.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'functions.php' ; ?>
        <?php
            list($relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table) = select_tables_by_program_name($program_name);
        ?>

        <?php $GLOBALS["CURRENTPAGE"] = 'Home'; ?>
    </head>
    <body>
        <!-- Safety Check - Does the download file exist? -->
        <?php
            $junk = file_exists($GLOBALS["BASEDIR"] . $_GET['file']) or die("Invalid request.");
        ?>

        <!-- Navigation Between Pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Thank You For Downloading <?php echo($program_user_friendly_name) ?></h1>
            <p style="text-align: center;">
            Your file should begin downloading automatically.<br>
            If it doesn't, start the download manually by clicking <a href=<?php echo("'" . $_GET['file'] . "'")?>>here.</a><br><br>

            To go to the home page, click <a href="/html/index.php">here.</a>
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
        <?php

        $query = "SELECT * FROM " . $downloads_table . " WHERE File = '{$_GET['file']}'";
        $result = mysqli_query($connection, $query);

        die_if_not_successful_query($result);

        $counter_value = mysqli_fetch_assoc($result)['Counter'];
        $counter_value += 1;

        $query = "UPDATE " . $downloads_table . " SET ";
        $query .= "Counter = '{$counter_value}' "; 
        $query .= "WHERE File = '{$_GET['file']}'";
        $result = mysqli_query($connection, $query);
        die_if_not_successful_query($result);
        
        ?>

    </body>
</html>
