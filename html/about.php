<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" rel="stylesheet" type="text/css">
        <title>About This Website - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/html/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'About'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation Between Pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <section>
                <h1>About *** SCREENSHOTS ***</h1>
                <article>
                    <h2>About this website</h2>
                    <p>
                    This website is a useful rescource for people who want to use or download my programs, and also those who want to read the changelogs and explore the museum.<br><br>

                    I wrote this website in pure HTML5 and CSS3 so it performs well even on older systems, following my policy of trying to be as backwards-compatible as possible, while still making use of new features where possible.
                    This site is a good example of that, it looks good and works fine in all the major browsers, but it still works just fine in Internet Explorer 8 and old versions of Safari and Firefox *** Check at release time ***.
                    </p>
                </article>
                <article>
                    <h2>About my programs</h2>
                    <h3>General Information</h3>
                    <p>
                    My programs are designed to help people in a sticky spot. For example, DDRescue-GUI helps users recover important data fast, using GNU ddrescue (*** Website here ***), but without having to use the commandline, which can be a barrier to your average user. WxFixBoot fixes your Linux operating systems if they won't start, and allows you to configure your bootloader. These are advanced topics that are made accessible by the easy-to-use interface.<br><br>

                    All three of these programs are written in Python, and they utilise wxPython, a cross-platform GUI toolkit that I chose because it works on all the major platforms (MacOS, Linux and Windows). Another reason wxPython is great because it's easy to use, but very powerful at the same time. Being written in Python, these programs are naturally quite CPU and memory-efficient and will run even on very old systems without a hitch, which allows them to work quickly and efficienty.
                    </p>
                    <h3>DDRescue-GUI</h3>
                    <p>
                    DDRescue-GUI is a fast, free, and open-source GUI for GNU ddrescue, and makes this powerful tool accessible to everyone. It runs on both Linux and MacOS, and is included in Parted Magic. It features a simple, intuitive interface that helps you get started, and detects all of your disks (including LVM and RAID disks) so you can select them more easily. It's designed to recover your data and get you back on your feet quickly, and it written to be efficient so that on laptops your battery lasts as long as possible in case you can't plug in to power. When your recovery is finished, DDRescue-GUI also allows you to mount your output file or device (make it accessible in layman's terms) and access your data fast.
                    </p>
                    <h3>WxFixBoot</h3>
                    <p>
                    WxFixBoot provides a way to fix your computer when it doesn't start correctly. It does this by fixing the bootloader for your Linux distro, allowing it to run properly once more. WxFixBoot can be run from a working Linux operating system installed on your computer, or from live media such as an Ubuntu DVD or Parted Magic (WxFixBoot is included in Parted Magic). The interface is simple and elegant, making a complicated operation appear simple and accessible, while also warning you of problems before they become problems.<br><br>

                    WxFixBoot is entirely open-source and supports working on multiple Linux distros at once, as well as supporting all the common bootloaders (grub2, grub2-efi, lilo, elilo, grub-legacy for transitioning old systems to grub2). It uses a more advanced version of the disk information obtainer used in DDRescue-GUI, so it detects LVM and RAID disks as well, so fixing your bootloader can be made simple and easy. Finally, WxFixBoot can also check your hard disks for errors and bad sectors, as well as backing up and restoring your bootloaders' configuration and making a diagnostic system report to aid you if you require assistance with your system.
                    </p>
                    <h3>Wine Autostart</h3>
                    <p>
                    Wine Autostart is a simple, open-source indicator that sits in the system tray. Its purpose is to prompt you to run Windows (R) software detected on CDs and DVDs inserted into your computer. You can configure which drives it monitors in the simple configuration window, and you can also tell it whether to check for updates on startup, and whether it should start on boot, amongst other things. While sitting in the background, Wine Autostart use next-to-no resources to ensure your power consumption isn't affected. Wine Autostart makes use of Autorun (R) information to know which file to start, but it can also looks for files manually and ask you which one to run in case the Autorun (R) information is incorrect or invalid.
                    </p>
                </article>
                <article>
                    <h2>About me *** SMALL PICTURE ***</h2>
                    <p>
                    I am a 17-year-old university student studying for a Computing and IT degree, and I enjoy programming in my free time. I find it rewarding to help people, and I also like to keep learning new things (hence why I wrote this website). Currently, I am a skilled Python developer, and know how to use HTML5 and CSS3, and I'm currently learning to program in C++. My next program will be written in C++, for those who are interested. I also enjoy cycling, acting, climbing, and gardening when I can.
                    </p>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
