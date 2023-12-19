<?php

// getting the main_domain
$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$lastSlashPosition = strrpos($currentURL, "/");
$main_domain = substr($currentURL, 0, $lastSlashPosition);

$conn = mysqli_connect("localhost", "root", "", "img");

?>



