<?php
session_start();

$firstMenu = "Accueil";
$secondMenu = "Réserver";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";

$firstBtn = 'index.php';
$secondBtn = 'book.php';
$thirdBtn = "index.php#discover";
$fourthBtn = 'account.php';

$headTitle = "Hypnos - Contact";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/contact.css";

include 'header.php';

?>

<form action="auth_confirm/send_msg.php" method="POST">
    <h5>Contact</h5>

    <div>
        <label for="nom">Votre nom</label>
        <input type="text" name="nom" id="nom" required>
    </div>
    <div>
        <label for="prenom">Votre prénom</label>
        <input type="text" name="prenom" id="prenom" required>
    </div>
    <div>
        <label for="email">Votre email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div id="subject">

        <div class="radio">
            <label for="choice1">- Je souhaite poser une réclamation</label>
            <input type="radio" value="Je souhaite poser une réclamation" name="subject" id="choice1" checked="checked">
        </div>
        
        <div class="radio">
            <label for="choice2">- Je souhaite commander un service supplémentaire</label>
            <input type="radio" value="Je souhaite commander un service supplémentaire" name="subject" id="choice2">
        </div>
        
        <div class="radio">
            <label for="choice3">- Je souhaite en savoir plus sur une suite</label>
            <input type="radio" id="Je souhaite en savoir plus sur une suite" name="subject" id="choice3">
        </div>

        <div class="radio">
            <label for="choice4">- J’ai un souci avec cette application</label>
            <input type="radio" value="J’ai un souci avec cette application" name="subject" id="choice4">
        </div>
        
    </div>

    <button id="submit" type="submit">Envoyer</button>
</form>

<?php

include 'footer.php'

?>