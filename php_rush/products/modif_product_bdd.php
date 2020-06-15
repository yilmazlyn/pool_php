
<?php 
include_once '../connexion_bdd.php';
	session_start();

	// VARIABLES
	$name = "";
	$price    = "";
	$prodId=$_COOKIE['prodId'];
	//$dont=false;//if the user modifies the pass
	$errors = array();
	$_SESSION['success'] = "";
	

	// CONNECT
  	//$db = mysqli_connect("localhost", "admin", "inka", "pool_php_rush");
  	//$db = $connexion;

	// Modif

	if (isset($_POST['reg_user'])) {
			echo "MODIFICATION\n";
		// receive input values
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$price = mysqli_real_escape_string($db, $_POST['price']);
		$category = mysqli_real_escape_string($db, $_POST['category']);
		

		// form validation
		if (empty($name)) { array_push($errors, "Name Product is required"); }
		if (empty($price)) { array_push($errors, "Price is required"); }
		if (empty($category)) { array_push($errors, "Category ID is required");}

		// register product 
		if (count($errors) == 0){
			
				$query = "UPDATE products 
								SET name='$name', 
								price='$price',
								category_id='$category'
							WHERE id=".$prodId;
				mysqli_query($db, $query);
		
			header('location: ../admin.php?fil=prod');
		}
	}

	

?>
  
