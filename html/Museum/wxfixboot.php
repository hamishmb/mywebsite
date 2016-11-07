<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/html/style.css" type="text/css" rel="stylesheet">
        <title>WxFixBoot Museum - errormania.altervista.org</title>
        <?php $BASEDIR = '/var/www/'; ?>
        <?php $INCLUDESDIR = '/var/www/includes/'; ?>
        <?php $GLOBALS["CURRENTPAGE"] = 'Museum/wxfixboot'; ?>
        <!--[if lte IE 9]>
            <script src="/html5shiv/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation between pages -->
        <?php include_once $INCLUDESDIR . 'mainnavigation.php' ; ?>
        <!-- Content of the Page -->
        <div id="MainContent">
            <h1>WxFixBoot Museum</h1>
            <h3>Here you can download older versions of WxFixBoot.</h3>
            <p>These versions can be downloaded for educational purposes and are useful if
            you're trying to run one of my programs on an operating system that I no longer
            support, such as Ubuntu 12.10.
            </p>
            <!-- In-Page Navigation -->
            <nav>
                <strong id="InPageNavTitle">Versions</strong>
                <ol id="InPageNavigation">
                    <!-- 2.0 Series-->
                    <li>
                        <a href="#2.0Series">2.0 Series</a>
                        <ol>
                            <li><a href="#2.0pre2">2.0~pre2 (Development)</a></li>
                            <li><a href="#2.0pre1">2.0~pre1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- 1.0 Series -->
                    <li>
                        <a href="#1.0Series">1.0 Series</a>
                        <ol>
                            <li><a href="#1.0.2">1.0.2 (Stable)</a></li>
                            <li><a href="#1.0.1">1.0.1 (Stable)</a></li>
                            <li><a href="#1.0">1.0 (Stable)</a></li>
                            <li><a href="#1.0rc4">1.0~rc4 (Development)</a></li>
                            <li><a href="#1.0rc3">1.0~rc3 (Development)</a></li>
                            <li><a href="#1.0rc2">1.0~rc2 (Development)</a></li>
                            <li><a href="#1.0rc1">1.0~rc1 (Development)</a></li>
                        </ol>
                    </li>

                    <!-- Version 0.9 -->
                    <li><a href="#0.9">0.9 (Preview)</a></li>
                </ol>
            </nav>

            <!-- Page Content -->
            <section>
                <h2 id="2.0Series">WxFixBoot 2.0 Series</h2>
                <article>
                    <h3 id="2.0pre2">WxFixBoot v2.0~pre2</h3>
                    <p>
                    This is the second development release of WxFixBoot 2.0!<br>
                    It brings a lot of important changes and improvements over the last version, and adds much better error detection and avoidance, and support for Fedora!<br>
                    See the page on my blog at www.errormania.altervista.org, and the changelog, for more details.<br>
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Xenial/wxfixboot_2.0~pre2xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Wily/wxfixboot_2.0~pre2wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Trusty/wxfixboot_2.0~pre2trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Precise/wxfixboot_2.0~pre2precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Fedora 22 Or Higher</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Fedora/i686/wxfixboot-2.0~pre2-1.fc24.i686.rpm">32-bit</a> | <a href="/files/Downloads/wxfixboot/2.0~pre2/Fedora/x86_64/wxfixboot-2.0~pre2-1.fc24.x86_64.rpm">64-bit (Recommended)</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/Pmagic/wxfixboot_2.0~pre2pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre2 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre2/OtherDistro/wxfixboot_2.0~pre2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="2.0pre1">WxFixBoot v2.0~pre1</h3>
                    <p>
                    This is the first development release of the new, even better version of WxFixBoot!<br>
                    Further details on this release are available on my blog at www.errormania.altervista.org.
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre1 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre1/Xenial/wxfixboot_2.0~pre1xenial-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre1 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre1/Wily/wxfixboot_2.0~pre1wily-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre1/Trusty/wxfixboot_2.0~pre1trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre1/Precise/wxfixboot_2.0~pre1precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre1 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre1/Pmagic/wxfixboot_2.0~pre1pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v2.0~pre1 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/2.0~pre1/OtherDistro/wxfixboot_2.0~pre1otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <h2 id="1.0Series">WxFixBoot 1.0 Series</h2>
                <article>
                    <h3 id="1.0.2">WxFixBoot v1.0.2</h3>
                    <p>
                    This is a maintenance release that fixes some bugs in 1.0.1.<br>
                    You can see the changes below, which are still identical to 1.0.<br><br>

                    The summary from 1.0:<br><br>

                    This is the first stable release of WxFixBoot! After 9 months of development, it is finally ready! This program can be considered to be an alternative to boot-repair, except that it can also do other things as well.<br><br>

                    WxFixBoot can update your bootloader's configuration, reinstall/fix it, and change to a different bootloader. It can do these while you're running the operating system you're working on, from another OS installed on your hard drive, or from a live disk (such as an Ubuntu installer disk or image, or Parted Magic). It can also check your filesystems, either quickly, or for bad sectors as well, and backup and restore your partition table and boot sector.<br><br>

                    It features a simple, unique and intuitive GUI, which is clear, but also provides lots of helpful information and gives you advice as you use it, and it also warns you of potential pitfalls while you're setting it up. Once you've started your operation(s), it will accurately show operation and total progress, and also provide you with terminal output if you wish to see it.<br><br>

                    All in all, I'm very happy with this program, and I hope people enjoy using it.<br><br>

                    If you're interested, you can see the full changelog since version 1.0~rc4 and release notes below.<br><br>

                    *** Important: this program does not support systems that use LVM (Logical Volume Management). This is commonly used in RAID arrays. Most systems don't use LVM, so if you didn't set it up yourself or don't know what it is, you don't need to worry and can ignore this warning. If you have LVM, sorry for the inconvenience. Support is available in the current development release.<br><br>

                    UPDATE 18/2/2015: A package for Ubuntu 15.04 is now available as well!<br><br>

                    UPDATE 24/4/2015: The Ubuntu 15.04 package has been updated to fix a bug that prevented it from starting (only affects Ubuntu 15.04).<br><br>

                    UPDATE 15/8/2015: A package has now been added for Ubuntu 15.10 (Wily Werewolf).<br><br>

                    UPDATE 7/4/2016: There's now a package available for Ubuntu 16.04 LTS (Xenial Xerus).<br><br>

                    I hope you enjoy using this program, and you can check out my other packages at www.launchpad.net/~hamishmb/+related-projects
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Ubuntu 16.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Xenial/wxfixboot_1.0.2~actualreleasexenial-0ubuntu1-update1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Ubuntu 15.10</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Wily/wxfixboot_1.0.2wily-0ubuntu1-update1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Ubuntu 15.04</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Vivid/wxfixboot_1.0.2vivid-0ubuntu1-update1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Utopic/wxfixboot_1.0.2utopic-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Trusty/wxfixboot_1.0.2trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Precise/wxfixboot_1.0.2precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Pmagic/wxfixboot_1.0.2pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0.2 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.2/Otherdistro/wxfixboot_1.0.2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0.1">WxFixBoot v1.0.1</h3>
                    <p>
                    This is a new version fixing some bugs in 1.0 and adding support for Parted Magic.<br>
                    You can see the changes below, which are still identical to 1.0.<br><br>

                    The summary from 1.0:<br><br>

                    This is the first stable release of WxFixBoot! After 9 months of development, it is finally ready! This program can be considered to be an alternative to boot-repair, except that it can also do other things as well.<br><br>

                    WxFixBoot can update your bootloader's configuration, reinstall/fix it, and change to a different bootloader. It can do these while you're running the operating system you're working on, from another OS installed on your hard drive, or from a live disk (such as an Ubuntu installer disk or image, or Parted Magic). It can also check your filesystems, either quickly, or for bad sectors as well, and backup and restore your partition table and boot sector.<br><br>

                    It features a simple, unique and intuitive GUI, which is clear, but also provides lots of helpful information and gives you advice as you use it, and it also warns you of potential pitfalls while you're setting it up. Once you've started your operation(s), it will accurately show operation and total progress, and also provide you with terminal output if you wish to see it.<br><br>

                    All in all, I'm very happy with this program, and I hope people enjoy using it.<br><br>

                    If you're interested, you can see the full changelog since version 1.0~rc4 and release notes below.
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.1 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.1/Utopic/wxfixboot_1.0.1utopic-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.1 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.1/Trusty/wxfixboot_1.0.1trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0.1 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.1/Precise/wxfixboot_1.0.1precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0.1 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.1/Pmagic/wxfixboot_1.0.1pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0.1 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0.1/OtherDistro/wxfixboot_1.0.1otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0">WxFixBoot v1.0</h3>
                    <p>
                    This is the first stable release of WxFixBoot! After 9 months of development, it is finally ready! This program can be considered to be an alternative to boot-repair, except that it can also do other things as well.<br><br>

                    WxFixBoot can update your bootloader's configuration, reinstall/fix it, and change to a different bootloader. It can do these while you're running the operating system you're working on, from another OS installed on your hard drive, or from a live disk (such as an Ubuntu installer disk or image). It can also check your filesystems, either quickly, or for bad sectors as well, and backup and restore your partition table and boot sector.<br><br>

                    It features a simple, unique and intuitive GUI, which is clear, but also provides lots of helpful information and gives you advice as you use it, and it also warns you of potential pitfalls while you're setting it up. Once you've started your operation(s), it will accurately show operation and total progress, and also provide you with terminal output if you wish to see it.<br><br>

                    All in all, I'm very happy with this program, and I hope people enjoy using it.<br><br>

                    If you're interested, you can see the full changelog since version 1.0~rc4 and release notes below.
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0/Utopic/wxfixboot_1.0utopic-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0/Trusty/wxfixboot_1.0trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0/Precise/wxfixboot_1.0precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0/OtherDistro/wxfixboot_1.0otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc4">WxFixBoot v1.0~rc4</h3>
                    <p>
                    This is wxfixboot's final development release before the stable version 1.0. It has all of the features that will be present in version 1.0, with the exception of saving a system report. It also has a glitch with the overall progress bar, but that'll be fixed with 1.0 too.<br>
                    This version is mostly okay, so here is a list of operations I know are fine, are probably fine, and that I haven't tested at all.<br>
                    It has come on a long way from 1.0rc3 in terms of, well, everything! The changelog speaks for itself, being more than two sides of A4 paper!<br><br>

                    The following operations are known to work properly in most cases:<br>
                    Quick FS Check,<br>
                    Bad Sector Check,<br>
                    All bootloader operations with ELILO,<br>
                    All bootloader operations with GRUB2-UEFI,<br>
                    Backing up the bootsector,<br>
                    Backing up the partition table.<br><br>

                    The following operations should work properly, but aren't fully tested.<br>
                    All bootloader operations with GRUB2-MBR,<br>
                    All bootloader operations with LILO.<br><br>

                    The following operations have *NOT* been tested.<br>
                    Restoring the bootsector,<br>
                    Restoring the partition table,<br>
                    Making a system report,<br>
                    Support for picky/buggy EFI implementations.
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc4 For Ubuntu 14.10</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc4/Utopic/wxfixboot_1.0~rc4utopic-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc4 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc4/Trusty/wxfixboot_1.0~rc4trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc4 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc4/Precise/wxfixboot_1.0~rc4precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc4 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc4/Pmagic/wxfixboot_1.0~rc4pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc4 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc4/OtherDistro/wxfixboot_1.0~rc4otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc3">WxFixBoot v1.0~rc3</h3>
                    <p>
                    The penultimate development release. This version is literally miles ahead of 1.0rc2, and a lot has changed and improved! Read the (alarmingly long!) changelog for more details. The only thing left to do is program the task running code, and then, possibly, a little maintenance. Still, it'd be wise to use it only in VMs.
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc3 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc3/Trusty/wxfixboot_1.0~rc3.1trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc3 For Ubuntu 13.10 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc3/Saucy/wxfixboot_1.0~rc3.1saucy-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc3 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc3/Precise/wxfixboot_1.0~rc3.1precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc3 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc3/Pmagic/wxfixboot_1.0~rc3pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc3 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc3/OtherDistro/wxfixboot_1.0~rc3otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc2">WxFixBoot v1.0~rc2</h3>
                    <p>
                    An unstable release used to test whether the new finished startup scripts work well.
                    </p>
                    <table>
                        <caption><h2>Download Files</h2></caption>
                        <tr>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Download</th>
                            <th>No. Of Downloads</th>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc2 For Ubuntu 14.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc2/Trusty/wxfixboot_1.0~rc2trusty-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc2 For Ubuntu 13.10 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc2/Saucy/wxfixboot_1.0~rc2saucy-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc2 For Ubuntu 12.10 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc2/Quantal/wxfixboot_1.0~rc2quantal-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Ubuntu_logo_copyleft_1.svg" width="40px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc2 For Ubuntu 12.04 LTS</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc2/Precise/wxfixboot_1.0~rc2precise-0ubuntu1~ppa1_all.deb">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc2 For Parted Magic</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc2/Pmagic/wxfixboot_1.0~rc2pmagic-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                        <tr>
                            <td><img src="/files/Icons/Linux_logo.jpg" width="34px" height="40px"></td>
                            <td>WxFixBoot v1.0~rc2 For Other Linux Distributions</td>
                            <td><a href="/files/Downloads/wxfixboot/1.0rc2/Otherdistro/wxfixboot_1.0~rc2otherdistro-0ubuntu1~ppa1.tar.gz">All Systems</a></td>
                            <td>***TODO***</td>
                        </tr>
                    </table>
                    <br>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h3 id="1.0rc1">WxFixBoot v1.0~rc1</h3>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/1.0rc1.txt"))?>
                    </p>
                    <a class="BackToTop" href="#navigation">Back To Top</a>
                </article>
                <article>
                    <h2 id="0.9">WxFixBoot v0.9</h2>
                    <p class="TextFile"><?php echo nl2br(file_get_contents($BASEDIR . "files/Changelogs/wxfixboot/0.9.txt"))?>
                    </p>
                    <a class="BackToTop" href="#navigation">Back To Top</a><br>
                </article>
            </section>
        </div>
        <!-- Footer -->
        <?php include_once $INCLUDESDIR . 'footer.html' ; ?>
    </body>
</html>
