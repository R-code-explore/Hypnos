<?php
session_start();

if(!isset($_FILES["first_image"], $_FILES["img_glr_1"], $_FILES["img_glr_2"], $_FILES["img_glr_3"])
&& empty($_POST["nom"])
&& empty($_POST["description"])
&& empty($_POST["prix"])
&& empty($_POST["dispo"])){

    die("formulaire incomplet");

}else{

    //Les extensions images valides
    $allowed = [
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "png" => "image/png",
        "PNG" => "image/png"
    ];

    //Récupération infos images
    $first_image = $_FILES["first_image"]["name"];
    $img1 = $_FILES["img_glr_1"]["name"];
    $img2 = $_FILES["img_glr_2"]["name"];
    $img3 = $_FILES["img_glr_3"]["name"];

    $imgs = [
        $first_image,
        $img1,
        $img2,
        $img3
    ];

    $first_image_type = $_FILES["first_image"]["type"];
    $img1_type = $_FILES["img_glr_1"]["type"];
    $img2_type = $_FILES["img_glr_2"]["type"];
    $img3_type = $_FILES["img_glr_1"]["type"];

    //Vérification de l'extension et du type
    $extension_first_image = pathinfo($first_image, PATHINFO_EXTENSION);
    $extension_img1 = pathinfo($img1, PATHINFO_EXTENSION);
    $extension_img2 = pathinfo($img2, PATHINFO_EXTENSION);
    $extension_img3 = pathinfo($img3, PATHINFO_EXTENSION);

    //Vérfication de la bonne présence des extensions ou types autorisés.
    if(!array_key_exists($extension_first_image, $allowed)
    || !array_key_exists($extension_img1, $allowed)
    || !array_key_exists($extension_img2, $allowed)
    || !array_key_exists($extension_img3, $allowed)){
        die("format de fichier incorrect");
    }

    //Copie des images envoyées par le gérant vers le dossier de stockage des images.
    $first_image_new = __DIR__ . "/../upload_images/$first_image";
    $img1_new = __DIR__ . "/../upload_images/$img1";
    $img2_new = __DIR__ . "/../upload_images/$img2";
    $img3_new = __DIR__ . "/../upload_images/$img3";

    if(!move_uploaded_file($_FILES["first_image"]["tmp_name"], $first_image_new) || !move_uploaded_file($_FILES["img_glr_1"]["tmp_name"], $img1_new) || !move_uploaded_file($_FILES["img_glr_2"]["tmp_name"], $img2_new) || !move_uploaded_file($_FILES["img_glr_3"]["tmp_name"], $img3_new)){
        die("L'ajout d'images a échoué");
    }

    //Récupération d'infos autres que les images

    $nom = strip_tags($_POST["nom"]);
    $description = strip_tags($_POST["description"]);
    $prix = strip_tags($_POST["prix"]);
    $dispo = ($_POST["dispo"]);

    $hotel_id = $_SESSION["user"]["hotel_id"];

    require_once '../connect.php';

    $sql = "INSERT INTO `suites`(`nom`, `first_image`, `description`, `prix`, `glr_image1`, `glr_image2`, `glr_image3`, `dispo`, `id_hotel`) VALUES ('$nom','$first_image','$description','$prix','$img1','$img2','$img3',:dispo,'$hotel_id')";

    $query = $db->prepare($sql);

    $query->bindValue(":dispo", $dispo, PDO::PARAM_STR);

    $query->execute();

    if(!$query->execute()){
        die("Error");
    }else{
        header('Location: ../gerant.php');
    }

}

?>