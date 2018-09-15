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
                     <li><a href="ajouter.php" >Ajouter</a></li>
                     <li class="active"><a href="modifier.php" t>Modifier</a></li>
                     <li><a href="supprimer.php">Supprimer</a></li>
                     <li><a href="livre_emprunter.php"><b>Livres Emprunter</b></a> </li>
                 </ul>
             </div>
          </div>
         <div class="col-lg-8" id="form" style="margin-top:60px;">
             <?php
             while ($donnee=$livre->fetch())
             {
              ?>
                <div class="col-lg-4">
                    <img src='<?php echo  '../image_livres/'.$donnee['photo'] ?> ' alt="<?php echo $donnee['titre'] ?>" class="thumbnail" width="180px" height="250px">
                    <a href="<?php echo '#'.$donnee['code_livre']?>" type="button" class="btn btn-info " data-toggle="modal" style="margin-top: -10px;">Voir Livre</a>
                    <h4 style="color: red;">
                        <?php
                        $code_livre=$donnee['code_livre'];
                        if(isset($_GET[$code_livre]))
                        echo $_GET[$code_livre];
                        ?>
                    </h4>

                    <!-- Modal -->
                    <div id="<?php echo $donnee['code_livre'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <img src="<?php echo '../image_livres/'.$donnee['photo']?>" alt="<?php echo $donnee['titre'] ?>"
                                         class="img-rounded" height="90px">
                                    <h4 style="color: #761c19;text-align: center"><?php echo $donnee['titre'] ?></h4>
                                    <h5 style="text-align: center"><?php echo  $donnee['description'] ?></h5>
                                    <h4><span style="color:#761c19;">Genre :</span> <?php echo $donnee['libelle'] ?></h4>
                                </div>
                                <div class="modal-body" style="margin-bottom: 10px;">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" role="form" action="validerLivre.php?page=modifier&id=<?php echo $donnee['code_livre'];?>" >
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Titre :</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="titre" class="form-control" value="<?php
                                                echo $donnee['titre'];
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Description:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control"  name="description" rows="7" required><?php echo $donnee['description']; ?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Auteur :</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="auteur" class="form-control" value="<?php
                                                echo $donnee['auteur'];
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Date Edition :</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="date_edition" class="form-control" value="<?php
                                                echo $donnee['annee_edition'];
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Image :</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image" class="form-control"  value="<?php
                                                echo $donnee['photo'];
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Genre :</label>
                                            <div class="col-sm-10">
                                                <?php $response= new DefineMethods();
                                                $donnee=$response->selectAll('livres_categorie');

                                                ?>
                                                <select class="form-control" name="genre" required>
                                                    <?php while ($d=$donnee->fetch()) {
                                                        ?>
                                                        <option value="<?php echo $d['libelle']; ?> "><?php echo $d['libelle']; ?></option>
                                                    <?php }
                                                    $donnee->closeCursor();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn  btn-danger" style="margin-left: 30px;" value="Modifier">
                                        <input type="reset" class=" btn btn-info">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger pull-right" type="submit" style="color:white;background-color: black;" data-dismiss="modal">Quiter
                                        <span class="glyphicon glyphicon-remove"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php
             }
             $livre->closeCursor();
             ?>
         </div>

      </div>
    </div>
</body>
</html>