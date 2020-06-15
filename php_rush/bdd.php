<?php 

	session_start();

	// VARIABLES
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// CONNECT
  	$db = mysqli_connect("localhost", "admin", "mysql", "pool_php_rush");

	// INSCRIPTION
	if (isset($_POST['reg_user'])) {
		// receive input values
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		// check passwords
		if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

		// register user 
		if (count($errors) == 0){
			//encrypt the password
			$password = md5($password_1);
			$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}
	}

	// LOGIN
	if (isset($_POST['login_user'])) {
		// receive input values
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		// form validation
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		// print user 
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['name'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong name/password combination");
			}
		}
	}

?>
  
