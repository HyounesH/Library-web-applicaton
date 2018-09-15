<?php
namespace UserView;
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
?>
<html>
<head>
    <meta charset="utf-8">
    <?php include '../Admin/head.html'?>
    <style type="text/css">
        body{
            background-image: url("../images/red_ink.jpg");
        }

        h1{
            color: red;
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;

        }
        h3{
            color: #0f0f0f;
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;

        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="jumbotron" style="border-radius: inherit;background-color: rgba(153,44,153,0.5);margin-top: 50px;">
                <h1>Création de Compte</h1>
                <HR>

                <h3>
                    Votre compte  Dans ENSA LIBRARY à été bien crée  Merci D'avoir se Connecter
                    via le lien Suivant <a href="connecter.php">Se Connecter</a> .
                </h3>
            </div>
        </div>
    </div>
</div>
</body>
</html>
