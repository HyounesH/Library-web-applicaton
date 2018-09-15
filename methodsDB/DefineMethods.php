<?php 
namespace methodsDB;

$db=new \PDO('mysql:host=localhost;dbname=library','root','',array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION));
/**
* 
*/
class DefineMethods
{

public function getPDO(){
$db=new \PDO('mysql:host=localhost;dbname=library','root','',array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION));
return $db;
}
public function selectAll($table){
$db=$this->getPDO();
$response=$db->query('select * from '.$table);
return $response;
}
public function selectLivres($type){
    $db=$this->getPDO();
    $response=$db->query('select * from livres where livre_emprunter ='.$type);
    return $response;
}
public function selectLivresByGenre($type,$genre){
    $db=$this->getPDO();
    $response=$db->query("select * from livres where livre_emprunter ='$type' and libelle='$genre' ");
    return $response;
}
public function selectComments($code_livre){
$db=$this->getPDO();
try {
    $response = $db->query("select commenter.cne,message, DATE_FORMAT(date_commentation,'%d/%m/%y à %hH%imin%ss') as date_commenter ,nomE,prenomE from commenter,etudiant WHERE commenter.cne=etudiant.cne AND code_livre=" . $code_livre." order by date_commentation LIMIT 12");
}catch (\PDOException $ex){
    die("erreur".$ex->getMessage());
}
return $response;
}

    /**
     * @param $table le nom de tableau dans la base de donnee
     * @param $param le nom colonne  autilisé pour selectionner
     * @param $value le valeur dans lequel on selectionne le colonne désirer
     * @return \PDOStatement retourner les resultat de la requete executé
     */
public function selectBy($table,$param,$valeur){
	$db=$this->getPDO();
	try {
        $response = $db->prepare('SELECT * FROM ' . $table . ' WHERE ' . $param . ' = :valeur');
        $response->execute(array(
            'valeur' => $valeur
        ));
        return $response;
    }catch(\PDOException  $ex){
	    echo $ex;
    }

}
public function supprimerAll($table){
$db=$this->getPDO();
$req=$db->exec('delete from '.$table);
}
public function supprimerBy($table,$param,$value){
$db=$this->getPDO();
$req=$db->exec('delete from '.$table.' where '.$param.' = '.$value);
}
public function modifierLivre($libelle,$titre,$description,$auteur,$photo,$anne_edition,$id)
{
    try {
        $db = $this->getPDO();
        $db->exec("UPDATE  livres SET libelle ='" . $libelle . "',titre = '" . $titre . "', description = '" . $description ." ', auteur = '" . $auteur . "', photo = '" . $photo . "' ,annee_edition ='" . $anne_edition ." ' WHERE code_livre = " . $id);

    }catch(\PDOException $ex){
        echo $ex;
    }
}

public function loginConfirmation($username,$userpass){
$db=$this->getPDO();
try {
    $response = $db->prepare("SELECT * FROM etudiant WHERE cne=:cne AND  password=:password");
    $response->execute(array(
              'cne'=>$username,
              'password'=>$userpass
    ));
    $donnee=$response->fetch();
    if(strlen($donnee['cne'])===0 AND strlen($donnee['password'])===0){
        return 'false';
    }
    else{
        return 'true';
    }

}catch (\PDOException $ex){
    echo $ex;
}
}
public function ajouter_etudiant($cne,$nom,$prenom,$email,$password,$phone,$adress,$niveau,$photo){

$db=$this->getPDO();
	$response=$db->prepare('INSERT INTO etudiant(cne,nomE,prenomE,email,password,phone,adress,niveau,photo) VALUES (:cne,:nom,:prenom,:email,:password,:phone,:adress,:niveau,:photo)');
	$response->execute(array(
		                     'cne'=>$cne,
		                     'nom'=>$nom,
		                     'prenom'=>$prenom,
		                     'email'=>$email,
		                     'password'=>$password,
		                     'phone'=>$phone,
		                     'adress'=>$adress,
		                     'niveau'=>$niveau,
		                     'photo'=>$photo
		));
}
public  function modifierLivres_emprunter($valeur,$condition){
    if(is_int($valeur)){
        $db=$this->getPDO();
    $req=$db->exec("UPDATE livres SET livre_emprunter= '".$valeur."'WHERE code_livre =".$condition);
    }
}

public  function modifierEtudiant_emprunter($valeur,$condition){
    if(is_int($valeur)){
        $db=$this->getPDO();
        $req=$db->exec("UPDATE etudiant SET emprunter = '".$valeur."' WHERE cne =".$condition);
    }
}
public function insererlivre($libelle,$titre,$description,$auteur,$photo,$anne_edition){
	$db=$this->getPDO();
	$response=$db->prepare('insert into livres(libelle,titre,description,auteur,photo,annee_edition) values(:libelle,:titre,:description,:auteur,:photo,:annee_edition)');
	$response->execute(array(
		                   'libelle'=>$libelle,
		                   'titre'=>$titre,
		                   'description'=>$description,
		                   'auteur'=>$auteur,
		                   'photo'=>$photo,
		                   'annee_edition'=>$anne_edition

		                   ));
}
public function cneExist($cne){
    $db=$this->getPDO();
    $req=$db->query('SELECT * FROM etudiant WHERE cne ='.$cne);
    $res=$req->fetch();
    if(strlen($res['cne'])===0){
        return 'false';
    }
    else{
        return 'true';
    }
}
public function insererCommenter($cne,$code_livre,$msg){
    $db=$this->getPDO();
    try {
        $response = $db->prepare('insert into commenter(cne,code_livre,message,date_commentation) values(:cne,:code,:msg,NOW())');
        $response->execute(array(
            'cne' => $cne,
            'code' => $code_livre,
            'msg' => $msg
        ));
    }catch(\PDOException $ex){
        die(' erreur'.$ex->getMessage());
    }
}
public function insererEmprunter($cne,$code_livre){
    try {
        $db = $this->getPDO();
        $response = $db->prepare('insert into emprunter(cne,code_livre,date_empruntation,date_retour) values(:cne,:code,CURDATE(),DATE_ADD(CURDATE(),INTERVAL 15 DAY))');
        $response->execute(array(
            'cne' => $cne,
            'code' => $code_livre
        ));
    }catch (\PDOException $ex){
        die('erreur :'.$ex->getMessage());
    }
}
}

?>