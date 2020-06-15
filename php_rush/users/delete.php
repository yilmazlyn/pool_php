<?php 
include_once '../connexion_bdd.php';


//echo "bonjour ".$_GET['id']; 
	//$id=$_GET['id'];
	$id=$_COOKIE['id'];						
	$req = "DELETE FROM users WHERE id = $id";
	//$prep_req = $connexion->prepare($req);
	//$prep_req->bindParam(1,"$id" ); // le 1er "?" est remplacé par "toto"
	//$prep_req->bindParam(2, "m0t2P4ss"); // le 2ème "?" est remplacé par "m0t2P4ss"
	$connexion->exec($req);
//var_dump($req);
$connexion = null;
header('Location: ../admin.php');
//end();					
