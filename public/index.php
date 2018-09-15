<?php
namespace UserView;
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
// 0 c'est a dire seulement les livres non emprunter 
$livre=$db->selectLivres(0);

?>
<html>
<head>
    <title>Ensa Library</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Latest compiled JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- jQuery library -->
    <script src="../jquery/1.12.0/jquery.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image: url("../images/red_ink.jpg");
        }
        .col-sm-2 a{
            width: 99%;

            color: black;
            letter-spacing: 2px;
            font-family: "Tekton Pro", serif;
            font-size: 1.3em;
                 }
        .col-sm-2 a:hover{
            background-color: black;
        }         
    </style>

</head>
<body>
<header class="header_page">
    <nav class="nav navbar-inverse" >
        <div class="container-fluid">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ENSA LIBRARY </a>
            </div>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="nav navbar-nav" >
                    <li><a  href="" >Types d'associations </a> </li>
                    <li><a href="#" ></a></li>
                    <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Action
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="index.php">Emprunter</a></li>
                              <li><a href="rLivre.php">Retourner Livre</a></li>
                          </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="sign_in.php" ><span class="glyphicon glyphicon-user"></span>Crée Compte</a></li>
                    <li><a href="connecter.php" ><span class="glyphicon glyphicon-log-in"></span>Se Connecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2" style="background-color: white;height: 100%;margin-top: 0px;">
            <a href="lchimie.php" class="btn btn-info" style="margin-top: 20px;"><b>Livres Chimie</b></a>
            <a href="leconomic.php" class="btn btn-info" style="margin-top: 15px;"><b>Livres Economique</b></a>
            <a href="linfo.php" class="btn btn-info" style="margin-top: 15px;"><b>Livres Informatique</b></a>
            <a href="lmaths.php" class="btn btn-info" style="margin-top: 15px;"><b>Livres Maths</b></a>
            <a href="lmecanique.php" class="btn btn-info" style="margin-top: 15px;"><b>Livres Mecanique</b></a>
            <a href="lphysique.php" class="btn btn-info" style="margin-top: 15px;"><b>Livres Physique</b></a>
           
        </div>
        <div class="col-sm-10" style="margin-top: 20px;">
            <div class="row">
            <?php while ($donnee=$livre->fetch()){ ?>
                <div class="col-sm-3">
                    <img src="../image_livres/<?php echo $donnee['photo']?>" class="thumbnail" width="180px" height="250px">
                    <a href="voirLivre.php?livre=<?php echo $donnee['code_livre'];?>" class="btn btn-info" style="margin-top: -15px;">Voir Livre</a>
                </div>
            <?php }
            $livre->closeCursor();
            ?>
        </div>
        </div>
    </div>
</div>
</body>
</html>