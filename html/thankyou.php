<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Thank You - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Home'; ?>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
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
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
