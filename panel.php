<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();

$manager = new Manager();
$stamps = $manager->getStampNames();
$users = $manager->getUserNames();
ViewContent::panel($users, $stamps);
ViewLayout::footer(); 
?>