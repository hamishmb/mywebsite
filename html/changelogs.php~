<!DOCTYPE html>

<!-- Changelogs Page
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

<!-- Figure out what program we're offering changelogs for -->
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
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title><?php echo $program_user_friendly_name; ?> Changelogs - hamishmb.altervista.org</title>
        <?php include_once '../config.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'db.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'tables.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'functions.php' ; ?>
        <?php
            list($relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table) = select_tables_by_program_name($program_name);
        ?>

        <?php $GLOBALS["CURRENTPAGE"] = "Changelogs/${program_name}"; ?>
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
                    <?php generate_in_page_navigation($relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table, $museum = false); ?>                    
                </ol>
            </nav>
            <h1>Changelogs For <?php echo $program_user_friendly_name; ?></h1>

            <section>
                <?php
                    display_changelogs($relinfo_table, $program_name, $program_user_friendly_name);
                ?>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
