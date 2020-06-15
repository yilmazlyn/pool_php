
<?php 
include_once '../connexion_bdd.php';
	session_start();

	// VARIABLES
	$name = "";
	$id   = $_COOKIE['catgId'];;
	$pid;
	//$dont=false;//if the user modifies the pass
	$errors = array();
	$_SESSION['success'] = "";
	

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
			//echo "MODIFICATION\n";
		// receive input values
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$id = mysqli_real_escape_string($db, $_POST['catgid']);
		$pid = mysqli_real_escape_string($db, $_POST['pid']);
		checkson($id,$pid,$connexion,$inf);

		// form validation
		if (empty($name)) { array_push($errors, "Category name is required"); }
		if (empty($id)) { array_push($errors, "Category ID is required"); }
		if (empty($pid)) { $pid=NULL;}
		if ($inf) { array_push($errors, "The Parent is already a subcategory"); }
		
		// register product 
		if (count($errors) == 0){
				if(is_null($pid)){
					$query = "UPDATE categories 
								SET name='$name', 
								id='$id',
								parent_id=NULL
							WHERE id=".$id;
					
				}
				else{
				$query = "UPDATE categories 
								SET name='$name', 
								id='$id',
								parent_id='$pid'
							WHERE id=".$id;
						}
				mysqli_query($db, $query);
		
			header('location: ../admin.php?fil=catg');
		}
	}

	

?>
  

