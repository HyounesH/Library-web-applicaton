<?php
namespace UserView;

session_start();

use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
$_GET['livre']=strip_tags($_GET['livre']);
$response=$db->selectBy('livres','code_livre',$_GET['livre']);
$livre=$response->fetch();
$req=$db->selectBy('etudiant','cne',$_SESSION['username']);
$etd=$req->fetch();
?>
<html>
<head>
    <meta charset="utf-8">
    <?php include '../Admin/head.html'  ?>
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
    <?php if ($etd['emprunter']==0){ ?>
<div class="jumbotron" style="border-radius: inherit;">
    <h1><b>Emprunter un livre</b></h1>
    <HR>
    <div class="row">
        <div class="col-sm-4">
            <img src="../image_livres/<?php echo $livre['photo']?>" class="thumbnail">
        </div>
        <div class="col-sm-6" style="margin-left: -18%;">
           <ul style="list-style-type: none">
               <li><b><h4><span style="color: red">Nom Complet :</span> <?php echo $etd['nomE'].' '.$etd['prenomE'] ?></h4></b></li>
               <li><b><h4><span style="color: red">CNE :</span> <?php echo $etd['cne'] ?></h4></b></li>
               <li><b><h4><span style="color: red">Adress :</span> <?php echo $etd['adress'] ?></h4></b></li>
               <li><b><h4><span style="color: red">Titre Livre :</span> <?php echo $livre['titre'] ?></h4></b></li>
               <li><b><h4><span style="color: red">Date Retour :</span> Aprés 15 Jours </h4></b></li>
           </ul>
        </div>
    </div>
    <HR>
    <div class="pull-right">
        <a href="engr_empruntation.php?livre=<?php echo $_GET['livre'];?>" class="btn btn-danger">Emprunter</a>
        <a href="index.php" class="btn btn-info">Annuler</a>
    </div>
</div>
    <?php }
    else { ?>
        <div class="jumbotron">
            <h1><b>Emprunter un livre</b></h1>
            <HR>
            <h3>Vous avez déja emprunter un livre ,vous devez rendre le livre que vous avez déja emprunter pour prendre un autre de votre choix </h3>
            <a href="index.php" class="btn btn-default pull-right"><b>Page Accueil</b></a>
        </div>
   <?php }
   $req->closeCursor();
    $response->closeCursor();
   ?>
</div>
</body>

</html>
