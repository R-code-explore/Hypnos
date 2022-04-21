<?php
session_start();
if($_SESSION["user"]["nom"] !== "Administrateur"){
    unset($_SESSION["user"]);
    header('Location: auth.php');
    exit;
}


$firstMenu = "Contact";
$secondMenu = "Réserver";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";

$firstBtn = 'contact.php';
$secondBtn = 'book.php';
$thirdBtn = "#discover";
$fourthBtn = 'account.php';

$headTitle = "Hypnos - Gérant";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/admin.css";

include 'header.php';

?>

<h1>Bienvenue <?=$_SESSION["user"]["nom"]?></h1>

<a class="logoutBtn" href="logout.php">Déconnexion</a>
<p class="displayEmail">Email: <?=$_SESSION["user"]["email"]?></p>

<div class="actions">
    <div class="hotels">
        <form action="auth_confirm/hotel-add.php" method="POST">
        <h5>Ajoutez un hotel</h5>

            <div class="label_input">
            <input type="text" name="  nom" id="nom" placeholder="Nom de l'hotel" required>
            </div>

            <div class="label_input">
            <input type="text" name="ville" id="ville" placeholder="Ville" required>
            </div>

            <div class="label_input">
            <input type="text" name="adresse" id="adresse" placeholder="adresse" required>
            </div>

            <textarea name="description" id="description" placeholder="description de l'hotel" required></textarea>

            <button class="button" type="submit">Ajouter hôtel</button>
        </form>

    </div>

    <div class="gerants">
        <form action="auth_confirm/gerant-add.php" method="POST">
        <h5>Ajoutez un gérant</h5>
            
            <div class="label_input">
            <input type="text" name="nom" id="nom" placeholder="Nom et prénom du gérant" required>
            </div>

            <div class="label_input">
            <input type="email" name="email" id="email" placeholder="mail du gérant" required>
            </div>

            <div class="label_input">
            <input type="text" name="password" id="password" placeholder="Le mot de passe du gérant" required>
            </div>

            <div class="label_input">
            <input type="number" name="hotel" id="hotel" placeholder="Id hotel pour le gérant">
            </div>

            <button class="button" type="submit">Ajouter gérant</button>
        </form>

    </div>
        
        <?php
        require_once 'connect.php';

        $pdoStatHotels = $db->prepare("SELECT * FROM `hotels`");

        $executeHotelOk = $pdoStatHotels->execute();

        $hotels = $pdoStatHotels->fetchAll();

        $pdoStatGerants = $db->prepare("SELECT * FROM `users` WHERE `role` = 'gerant'");

        $executeGerantOk = $pdoStatGerants->execute();

        $gerants = $pdoStatGerants->fetchAll();

        ?>

            <div class="infos">

            <h3>Liste hôtels</h3>
                <?php foreach($hotels as $hotel): ?>
                

                <p>
                    <strong>Numéro identification hôtel: </strong> <?= $hotel["id"] ?>
                    <br>
                    <strong>Nom: </strong><?= $hotel["nom"] ?>
                    <br>
                    <strong>Ville: </strong><?= $hotel["ville"] ?>
                    <br>
                    <strong>Adresse: </strong><?= $hotel["adresse"] ?>
                    <br>
                    <strong>Description: </strong><?= $hotel["description"] ?>
                    <br>
                </p>


                <?php endforeach; ?>

            <div class="liste_gerants">
            <h3>Liste Gérants</h3>
            <?php foreach($gerants as $gerant): ?>
                

                <p>
                    <strong>Numéro identification gérant: </strong> <?= $gerant["id"] ?>
                    <br>
                    <strong>Nom: </strong><?= $gerant["nom"] ?>
                    <br>
                    <strong>Email: </strong><?= $gerant["email"] ?>
                    <br>
                    <strong>Id de l'hôtel attribué: </strong><?= $gerant["hotel_id"] ?>
                    <br>
                </p>


                <?php endforeach; ?>

            </div>

            </div>

        <div class="gerance_hotels">
            
            <form action="hotels_actions/modify.php" method="post">
                
                <h5>Modifier un établissement</h5>

                <div class="label_input">
                <input type="number" name="id" id="id" placeholder="ID, ex: 2" required>
                </div>
                
                <div class="label_input">
                <input type="text" name="nom" id="nom" placeholder="nom" required>
                </div>

                <div class="label_input">
                <input type="text" name="ville" id="ville" placeholder="La ville de l'hôtel" required>
                </div>

                <div class="label_input">
                <input type="text" name="adresse" id="adresse" placeholder="L'adresse" required>
                </div>

                <textarea name="description" id="description" placeholder="La description" required></textarea>

                <button class="button" type="submit">Modifier</button>
            </form>

            <form action="hotels_actions/delete.php" method="post">
                <h5>Supprimer un établissement</h5>
                <div class="label_input">
                <input type="number" name="id" id="id" placeholder="Entrez l'id de l'hôtel à supprimer" required>
                </div>
                <button class="button" type="submit">Supprimer</button>
            </form>
        </div>
        
</div>
