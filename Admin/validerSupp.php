<?php

namespace Admin;

use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();

$_GET['livre']=strip_tags($_GET['livre']);
$livre=$db->selectBy('livres','code_livre',$_GET['livre']);
?>
<html>
<head>
    <style type="text/css">
        li{
            margin-top: 15px;
        }
    </style>
    <meta charset="utf-8">
    <?php include 'head.html'; ?>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="container">
    <div class="jumbotron" style="border-radius: inherit;">
        <h1 style="color: #761c19;font-family: sans-serif;letter-spacing: 3px;">SUPPRESION DE LIVRE </h1>
        <HR>
        <h4 style="color: #985f0d">Voulez vous Vraiment supprimer le livre ci-dessous</h4>
        <?php while($donnee=$livre->fetch()) { ?>
            <div class="row">
                <div class="col-lg-3">

                <img src="../image_livres/<?php echo $donnee['photo']; ?>" class="thumbnail">
            </div>

            <div class="col-lg-7" style="margin-left: -75px;">

                <ul style="list-style-type: none;">
                    <li><strong style="color: #b92c28">Titre de Livre : </strong> <i><?php echo $donnee['titre']; ?></i>
                    </li>
                    <li><strong style="color: #b92c28">Genre de Livre : </strong>
                        <i><?php echo $donnee['libelle']; ?></i></li>
                    <li><strong style="color: #b92c28">Auteur de Livre : </strong>
                        <i><?php echo $donnee['auteur']; ?></i></li>
                    <li><strong style="color: #b92c28">Date Edition de Livre : </strong>
                        <i><?php echo $donnee['annee_edition']; ?></i></li>
                    <li><strong style="color: #b92c28">Description de Livre : </strong>
                        <i><?php echo $donnee['description']; ?></i></li>
                </ul>
            </div>
            <?php
        }
            $livre->closeCursor();
            ?>
        </div>
        <HR>
        <div class="pull-right">
        <a href="validerLivre.php?page=supprimer&id=<?php echo $_GET['livre'];?>" class="btn btn-danger" >Supprimer</a>
        <a href="supprimer.php" class="btn btn-success">Annuler</a>
        </div>
    </div>
</div>
</body>
</html>
