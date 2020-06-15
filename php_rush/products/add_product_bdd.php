<?php 
include_once '../connexion_bdd.php';
	session_start();

	// VARIABLES
	$name = "";
	$price    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// CONNECT
  	//$db = mysqli_connect("localhost", "admin", "inka", "pool_php_rush");
  	//$db = $connexion;

	// INSCRIPTION of the product
	if (isset($_POST['reg_user'])) {
		// receive input values
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$price =$_POST['price'];
		$category = $_POST['category'];
		//$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation
		if (empty($name)) { array_push($errors, "Product name is required"); }
		if (empty($price)) { array_push($errors, "Price is required"); }
		if (empty($category)) { array_push($errors, "Category is required"); }

		
		// register user 
		if (count($errors) == 0){
			//encrypt the password
			//$password = md5($password_1);
			$query = "INSERT INTO products (name, price, category_id) VALUES('$name', '$price', '$category')";
			var_dump($query);
			mysqli_query($db, $query);

			/*$_SESSION['name'] = $username;
			$_SESSION['success'] = "You are now logged in";*/
			header('location: ../admin.php?fil=prod');
		}
	}

	

?>
  

