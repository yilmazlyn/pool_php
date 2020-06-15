
<?php 
include_once 'modif_product_bdd.php'; 
	$prodId=$_COOKIE['prodId'];							
	$affAll = "SELECT * FROM products where id=$prodId;" ;
							$resultat1 = $connexion->query($affAll);
							if($resultat1==false){
								
						
							}
							else {
								$ligne = $resultat1->fetch(PDO::FETCH_ASSOC);
								$name=$ligne['name'];
								$price=$ligne['price'];
								$category=$ligne['category_id'];
							}
?>

<!DOCTYPE html>
<html>

	<head>
      <title>Edit a Product</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <link rel="stylesheet" href="../css/inscription.css" type="text/css">
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   </head>
   
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-5 mx-auto"> 
               <div id="second">
                  <div class="myform form ">
                     <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                           <h1 >Edit Product</h1>
                        </div>
                     </div> 
                     <form method="post" action="modif_product.php">
                        <?php include('errors.php'); ?>  
                        <div class="form-group">
                           <label for="exampleInputUsername">Name of Product</label>
                           <input type="text"  name="name" class="form-control" id="productname" aria-describedby="emailHelp" value="<?php echo $name;?> " placeholder="Enter the product name">
                        </div>
                        <!--div class="form-group">
                           <label for="exampleInputEmail">Email</label>
                           <input type="email"  name="email" value="" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div-->
                        <div class="form-group">
                           <label for="exampleInputPassword1">Price</label>
                           <input type="text" name="price"  class="form-control" id="price" value="<?php echo $price;?>" aria-describedby="emailHelp" placeholder="Enter the price in euros">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword2">Category</label>
                           <input type="text" name="category" id="category"  value="<?php echo $category;?>"  class="form-control" aria-describedby="emailHelp" placeholder="In which Category">
                        </div>
                        <div class="col-md-12 text-center mb-3">
                           <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="reg_user">Valider</button>
                           <button type="button" class=" btn btn-block mybtn btn-secondary tx-tfm" name="reg_user" onclick="window.location='../admin.php?fil=prod'">Annuler</button>
                        </div>
                        <div class="col-md-12 ">
                           <div class="form-group">
                             <!-- <p class="text-center">Already a member? <a href="login.php">Sign in</a></p> -->
                           </div>
                        </div>
                     </form>
               </div>
            </div>
         </div>
      </div>   
   </body>
</html>


