<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>Screenshots - errormania.altervista.org</title>
        <?php include_once '../config.php' ; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Screenshots'; ?>
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>

        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>Screenshots</h1>
            <!-- In-Page Navigation -->
            <div id="CenteredInPageNav">
                <p id="InPageNavTitle">Programs</p>
                <ol id="InPageNavigation">
                    <!-- DDRescue-GUI -->
                    <li><a href="#DDRescue-GUIScreenshots">DDRescue-GUI</a></li>

                    <!-- WxFixBoot -->
                    <li><a href="#WxFixBootScreenshots">WxFixBoot</a></li>

                    <!-- Wine Autostart -->
                    <li><a href="#WineAutostartScreenshots">Wine Autostart</a></li>
                </ol>
            </div>

            <!-- Page Content -->
            <section>
                <article>
                    <h2 id="DDRescue-GUIScreenshots">DDRescue-GUI</h2>
                    <h3>About Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/ddrescue-gui/About%20Window.jpg" alt="About Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Authentication Dialog</h3>
                    <img class="Screenshot" src="/files/Screenshots/ddrescue-gui/Authentication%20Dialog.jpg" alt="Authentication Dialog">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Settings Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/ddrescue-gui/Settings%20Window.jpg" alt="Settings Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Disk Information Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/ddrescue-gui/Disk%20Info%20Window.jpg" alt="Disk Info Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Main Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/ddrescue-gui/Main%20Window.jpg" alt="Main Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br><br>
                </article>
                <article>
                    <h2 id="WxFixBootScreenshots">WxFixBoot</h2><br><br>
                    <h3>About Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/wxfixboot/About%20Window.jpg" alt="About Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Authentication Dialog</h3>
                    <img class="Screenshot" src="/files/Screenshots/wxfixboot/Authentication%20Dialog.jpg" alt="About Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Bootloader Options Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/wxfixboot/Bootloader%20Options%20Window.jpg" alt="Bootloader Options Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Main Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/wxfixboot/Main%20Window.jpg" alt="Main Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Startup Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/wxfixboot/Startup%20Window.jpg" alt="Startup Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>System Information Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/wxfixboot/System%20Info%20Window.jpg" alt="System Information Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p><br><br>
                </article>
                <article>
                    <h2 id="WineAutostartScreenshots">Wine Autostart</h2><br><br>
                    <h3>About Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/wineautostart/About%20Window.jpg" alt="About Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Indicator</h3>
                    <img class="Screenshot" src="/files/Screenshots/wineautostart/Indicator.jpg" alt="Indicator">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                    <h3>Settings Window</h3>
                    <img class="Screenshot" src="/files/Screenshots/wineautostart/Settings%20Window.jpg" alt="Settings Window">
                    <p class="BackToTop"><a href="#navigation">Back To Top</a></p>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
