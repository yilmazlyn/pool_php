<?php 
include_once '../connexion_bdd.php';
	session_start();

	// VARIABLES
	$username = "";
	$email    = "";
	$id=$_COOKIE['id'];
	$dont=false;//if the user modifies the pass
	$errors = array();
	$_SESSION['success'] = "";
	

	// CONNECT
  	//$db = mysqli_connect("localhost", "admin", "inka", "pool_php_rush");
  	//$db = $connexion;

	// Modif

	if (isset($_POST['reg_user'])) {
			echo "MODIFICATION\n";
		// receive input values
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { $dont=true;/*array_push($errors, "Password is required"); */}

		// check passwords
		if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

		// register user 
		if (count($errors) == 0){
			var_dump($errors);
			//encrypt the password
			if($dont==false){
				//
				echo "aaaahhhhhhhhhhhhh\n";
				$password = md5($password_1);
				$query = "UPDATE users 
								SET username='$username', 
								email='$email',
								password='$password'
							WHERE id=".$id;
				mysqli_query($db, $query);
				//header('location: admin.php');
		}
		else {
			echo "HEREEEÉ\n";
			$query = "UPDATE users 
								SET username='$username', 
								email='$email'
							WHERE id=".$id;
				mysqli_query($db, $query);
			
		}

			$_SESSION['name'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: ../admin.php');
		}
	}

	

?>
  
