<?php
try {
	$connexion = new PDO("mysql:host=localhost;dbname=pool_php_rush;port=3306", "admin", "mysql");
	$db = mysqli_connect("localhost", "admin", "mysql", "pool_php_rush");
	echo "connected\n";
} catch (PDOException $e) {
							print "Erreur !: " . $e->getMessage() . "<br/>";
							die();
						}

?>
