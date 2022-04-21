<?php
session_start();
if($_SESSION["user"]["role"] !== "gerant"){
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
$pageCss = "css/gerant.css";

include 'header.php';

?>

<a class="logoutBtn" href="logout.php">Déconnexion</a>

<h1>Bienvenue <?=$_SESSION["user"]["nom"]?></h1>

<div class="hotel-info">

    <?php

$hotelId = $_SESSION["user"]["hotel_id"];

require_once 'connect.php';

$pdoStatHotels = $db->prepare("SELECT `id`, `nom`, `ville`, `adresse`, `description` FROM `hotels` WHERE `id` = '$hotelId'");

$pdoStatHotels->execute();

$hotel = $pdoStatHotels->fetch();

    ?>
                <h5>Voici l'hôtel dont vous êtes responsable</h5>

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

</div>
<div class="add-suites">
    <form action="auth_confirm/ajout_suites.php" method="post" enctype="multipart/form-data">

    <h5>Ajouter une suite</h5>
        
        <div class="label_input">
        <label for="nom">Nom de la suite</label>
        <input type="text" name="nom" id="nom" placeholder="Exemple: suite 2" required>
        </div>

        <div class="label_input">
        <label for="first_image">Insérer l'image de couverture</label>
        <input type="file" name="first_image" id="first_image" required>
        </div>

        <div class="label_input">
        <label for="description">Description de la suite</label>
        <textarea name="description" id="description" placeholder="Description aura lieu ici" required></textarea>
        </div>

        <div class="label_input">
        <label for="tarif">Le tarif de la chambre</label>
        <input type="number" name="prix" id="prix" placeholder="Ex: 149.00" required>
        </div>

        <div class="label_input">
        <label>Charger 3 images qui serviront à la galerie de la suite</label>
        <input type="file" name="img_glr_1" id="imgs1" required>
        <input type="file" name="img_glr_2" id="imgs2" required>
        <input type="file" name="img_glr_3" id="imgs3" required>
        </div>

        <p>Indiquer la disponibilité</p>

        <div class="dispo_choice">
        <label for="dispo">Oui</label>
        <input type="radio" name="dispo" value="Oui" id="dispo">
        </div>
        
        <div class="dispo_choice">
        <label for="indispo">Non</label>
        <input type="radio" name="dispo" value="Non" id="indispo">
        </div>

        <button class="button" type="submit">Ajouter</button>

    </form>
</div>

<div class="modif-suites">
    <form action="auth_confirm/modif_suites.php" method="post" enctype="multipart/form-data">

    <h5>Modifier une suite</h5>

        <div class="label_input">
        <label for="nom">Numéro d'identification de la suite à modifier</label>
        <input type="number" name="id" id="id" placeholder="Exemple: 1" required>
        </div>

        <div class="label_input">
        <label for="first_image">Changer l'image mise en avant</label>
        <input type="file" name="first_image" id="first_image" required>
        </div>

        <div class="label_input">
        <label for="description">Changer la description</label>
        <textarea name="description" id="description" placeholder="Description aura lieu ici" required></textarea>
        </div>

        <div class="label_input">
        <label for="tarif">Changer le prix</label>
        <input type="number" name="prix" id="prix" placeholder="Ex: 149.00" required>
        </div>

        <div class="label_input">
        <label>Changer 3 images qui serviront à la galerie de la suite</label>
        <input type="file" name="img_glr_1" id="imgs1" required>
        <input type="file" name="img_glr_2" id="imgs2" required>
        <input type="file" name="img_glr_3" id="imgs3" required>
        </div>

        <p>Indiquer la disponibilité</p>

        <div class="dispo_choice">
        <label for="dispo">Oui</label>
        <input type="radio" name="dispo" value="Oui" id="dispo">
        </div>
        
        <div class="dispo_choice">
        <label for="indispo">Non</label>
        <input type="radio" name="dispo" value="Non" id="indispo">
        </div>

        <button class="button" type="submit">Modifier</button>

    </form>
</div>

<div class="del-suites">

    <form action="auth_confirm/del_suites.php">

        <div class="label_input">
            <label for="nbr">Insérer le numéro d'identification de la suite a supprimer</label>
            <input type="number" name="id_del" id="nbr" placeholder="Ex: 1" required>
        </div>
        <button class="button" type="submit">Supprimer</button>
    </form>

</div>

<?php

include 'footer.php';

?>