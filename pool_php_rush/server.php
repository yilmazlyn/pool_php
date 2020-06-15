<?php 
session_start();
	Class Controller{
		private $connection;
		function __construct(){
            $this->connection=new PDO("mysql:host=localhost;dbname=pool_php_rush;port=3306", "root", "root");
			// $this->connection->set_charset("utf8");
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				if(isset($_POST["signUp"])){
         		$this->signUp();		
         		}
         		if (isset($_POST["logIn"])) {
				$this->login();
				}
				if (isset($_POST["logout"])) {
					$this->logout();
                }
                if (isset($_POST["delete_user"])) {
					$this->deleteUser();
                }
                if (isset($_POST["search_product"])) {
					$this->searchProduct();
                }
                
                
			}
        }
        
        public function signUp(){
           
            $error = 0;
            // Processing form data when form is submitted
            if(isset($_POST["signUp"])){
            
                // Validate name
                if(empty(trim($_POST["name"]))){
                    $_SESSION['name_err'] = "Invalid name";
                    $error=1;
                    
                } else{
                    $_SESSION['name'] = $_POST["name"];
                }
                // Validate email
                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['email'] = $_POST["email"];
                    
                } else{
                    $_SESSION['email_err'] = "Invalid email";
                    $error=1;
                }

                // Validate password
                if(empty(trim($_POST["password"]))){
                    $_SESSION['password_err'] = "Invalid password or password confirmation";   
                    $error=1;  
                } elseif((strlen(trim($_POST["password"])) < 3) || (strlen(trim($_POST["password"])) >10)){
                    $_SESSION['password_err'] = "Invalid password or password confirmation";
                    $error=1;
                } else{
                    $_SESSION['password'] = trim($_POST["password"]);
                }
                
                // Validate confirm password
                if(empty(trim($_POST["confirm_password"]))){
                    $_SESSION['confirm_password_err'] = "Invalid password or password confirmation";  
                    $error=1;   
                } else{
                    $_SESSION['confirm_password'] = trim($_POST["confirm_password"]);

                    if(!isset($_SESSION['password_err']) && ($_SESSION['password'] != $_SESSION['confirm_password'])){
                        $_SESSION['confirm_password_err'] = "Invalid password or password confirmation";
                        $error=1;
                    }
                }

                if ($error==1) {
                    header("Location:inscription.php");
                    exit();
                }

                // Check input errors before inserting in database
                if(!isset($_SESSION['name_err']) && !isset($$_SESSION['email_err']) && !isset($_SESSION['password_err']) && !isset($_SESSION['confirm_password_err'])){
                   
                    $hash_pass = password_hash($_SESSION['password'], PASSWORD_BCRYPT);
                    $sess_name = $_SESSION['name'];
                    $sess_email = $_SESSION['email'];
                    $name='"'.$sess_name.'"';
                    $email='"'.$sess_email.'"';
                    $hash_pass='"'."$hash_pass".'"';
                    $admin="1";
                    
                    // var_dump($_SESSION['password']);
                    // var_dump($hash_pass);
                    $existsUser = $this->connection->query("SELECT * FROM users WHERE email LIKE '$sess_email'")->rowCount();
                   
                    if($existsUser && $existsUser!=0){
                        
                        $_SESSION['email_err'] = "This email has already been used. Try with another one!";
                        header('Location: inscription.php');
                        exit();
                    }
                    else{
                        $sql = "INSERT INTO users (username, password, email, admin)
                        VALUES ($name, $hash_pass, $email, $admin)";
                        // echo "$sql";
                        $this->connection->exec($sql);
                        header('Location: login.php');
                        session_destroy();
                    }     
                }
            }
        }

		function login(){
            $email = trim($_POST["email"]);
            $error = 0;
    
            // Check if email is empty
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['email'] = $_POST["email"];
                
            } else{
                $_SESSION['email_err'] = "Invalid email";
                $error=1;
            }
            
            // Check if password is empty
            if(empty(trim($_POST["password"]))){
                $_SESSION['password_err'] = "Please enter your password.";
                $error=1;
                
            } else{
                $_SESSION["password"]= trim($_POST["password"]);
            }

            if ($error==1) {
                header("Location:login.php");
                exit();
            }

			if((!isset($_SESSION["email_err"])) && (!isset($_SESSION["password_err"]))){
                 
                $email='"'."$email".'"';
                $user = $this->connection->query("SELECT * FROM users WHERE email = $email")->fetch(true);
                
                // $_SESSION['user_id'] = $user['id'];
                // var_dump($user);die;
                print "<pre>";
                
			    if (!$user) {
					$_SESSION["email_err"]="The email you entered is incorrect!";
					header("Location:login.php");
					exit();
				}
				else{
					$_SESSION["email"] = $_POST["email"];
				}
				if(!password_verify($_SESSION["password"], $user['password'])){
					$_SESSION["password_err"]="The password you entered is incorrect!";
					header("Location:login.php");
					exit();
				}
				else{                    
                    $_SESSION["user"]= json_encode($user);
                    // var_dump($_SESSION); die;
                    header('Location: index.php');
                    
					exit();
				}
			}

		}

		function logout(){
            unset($_SESSION["user"]);
            session_destroy();
			header("Location:login.php");
		}

        public function deleteUser(){
            echo("heeeeeellloo");
            $user_id=$_POST["user_id"];
            $user = $this->connection->query("SELECT FROM users WHERE id = $user_id");
            return response(["status" => "yes"]);
            // var_dump($user);die;
        }

        public function searchProduct(){

            $productName = $_POST['product_name'];
            $productName='"'."%$productName%".'"';
            // echo($productName);die;
            $products = $this->connection->prepare("
                        SELECT products.id, products.name as product_name, products.price, products.category_id FROM products 
                        WHERE products.name LIKE $productName
                ");
            
                $products-> execute();

                $resultat = $products->fetchAll(PDO::FETCH_ASSOC);
                print "<pre>";
                // var_dump($resultat);

        }
		
}

	$x=new Controller;

 ?>