<?php
session_start();

use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
$req=$db->selectBy('etudiant','cne',$_SESSION['username']);
$etd=$req->fetch();

?>
<html>
<head>
    <title>Livre</title>
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
        .jumbotron{
            background-color: rgba(145,145,145,0.5);
            margin-top: 50px;
        }
        h1{
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;
        }
        h3{
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;
            font-size: 1.6em;

        }
    </style>
</head>
<body>
    <header class="header_page">
        <nav class="nav navbar-inverse" >
            <div class="container-fluid">
                <div class="navbar-header" >
                    <a class="navbar-brand" href="index.php">ENSA LIBRARY </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
            <?php
if( ! isset($_SESSION['login']) ||  $_SESSION['login']!=true){
    header("location:voirLivre.php");
}
else {
	 if ($etd['emprunter']==0){ 
    ?>
                <div class="jumbotron" style="border-radius: inherit;background-color: rgba(153,44,153,0.5);margin-top: 50px;">
                    <h1 style="color:red;">Retourner Livre</h1>
                    <HR>

                    <h3>
                         vous n'avez pas encore emprunter un livre ,Merci d'avoir emprunter un livre 
                        via le lien Suivant <a href="index.php">Emprunter</a> .
                    </h3>
                </div>
          


    <?php
}
else {
	?>
	<div class="jumbotron" style="border-radius: inherit;background-color: rgba(153,44,153,0.5);margin-top: 50px;">
                    <h1 style="color:red;">Retourner Livre</h1>
                    <HR>

                    <h3>
                    est ce que voulez-vous vraiment retourner le livre que vous avez emprunter ??
                    </h3>
                    <HR>
                    <div class="pull-right">
                    <a href="enrg_retour.php" class ="btn btn-danger">Continuer</a>
                    <a href="index.php" class ="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
}
}
?>
  </div>
        </div>
    </div>
</body>
</html>
