<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("home");
ViewLayout::navigation();

$manager = new Manager();
$objStamps = $manager->getAllStamps();

ViewContent::home($objStamps);
ViewLayout::footer(); 
?>