<?php
namespace Admin;

use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
$livre=$db->selectLivres(0);
?>
<html>
<head>
    <?php include 'head.html'; ?>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<nav class="nav navbar-nav navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="../public/index.php" class="navbar-brand">Ensa Library</a>
        </div>
    </div>
</nav>
<div class="container-fluid" style="">
    <div class="row">
        <div class="col-lg-3">
            <div id="navbar">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="ajouter.php">Ajouter</a></li>
                    <li><a href="modifier.php" >Modifier</a></li>
                    <li class="active"><a href="supprimer.php">Supprimer</a></li>
                    <li><a href="livre_emprunter.php"><b>Livres Emprunter</b></a> </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8" style="margin-top: 60px;">
            <div class="row">
            <?php
            while ($donnee=$livre->fetch())
            {
            ?>
            <div class="col-lg-4" style="margin-top: 15px;">
                <img src='<?php echo  '../image_livres/'.$donnee['photo'] ?> ' alt="<?php echo $donnee['titre'] ?>" class="thumbnail" width="180px" height="250px">
                <a href="validerSupp.php?livre=<?php echo $donnee['code_livre']; ?>" class="btn btn-warning" style="margin-top: -10px;">Supprimer Livre</a>

            </div>

        <?php
        }
        $livre->closeCursor();
        ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
