<?php

$nom = $_POST["nom"];
    $ville = $_POST["ville"];
    $adresse = $_POST["adresse"];
    $description = $_POST["description"];
    $selectedId = $_POST["id"];

    require_once '../connect.php';

    $updateHotels = $db->prepare("UPDATE `hotels` SET `nom`='$nom',`ville`='$ville',`adresse`='$adresse',`description`='$description' WHERE `id` = '$selectedId'");

    $updateHotels->execute();

    header('Location: ../admin.php');