<?php
ob_start();
echo "Redirecting you to the new page...";
header("Location: ../changelogs.php?program_name=wxfixboot");
die("");

?>
