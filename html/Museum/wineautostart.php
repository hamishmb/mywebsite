<?php
ob_start();
echo "Redirecting you to the new page...";
header("Location: ../museum.php?program_name=wineautostart");
die("");

?>
