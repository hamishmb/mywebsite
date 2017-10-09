<!DOCTYPE html>

<!-- Wine Autostart Museum Page
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
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>Wine Autostart Museum - hamishmb.altervista.org</title>
        <?php include_once '../../config.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'db.php' ; ?>
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'tables.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Museum/wineautostart'; ?>
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

<?php

$query = "SELECT * FROM " . $wa_relinfo_table . " ORDER BY Release_ID DESC";

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

    $query = "SELECT * FROM " . $wa_relid_to_seriesid_table . " WHERE Release_ID = '${Rel_ID}'";

    $get_related_series_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($get_related_series_query)) {
        //If this executes, we're in a series.
        $in_series = true;

        //Get the name for the series.
        $series_ID = $row['Series_ID'];
        $query = "SELECT * FROM " . $wa_seriesinfo_table . " WHERE Series_ID = '${series_ID}'";
        $get_series_name_query = mysqli_query($connection, $query);
        $series_name = mysqli_fetch_assoc($get_series_name_query)['Series_Name'];

        //Output a list item for the series with an ordered list inside.
?>

                    <li>
                        <a href="#<?php echo $series_name; ?>Series"><?php echo $series_name; ?> Series</a>
                        <ol>

<?php

        //Now we need to get all the releases for this series.
        $query = "SELECT * FROM " . $wa_relid_to_seriesid_table . " ORDER BY Release_ID DESC LIMIT 1,18446744073709551615";
        $get_related_releases_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($get_related_releases_query)) {
            if ($row['Series_ID'] != $series_ID) {
                continue;
            }

            $release_ID = $row['Release_ID'];

            //Log these releases as done.
            array_push($done, $release_ID);

            //Get the release name for each release.
            $query = "SELECT * FROM " . $wa_relinfo_table . " WHERE Release_ID = '${release_ID}'";
            $get_release_name_query = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($get_release_name_query);
            $release_name = $row['Release_Name'];
            $release_type = $row['Type'];

            //Make a list item for each release in this series.

?>

                            <li><a href="#<?php echo $release_name; ?>"><?php echo $release_name; ?> (<?php echo $release_type; ?>)</a></li>

<?php
        } //End making list items for the releases in this series.
?>

                        </ol>
                    </li>

<?php

    //End of series-related code.
    }

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

?>



<?php

    //}

?>
                    
                </ol>
            </nav>
            <h1>Wine Autostart Museum</h1>
            <h3>Here you can download older versions of Wine Autostart.</h3>
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

<?php

$query = "SELECT * FROM " . $wa_relinfo_table . " ORDER BY Release_ID DESC";

$release_info_query = mysqli_query($connection, $query);
$count = 0;

while ($row = mysqli_fetch_assoc($release_info_query)) {
    $count = $count + 1;

    //Ignore the first line; the latest release shouldn't be in the museum.
    if ($count == 1) {
        continue;
    }

    $ID = $row['Release_ID'];
    $version = $row['Release_Name'];
    $type = $row['Type'];
    $blurb = $row['Blurb'];

?>


                <article>
                    <h2 id="<?php echo $version; ?>">Wine Autostart v<?php echo $version; ?></h2>
                    <p><?php echo $blurb; ?></p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>


<?php 
$query = "SELECT * FROM " . $wa_downloads_table .  " WHERE Release_ID = '${ID}' ORDER BY File_ID DESC";

$files = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($files)) {
    $icon = $row['Icon'];
    $desc = $row['Description'];
    $file = $row['File'];
    $md5 = $row['MD5sum'];
    $sig = $row['Signature'];
    $counter = $row['Counter'];
    
?>


                        <tr>
                            <td><img src="<?php echo $icon; ?>" width="40" height="40" alt="Copyleft Ubuntu Logo"></td>
                            <td><?php echo $desc; ?></td>
                            <td><a href="/html/thankyou.php?prevpage=/html/Museum/wineautostart.php&program=Wine%20Autostart&file=<?php echo $file; ?>">All Systems</a> (<a href="<?php echo $md5; ?>">md5sum</a> & <a href="<?php echo $sig; ?>">signature</a>)</td>
                            <td><?php echo $counter; ?></td>
                        </tr>
                    <?php } ?>
                    </table>
                    <br>
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br>
                </article>
            <?php } ?>

            </section>
            <h2>Licences</h2>
            <p>Some of the images and icons used on this page are available under the terms of different licences. For more details and the attributions, see the licenses page <a href="/policies/licenses.php">here</a></p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
