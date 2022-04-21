<?php

if(!empty($_POST)){
    
    if(isset($_POST["nom"], $_POST["ville"], $_POST["adresse"], $_POST["description"])
    && !empty($_POST["nom"]) && !empty($_POST["ville"]) && !empty($_POST["adresse"]) && !empty($_POST["description"])
    ){

        $nom = strip_tags($_POST["nom"]);
        $ville = strip_tags($_POST["ville"]);
        $adresse = strip_tags($_POST["adresse"]);
        $description = strip_tags($_POST["description"]);

        require_once '../connect.php';

        $sql = "INSERT INTO `hotels` (`nom`, `ville`, `adresse`, `description`) VALUES (:nom, :ville, :adresse, :descr)";

        $query = $db->prepare($sql);

        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":ville", $ville, PDO::PARAM_STR);
        $query->bindValue(":adresse", $adresse, PDO::PARAM_STR);
        $query->bindValue(":descr", $description, PDO::PARAM_STR);

        $query->execute();

        echo "Hotel ajouté";
        header('Location: ../account.php');

    }else{
        die("formulaire incomplet");
    }
}