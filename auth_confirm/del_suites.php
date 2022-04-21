<?php

$id = $_POST["id_del"];

require_once '../connect.php';

$sql = "DELETE FROM `suites` WHERE `id` = $id";

$query = $db->prepare($sql);

$query->execute();

header('Location: ../gerant.php');