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

                    <p>
                    My programs are designed to help people in a sticky spot. For example, DDRescue-GUI helps users recover important data fast, using GNU ddrescue (*** Website here ***), but without having to use the commandline, which can be a barrier to your average user. WxFixBoot fixes your Linux operating systems if they won't start, and allows you to configure your bootloader. These are advanced topics that are made accessible by the easy-to-use interface.<br><br>

                    All three of these programs are written in Python, and they utilise wxPython, a cross-platform GUI toolkit that I chose because it works on all the major platforms (MacOS, Linux and Windows). Another reason wxPython is great because it's easy to use, but very powerful at the same time. Being written in Python, these programs are naturally quite CPU and memory-efficient and will run even on very old systems without a hitch, which allows them to work quickly and efficienty.
                    </p>
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
