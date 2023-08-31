<?php
if (!isset($_POST["id"]) || $_POST["id"] == null) {
    header("location: index.php");
    exit;
} else $id = $_POST["id"];

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("home");
ViewLayout::navigation();

$manager = new Manager();
$objUser = $manager->getObjUser($id);

ViewContent::userModify($objUser);
ViewLayout::footer();
?>