<?php 
include_once '../connexion_bdd.php';

if(isset($_GET['catg'])){
	$id=$_COOKIE['catgId'];						
	$req = "DELETE FROM categories WHERE id = $id";
	
	$connexion->exec($req);
	//var_dump($req);
	$connexion = null;
	header('Location: ../admin.php?fil=catg');
	
}
else {
	$id=$_COOKIE['prodId'];						
	$req = "DELETE FROM products WHERE id = $id";
	
	$connexion->exec($req);
	//var_dump($req);
	$connexion = null;
	header('Location: ../admin.php?fil=prod');
}
//end();					
