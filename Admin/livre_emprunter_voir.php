<?php

namespace Admin;

use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();


if (isset($_GET['livre'])){
    $_GET['livre']=strip_tags($_GET['livre']);
}
$response=$db->selectBy('livres','code_livre',$_GET['livre']);
$livre=$response->fetch();
$req=$db->selectBy('emprunter','code_livre',$_GET['livre']);
$emprunter=$req->fetch();
$res=$db->selectBy('etudiant','cne',$emprunter['cne']);
$etudiant=$res->fetch();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livre Emprunter</title>
    <?php include 'head.html' ?>
    <style type="text/css">
        body{
            background-image: url("../images/red_ink.jpg");
        }

        h1{
            color: red;
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;

        }
        h4,h3{
            color: #0f0f0f;
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;

        }
        .jumbotron{
            background-color: rgba(147,6,23,0.3);
            margin-top: 5%;
        }
        </style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Livre Emprunter</h1>
        <HR>
            <div class="row">
                <div class="col-lg-3">

                    <img src="../image_livres/<?php echo $livre['photo']; ?>" class="thumbnail">
                </div>

                <div class="col-lg-7" style="margin-left: -10%;">

                    <ul style="list-style-type: none;">
                        <li><strong style="color: #b92c28">Titre de Livre : </strong> <i><?php echo $livre['titre']; ?></i>
                        </li>
                        <li><strong style="color: #b92c28">Genre de Livre : </strong>
                            <i><?php echo $livre['libelle']; ?></i></li>
                        <li><strong style="color: #b92c28">Auteur de Livre : </strong>
                            <i><?php echo $livre['auteur']; ?></i></li>
                        <li><strong style="color: #b92c28">Date Edition de Livre : </strong>
                            <i><?php echo $livre['annee_edition']; ?></i></li>
                        <li><strong style="color: #b92c28">Description de Livre : </strong>
                            <i><?php echo $livre['description']; ?></i></li>
                    </ul>
                </div>
          </div>
        <HR>
        <a href="livre_emprunter.php" class="btn btn-info pull-right"><b>Retourner</b></a>
        </div>
</div>
<?php $response->closeCursor(); ?>
</body>
</html>
