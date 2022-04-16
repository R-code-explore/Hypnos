<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Js_bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--Icons-->
    <link href='https://css.gg/css' rel='stylesheet'>
    <!-- JSDelivr -->
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>

    <!--Personal Css-->
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="<?=$pageCss;?>">

    <title><?=$headTitle;?></title>
</head>
<body>

<button type="button" class="btn btn-light btn-floating btn-lg" id="btn-back-to-top"> <i class="gg-arrow-long-up"></i> </button>

<header class="header">
    <div class="logo">
        <a href="../index.php"><img src="../assets/logo.PNG"></a>
    </div>

    <button class="general-btn menuBtn">Navigation</button>
    <div class="menu">
        <a href="<?=$firstBtn;?>"><?=$firstMenu;?></a>
        <a href="<?=$secondBtn;?>"><?=$secondMenu;?></a>
        <a href="<?=$thirdBtn;?>"><?=$thirdMenu;?></a>
        <a href="<?=$fourthBtn;?>"><?=$fourthMenu;?></a>
    </div>

    <div class="desktop-menu">
        <a href="<?=$firstBtn;?>"><?=$firstMenu;?></a>
        <a href="<?=$secondBtn;?>"><?=$secondMenu;?></a>
        <a href="<?=$thirdBtn;?>"><?=$thirdMenu;?></a>
        <a href="<?=$fourthBtn;?>"><?=$fourthMenu;?></a>
    </div>
</header>