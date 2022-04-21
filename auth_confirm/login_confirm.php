<?php

if(!empty($_POST)){
    if(isset($_POST["email"], $_POST["password"])
    && !empty($_POST["email"] && !empty($_POST["password"]))
    ){
        //Verification mail
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            die("Mail incorrect");
        }

        //Connexion a la db
        require_once '../connect.php';

        $sql = "SELECT * FROM `users` WHERE `email` = :email";

        $query = $db->prepare($sql);

        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        
        $query->execute();

        $user = $query->fetch();

        if(!$user){
            die("Utilisateur inexistant");
        }
        
        //user existant, verification mot de passe

        if(!password_verify($_POST["password"], $user["mdp"])){
            die("mot de passe incorrect");
        }else{
            echo "ok";
        }

        //User et mot de passe corrects
        //Ouverture de session PHP

        session_start();
        //Stock dans $_SESSION les infos users
        
        $_SESSION["user"] = [
            "id" => $user["id"],
            "nom" => $user["nom"],
            "email" => $user["email"],
            "role" => $user["role"],
            "hotel_id" => $user["hotel_id"]
        ];

        //redirection vers page compte

        header('Location: ../account.php');

    }
}

?>