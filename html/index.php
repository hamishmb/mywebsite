<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Welcome to my website - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
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
            <h1>Welcome to my website!</h1>
            <section>
                <article>
                    I created this website to host my programs and blog all in one place. It's a place where you can view screenshots of my programs, download them, read the changelogs, and download older versions (see the museum).

                    <ul>
                        <li>*** Add more text and some images ***</li>
                        <li>*** Add download of md5sum and sig to downloads pages ***</li>
                    </ul>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
