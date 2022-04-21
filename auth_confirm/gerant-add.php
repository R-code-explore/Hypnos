<?php

//Verification de l'envois du form

if(!empty($_POST)){
    //Verification du remplissage des champs
    if(isset($_POST["nom"], $_POST["email"], $_POST["password"])
    && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["password"])
    ){
        //Formulaire complet

        //protection données
        $nom = strip_tags($_POST["nom"]);
        
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            die("E mail incorrect");
        }
        //Hash du mdp
        $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);
        $role = "gerant";
        $hotel_id = strip_tags($_POST["hotel"]);

        //Enregistrement de BD

        require_once '../connect.php';

        $sql = "INSERT INTO `users` (`nom`, `email`, `mdp`, `role`, `hotel_id`) VALUES (:nom, :email, '$pass', '$role', '$hotel_id')";

        $query = $db->prepare($sql);

        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();

        header('Location: ../admin.php');

    }else{
        die("formulaire incomplet");
    }
}