<?php
$firstMenu = "Contact";
$secondMenu = "Accueil";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";


$firstBtn = '../public/contact.php';
$secondBtn = '../index.php';
$thirdBtn = "../index.php#discover";
$fourthBtn = '../connect/singin.php';

$headTitle = "Hypnos - Connexion";

$pageCss = "../css/singin.css";
?>

    <?php
    include '../page_assets/header.php';
    ?>

    <h3>Page de connexion ou inscription</h3>

    <p style="color:red">Avoir un compte est indispensable si vous souhaitez réserver</p>

    <button class="accountDone" onclick="openAlreadyAccount()">Vous avez déjà un compte ?<br>Cliquez ici</button>

    <form class="formLogin" action="" method="post">
        
        <label for="email">Email de connexion Hypnos</label>
        <input type="email" name="email" id="email" placeholder="email@exemple.com" required>

        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass" required>

        <button type="submit" class="sub-btn">Connexion</button>

    </form>

    <button class="notAccound" onclick="openNotAccount()">Pas encore inscrit ?<br>Cliquez ici</button>

    <form class="formSingin" action="../db/singin.php" method="post">

        <label for="name">Votre nom et votre prénom</label>
        <input type="text" name="name" id="name" placeholder="John Doe" required>
        
        <label for="email">Une adresse mail valide</label>
        <input type="email" name="email" id="email" placeholder="exemple@mail.com" required>

        <label for="pass">Insérer un mot de passe</label>
        <input type="password" name="pass" id="pass" placeholder="motdepasse" required>

        <button type="submit" class="sub-btn">Inscription</button>

    </form>

    <script src="../js/singin.js"></script>
    <?php
    include '../page_assets/footer.php';
    ?>

    <div class="sep"></div>