<?php

$selectedId = $_POST["id"];

require_once '../connect.php';

$sqlDeleteHotel = $db->prepare("DELETE FROM `hotels` WHERE `id` = '$selectedId'");

$sqlDeleteHotel->execute();

header('Location: ../admin.php');