<?php
session_start();

if(isset($_POST)){

$nomHotel = $_POST["nom_hotel"];
$adresse = $_POST["adresse"];
$date_start = $_POST["date_start"];
$date_end = $_POST["date_end"];
$userId = $_SESSION["user"]["id"];
$suiteChoice = $_POST["select_suites"];
$hotel_id = $_POST["hotel_id"];

$reservSQL = "INSERT INTO `reservations` (`nom`, `adresse`, `date_debut`, `date_fin`, `suite`, `id_user`, `hotel_id`) VALUES ('$nomHotel', '$adresse', '$date_start', '$date_end', '$suiteChoice', '$userId', '$hotel_id')";

require_once '../connect.php';

$queryReserv = $db->prepare($reservSQL);

$queryReserv->execute();

header('Location: ../myReserve.php');

}

//
//