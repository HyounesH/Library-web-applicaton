<?php
namespace UserView;

define('ERROR_LOCATION',dirname(__FILE__).'/erreur.html');
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
if(isset($_GET['livre']) AND isset($_GET['etd'])){
$_GET['livre']=strip_tags($_GET['livre']);
$_GET['etd']=strip_tags($_GET['etd']);
}
else{
    header("location:".ERROR_LOCATION);
}
$livre=$db->selectBy('livres','code_livre',$_GET['livre']);
$comments=$db->selectComments($_GET['livre']);
?>
<html>
<head>
    <title>Access Au Livre</title>
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
            background-color: rgba(145, 145, 145, 0.5);
        }
       b, h3,h1{
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;

        }

</style>
</head>
<body>
<div class="container">
    <div class="jumbotron" style="border-radius: inherit;">
        <h1><b>les informations sur livre</b> </h1>
        <HR>
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
        </div>
        <HR>
        <div class="pull-right">
            <a href="emprunter.php?livre=<?php echo $_GET['livre'];?>" class="btn btn-danger" >Emprunter</a>
            <a href="#commentaire" class="btn btn-info"  data-toggle="modal" >Commenter</a>
            <a href="index.php" class="btn btn-success">Retour</a>
        </div>
    </div>

           <div class="jumbotron" style="background-color: rgba(14,125,36,0.4);">
               <h2 style="color: white;"><b>Les Commenataires</b></h2>
               <HR>
               <?php while ($comment=$comments->fetch()){ ?>
               <div class="alert alert-warning">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <b style="color: black;"><?php echo $comment['nomE'].' '.$comment['prenomE'].' : le '.$comment['date_commenter']; ?> :</b> <br> <?php echo $comment['message']; ?>
               </div>

             <?php  }
             $comments->closeCursor();
             ?>

           </div>
    <?php
    }
    $livre->closeCursor();
    ?>
    <!-- modal commentaire-->
    <div id="commentaire" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2><b>Commentaire</b></h2>
                </div>
                <div class="modal-body">
                    <form method="post" action="insererComments.php?livre=<?php echo $_GET['livre'] ?>">
                        <div class="form-group">
                            <label for="commentaire"><b>Commentaires :</b></label>
                            <textarea class="form-control" rows="10" name="message" required></textarea>
                        </div>

                        <div class="pull-right">
                            <input type="submit" class="btn btn-warning" value="commenter">
                            <input type="reset" class="btn btn-info">
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger pull-right" type="submit" data-dismiss="modal">Annuler
                        <span class="glyphicon glyphicon-remove"></span></button>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
