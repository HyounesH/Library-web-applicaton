<?php
namespace UserView;

session_start();

use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();

$_POST['username']=strip_tags($_POST['username']);
$_POST['password']=strip_tags($_POST['password']);

if(strcmp($db->loginConfirmation($_POST['username'],$_POST['password']),'true')===0){
$_SESSION['username']=$_POST['username'];
$_SESSION['login']=true;
header('location:index.php');
}
else{
    $_SESSION['login']=false;
    $_SESSION['username']="";
    header('location:connecter.php?login=Authentification echoue ');
}
?>