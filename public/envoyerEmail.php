<?php
namespace UserView;
$message=strip_tags($_POST['msg']);
$email=strip_tags($_POST['email']);
$name=strip_tags($_POST['name']);

if(mail($email,"Envoie d'email de la part de ".$name,$message,null)){
    echo " message envoyer";
}
else{
    echo "erreur dans l'envoie de message";
}