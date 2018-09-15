<?php
namespace Admin;

define('ERROR_LOCATION',dirname(__FILE__).'/erreur.html');
$_GET['page']=strip_tags($_GET['page']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enregistrement De livre</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <?php include 'head.html' ?>
</head>
<body>
<div class="container">
    <?php if(strcmp($_GET['page'],"ajouter")===0){ ?>
            <div class="jumbotron"  style="margin-top: 30px;">
                <h1 style="color:blue;">Enregistrement de livre </h1>
                <HR>
                <h4>Le Livre a été bien enregistrer dans la base de donnée !</h4>
                <a href="ajouter.php" class="btn btn-danger pull-right">Continuer</a>
    </div>
    <?php }
    else if(strcmp($_GET['page'],"modifier")===0){ ?>
        <div class="jumbotron"  style="margin-top: 30px;">
            <h1 style="color:blue;">Modification de livre </h1>
            <HR>
            <h4>Le Livre a été bien modifier dans la base de donnée !</h4>
            <a href="modifier.php" class="btn btn-danger pull-right">Continuer</a>
        </div>
    <?php }

    else if(strcmp($_GET['page'],"supprimer")===0){ ?>
        <div class="jumbotron"  style="margin-top: 30px;">
            <h1 style="color:blue;">Suppression de  livre </h1>
            <HR>
            <h4>Le Livre a été bien supprimer dans la base de donnée !</h4>
            <a href="supprimer.php" class="btn btn-danger pull-right">Continuer</a>
        </div>
    <?php }

    else{
        header('location:'.ERROR_LOCATION);
    }
    ?>

</div>
</body>
</html>