<?php
session_start();
// include_once("server.php");
$connection=new PDO("mysql:host=localhost;dbname=pool_php_rush;port=3306", "root", "root");

$products = $connection->prepare("
                    SELECT products.id, products.name as product_name, products.price, categories.name as category_name, products.category_id FROM products 
                    INNER JOIN categories ON 
                    products.category_id = categories.id
                ");

                $products-> execute();

                $resultat = $products->fetchAll(PDO::FETCH_ASSOC);
                
                // echo '<pre>';
                // print_r($resultat);
                // die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-5">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="users.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>    
    </ul>
  </div>  
</nav>
<div class="container">
 
<div class="d-flex justify-content-between mb-5">
    <button class="btn btn-success">Create</button>
    <form action="server.php" method="post">
		<div class="btn-group">
          	<input name="product_name" class="form-control">
			<input name="search_product" class="btn btn-success" type="submit" value="Search">
      	</div>	
    </form>
</div>
 
    <table class="table">
        <thead>
            <tr>
                <th>N</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>  
      <tbody>
        <?php 
        for($i=0;$i<sizeof($resultat);$i++) { ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo($resultat[$i]['product_name'] ? $resultat[$i]['product_name'] : ""); ?></td>
                <td><?php echo($resultat[$i]['price'] ? $resultat[$i]['price'] : "" ); ?>€</td>
                <td><?php echo($resultat[$i]['category_name'] ? $resultat[$i]['category_name'] : "");?></td>
                <td><a href="" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger __del_product" data-id="<?php echo $resultat[$i]['id']; ?>">Delete</button></td>
            </tr>
        <?php } ?>
    </tbody>
     
  </table>
</div>
 
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="main.js"></script>
</html>