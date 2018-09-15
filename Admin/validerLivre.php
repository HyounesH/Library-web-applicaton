<?php
namespace Admin;
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';

define('LOCATION_ERROR',dirname(__FILE__).'erreur.html');
$db=new  DefineMethods();

if(isset($_GET['page']))
$_GET['page']=strip_tags($_GET['page']);

if(isset($_GET['id']))
$_GET['id']=strip_tags($_GET['id']);

if (isset($_POST['genre']))
$_POST['genre']=strip_tags($_POST['genre']);

if (isset($_POST['titre']))
$_POST['titre']=strip_tags($_POST['titre']);

if (isset($_POST['description']))
$_POST['description']=strip_tags($_POST['description']);

if (isset($_POST['auteur']))
$_POST['auteur']=strip_tags($_POST['auteur']);

if (isset($_POST['image']))
    $_POST['image']=strip_tags($_POST['image']);

if (isset($_POST['date_edition'])) {
    $_POST['date_edition'] = strip_tags($_POST['date_edition']);
}
if(isset($_FILES['image'])){
	$image=$_FILES['image'];
}
move_uploaded_file($image['tmp_name'], '../image_livres/'.$image['name']);
if(strcmp($_GET['page'],"ajouter")==0){
    $db->insererlivre($_POST['genre'],$_POST['titre'],$_POST['description'],$_POST['auteur'],$image['name'],$_POST['date_edition']);
    header('location:EnregSuccess.php?page=ajouter');
}
else if(strcmp($_GET['page'],"modifier")==0){

  $db->modifierLivre($_POST['genre'],$_POST['titre'],$_POST['description'],$_POST['auteur'],$image['name'],$_POST['date_edition'],$_GET['id']);
  header('location:EnregSuccess.php?page=modifier');
}

else if(strcmp($_GET['page'],"supprimer")==0){
    $db->supprimerBy('livres','code_livre',$_GET['id']);
    header('location:EnregSuccess.php?page=supprimer');

}

else{
    header('location:'.LOCATION_ERROR);
}



?>