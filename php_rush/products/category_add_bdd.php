
<?php 
include_once '../connexion_bdd.php';
	//session_start();

	// VARIABLES
	$name = "";
	$price    = "";
	$prodId=$_COOKIE['prodId'];
	//$dont=false;//if the user modifies the pass
	$errors = array();
	GLOBAL $inf;
	
	$inf=false;
	
	
	function checkson($id,$pid,$connexion,&$inf){
		
		$affAll = "SELECT * FROM categories WHERE parent_id=$id;" ;
		$resultat1 = $connexion->query($affAll);
		if(($resultat1==false)||$inf==true){
			return false;
		}
		else {
			while ($ligne = $resultat1->fetch(PDO::FETCH_ASSOC)) {
				if($ligne['id']==$pid) { $inf=true; return true;}
				checkson($ligne['id'],$pid,$connexion,$inf);
			}
			
		}
		
		
	}
	
	if (isset($_POST['reg_user'])) {
		// receive input values
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$id =$_POST['catgid'];
		$pid = $_POST['pid'];
		checkson($id,$pid,$connexion,$inf);
		var_dump($inf);
		// form validation
		if (empty($name)) { array_push($errors, "Category name is required"); }
		if (empty($id)) { array_push($errors, "Category ID is required"); }
		if (empty($pid)) { array_push($errors, "Parent ID is required"); }
		if ($inf) { array_push($errors, "The Parent is already a subcategory"); }
		
		// register user 
		if (count($errors) == 0){
			$query = "INSERT INTO categories (name, id, parent_id) VALUES('$name', $id, $pid)";
			var_dump($query);
			mysqli_query($db, $query);

			/*$_SESSION['name'] = $username;
			$_SESSION['success'] = "You are now logged in";*/
			//header('location: ../admin.php?fil=catg');
		}
	}

	// Modif

	/*if (isset($_POST['reg_user'])) {
			//echo "MODIFICATION\n";
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
	*/
	

	

?>
  

