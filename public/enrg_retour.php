<?php
namespace UserView;

session_start();

use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();
$response=$db->modifierEtudiant_emprunter(0,$_SESSION['username']);
$emprunter=$db->selectBy('emprunter','cne',$_SESSION['username']);
$donnee=$emprunter->fetch();
$Mli=$db->modifierLivres_emprunter(0,$donnee['code_livre']); 
$req=$db->supprimerBy('emprunter','cne',$_SESSION['username']);

header("location:index.php");
?>