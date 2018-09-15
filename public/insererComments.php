<?php
namespace UserView;
session_start();
use \methodsDB\DefineMethods;
require '../methodsDB/DefineMethods.php';
$db=new DefineMethods();



if(isset($_GET['livre']))
    $_GET['livre']=strip_tags($_GET['livre']);

$_POST['message']=strip_tags($_POST['message']);

$db->insererCommenter($_SESSION['username'],$_GET['livre'],$_POST['message']);
$location="accessLivre.php?livre=".$_GET['livre']."&etd=".$_SESSION['username'];
header('location:'.$location);