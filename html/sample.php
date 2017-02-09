<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Sample Page - hamishmb.altervista.org</title>
        <?php include_once '../config.php' ; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Home'; ?>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Welcome to the home of DDRescue-GUI, WxFixBoot and Wine Autostart!</h1>
            <p>
            Here is some text that talks about my programs,
            and other blurb :)
            </p>
        </div>
        <!-- Footer -->
        <?php include_once $GLOBALS["INCLUDESDIR"] . 'footer.html' ; ?>
    </body>
</html>
