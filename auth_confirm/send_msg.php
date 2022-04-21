<?php

if(isset($_POST)){
    if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"])){

        $nom = $_POST["nom"] . ' ' . $_POST["prenom"];
        $email = $_POST["email"];
        $choixSujet = $_POST["subject"];

        $sql = "INSERT INTO `mess`(`nom`, `email`, `choix_sujet`) VALUES ('$nom','$email', :choixSujet)";

        require_once '../connect.php';

        $query = $db->prepare($sql);

        $query->bindValue(":choixSujet", $choixSujet);
        
        $query->execute();

        header('Location: ../merci.php');

    }else{
        die("Le formulaire ne s'est pas envoyé");
    }
}