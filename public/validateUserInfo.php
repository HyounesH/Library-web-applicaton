<?php
namespace  UserView;
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();

$_POST['cne']=strip_tags($_POST['cne']);
$_POST['nomE']=strip_tags($_POST['nomE']);
$_POST['prenomE']=strip_tags($_POST['prenomE']);
$_POST['emailE']=strip_tags($_POST['emailE']);
$_POST['passwordE']=strip_tags($_POST['passwordE']);
$_POST['RpasswordE']=strip_tags($_POST['RpasswordE']);
$_POST['phoneE']=strip_tags($_POST['phoneE']);
$_POST['adressE']=strip_tags($_POST['adressE']);
$_POST['niveauE']=strip_tags($_POST['niveauE']);
if(isset($_FILES['imageE'])){
	$image=$_FILES['imageE'];
}
if(! preg_match("#^[01][0-9]{9}$#",$_POST['cne'])){
    header("location:sign_in.php?cne=CNE n'est pas valid");
}
elseif (strcmp($db->cneExist($_POST['cne']),'true')===0){
    header("location:sign_in.php?cne=CNE déja Exist !");
}
else if(strcmp($_POST['passwordE'],$_POST['RpasswordE'])!=0){
    header("location:sign_in.php?Rpass=Mot de pass n'est pas le même !");
}
else if(! preg_match("#^0[567][0-9]{8}$#",$_POST['phoneE'])){
    header("location:sign_in.php?phoneE=Numéro de Télephone n'est pas Valid");
}
else{
	move_uploaded_file($image['tmp_name'], '../image_livres/'.$image['name']);
$db->ajouter_etudiant($_POST['cne'],$_POST['nomE'],$_POST['prenomE'],$_POST['emailE'],$_POST['passwordE'],$_POST['phoneE'],$_POST['adressE'],$_POST['niveauE'],$image['name']);

        header('location:activate.php');
    }



?>