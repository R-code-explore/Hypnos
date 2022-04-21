<?php
session_start();

$date = new DateTime();
$dateDebut = $_POST["date_debut"];
$dateFin = $_POST["date_fin"];
$reservId = $_POST["reserv_id"];

if(isset($_POST)){
    $sql = "DELETE FROM `reservations` WHERE `id` = '$reservId'";

    require_once '../connect.php';
    $query = $db->prepare($sql);
    $query->execute();

    header('Location: ../myReserve.php');
}