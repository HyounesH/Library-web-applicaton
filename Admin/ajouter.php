<?php 
namespace Admin;
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
?>
<html>
<head>
    <?php include 'head.html'; ?>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
<meta charset="utf-8">
    <style type="text/css">
    .jumbotron{
        padding: 0px;
         padding: 7px;
    }
        body{
            background-color: rgba(46,49,152,0.2);
        }
        #form{
            margin-top: 60px;
        }
           </style>
          
</head>
<body>

    <nav class="nav navbar-nav navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
        <a href="../public/index.php" class="navbar-brand">Ensa Library</a>
    </div>
    </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3">
             <div id="navbar">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="ajouter.php"><b>Ajouter</b></a></li>
            <li><a href="modifier.php" ><b>Modifier</b></a></li>
            <li><a href="supprimer.php"><b>Supprimer</b></a></li>
            <li><a href="livre_emprunter.php"><b>Livres Emprunter</b></a> </li>
        </ul>
        </div>
         </div>
         
         <div class="col-lg-8" id="form">
         <div class="jumbotron">
             <h2 style="text-align:center;"><b><span style="color: rgb(130,78,68);">Ensa</span><span style="color: rgb(46,28,24)">Lib</span><span style="color: rgb(179,95,66)">rary</span></b></h2>
             <p>
                Developper vos compténeces avec EnsaLibray ,liberé vos esprit et et rendre l'impossible possible
             </p>
         </div>
            <div >
                <form  action="validerLivre.php?page=ajouter" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                  <label class="control-label">Titre </label>
                  <input type="text" class="form-control" name="titre" required>
                  </div>

                  <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="7" placeholder="description generale de livre " required></textarea>
                  </div>
                  <div class="form-group">
                      <label>Auteur</label>
                      <input type="text" class="form-control" name="auteur" required>

                  </div>
                  <div class="form-group">
                      <label>Date Edition</label>
                      <input type="date" class="form-control" name="date_edition" required>
                  </div>
                  <div class="form-group">
                      <label>Image de livre </label>
                      <input type="file" name="image" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Genre</label>
                      <?php $response= new DefineMethods();
                            $donnee=$response->selectAll('livres_categorie');

                       ?>
                      <select class="form-control" name="genre" required>
                          <?php while ($d=$donnee->fetch()) {
                          ?>
                          <option value="<?php echo $d['libelle']; ?>"><?php echo $d['libelle']; ?></option>
                          <?php }
                          $donnee->closeCursor();
                          ?>
                      </select>

                  </div>
                  <div class="form-group">
                      <input type="submit" value="Ajouter" class="form-control btn btn-danger">
                  </div>
                </form>

            </div> 
         </div>
      </div>    
    </div>
</body>
</html>