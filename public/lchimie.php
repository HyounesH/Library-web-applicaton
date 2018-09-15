<?php
namespace UserView;
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
$livre=$db->selectLivresByGenre(0,'Chimie');

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

        .jumbotron {
            background-color: rgba(149, 16, 30, 0.5);
            margin-top: 10px;
            padding-bottom: 15px;
            padding-top: 15px;        }
         h3{
            letter-spacing: 6px;
            font-family: "Tekton Pro", serif;
            font-size: 2.7em;
            color: white;

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
<div class="container">
    <div class="jumbotron text-center" style="border-radius:inherit;" >
    <h3> <b>Livres Chimie</b> </h3>
    </div>
    <div class="row" style="margin-top: 20px;">
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
</body>
</html>