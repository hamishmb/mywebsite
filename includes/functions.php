<!-- PHP Functions file
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

<!-- Include database connection and table data.-->
<?php include_once $GLOBALS["INCLUDESDIR"] . 'db.php' ; ?>
<?php include_once $GLOBALS["INCLUDESDIR"] . 'tables.php' ; ?>

<?php

function generate_in_page_navigation($relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table) {
    global $connection;

    $query = "SELECT * FROM " . $relinfo_table . " ORDER BY Release_ID DESC";

    $release_info_query = mysqli_query($connection, $query);
    $count = 0;
    $done = [];

    while ($tlrow = mysqli_fetch_assoc($release_info_query)) {
        $count = $count + 1;

        //Ignore the first line; the latest release shouldn't be in the museum.
        if ($count == 1) {
            continue;
        }

        $Rel_ID = $tlrow['Release_ID'];

        //Check if we've already done this one. Skip if so.
        if (in_array($Rel_ID, $done)) {
            continue;
        }

        //Check if this is in a series.
        $in_series = false;

        //Handle series stuff.
        handle_series_formatting_and_creation($Rel_ID, $in_series, $done, $relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table);

        if ($in_series) {
            continue;
        }

        //If we're not in a series, just output a list item for the release and be done with it.
        $release_name = $tlrow['Release_Name'];
        $release_type = $tlrow['Type'];

        echo "<li><a href=\"#$release_name\">$release_name ($release_type)</a></li>";

        //Log this release as done.
        array_push($done, $Rel_ID);

        }
    }

    ?>

<?php

function handle_series_formatting_and_creation($Rel_ID, &$in_series, &$done, $relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table) {
    global $connection;

    $query = "SELECT * FROM " . $relid_to_seriesid_table . " WHERE Release_ID = '${Rel_ID}'";

    $get_related_series_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($get_related_series_query)) {
        //If this executes, we're in a series.
        $in_series = true;

        //Get the name for the series.
        $series_ID = $row['Series_ID'];
        $query = "SELECT * FROM " . $seriesinfo_table . " WHERE Series_ID = '${series_ID}'";
        $get_series_name_query = mysqli_query($connection, $query);
        $series_name = mysqli_fetch_assoc($get_series_name_query)['Series_Name'];

        //Output a list item for the series with an ordered list inside.
?>

                    <li>
                        <a href="#<?php echo $series_name; ?>Series"><?php echo $series_name; ?> Series</a>
                        <ol>

<?php

        //Make list items for the releases in this series.
        make_release_listitems($series_ID, $done, $relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table);
?>

                        </ol>
                    </li>

<?php

    //End of series-related code.
} }

function make_release_listitems($series_ID, &$done, $relinfo_table, $downloads_table, $relid_to_seriesid_table, $seriesinfo_table) {
    global $connection;

    //Now we need to get all the releases for this series.
    $query = "SELECT * FROM " . $relid_to_seriesid_table . " ORDER BY Release_ID DESC LIMIT 1,18446744073709551615";
    $get_related_releases_query = mysqli_query($connection, $query);

    //Make list items.
    while ($row = mysqli_fetch_assoc($get_related_releases_query)) {
        if ($row['Series_ID'] != $series_ID) {
            continue;
        }

        $release_ID = $row['Release_ID'];

        //Log these releases as done.
        array_push($done, $release_ID);

        //Get the release name for each release.
        $query = "SELECT * FROM " . $relinfo_table . " WHERE Release_ID = '${release_ID}'";
        $get_release_name_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($get_release_name_query);
        $release_name = $row['Release_Name'];
        $release_type = $row['Type'];

        //Make a list item for each release in this series.
        echo "<li><a href=\"#$release_name\">$release_name ($release_type)</a></li>";
    }
}

function select_tables_by_program_name($program_name) {
    global $wa_relinfo_table;
    global $wa_downloads_table;
    global $wa_seriesinfo_table;
    global $wa_relid_to_seriesid_table;

    global $getdevinfo_relinfo_table;
    global $getdevinfo_downloads_table;
    global $getdevinfo_seriesinfo_table;
    global $getdevinfo_relid_to_seriesid_table;

    global $stroodlr_relinfo_table;
    global $stroodlr_downloads_table;
    global $stroodlr_seriesinfo_table;
    global $stroodlr_relid_to_seriesid_table;

    global $wx_relinfo_table;
    global $wx_downloads_tablee;
    global $wx_seriesinfo_table;
    global $wx_relid_to_seriesid_table;

    global $ddrescuegui_relinfo_table;
    global $ddrescuegui_downloads_table;
    global $ddrescuegui_seriesinfo_table;
    global $ddrescuegui_relid_to_seriesid_table;

    if ($program_name === "wineautostart") {
        return array($wa_relinfo_table, $wa_downloads_table, $wa_relid_to_seriesid_table, $wa_seriesinfo_table);

    } else if ($program_name === "getdevinfo") {
        return array($getdevinfo_relinfo_table, $getdevinfo_downloads_table, $getdevinfo_relid_to_seriesid_table, $getdevinfo_seriesinfo_table);

    } if ($program_name === "stroodlr") {
        return array($stroodlr_relinfo_table, $stroodlr_downloads_table, $stroodlr_relid_to_seriesid_table, $stroodlr_seriesinfo_table);

    } if ($program_name === "wxfixboot") {
        return array($wx_relinfo_table, $wx_downloads_table, $wx_relid_to_seriesid_table, $wx_seriesinfo_table);

    } if ($program_name === "ddrescue-gui") {
        return array($ddrescuegui_relinfo_table, $ddrescuegui_downloads_table, $ddrescuegui_relid_to_seriesid_table, $ddrescuegui_seriesinfo_table);

    }

}

?>
