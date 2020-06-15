<?php
session_start();
//Establishing the db connection
const ERROR_LOG_FILE = "./error_log_file";
$host = "localhost";
$db = "pool_php_rush";
$port = 3306;
$username = "admin";
$passwd = "mysql";

 try
 {
  $connection = new PDO("mysql:host=$host; dbname=$db; port=$port;", $username, $passwd);
   echo "Connected to DB". PHP_EOL;
 }

 catch (PDOException $events)
 {
   echo 'Connection failed: ' . $events->getMessage() . PHP_EOL;

   error_log($events->getMessage()." | ".strftime('%A %d %B %Y %I:%M:%S').PHP_EOL, 3, ERROR_LOG_FILE);
 }

//result variables




//to be sure that user enter some keywords to search
if(isset($_POST["search_term"]) && !empty($_POST ["search_term"]))
{   //var_dump($_POST);
  $search_term = $_POST["search_term"];

  // options handling with search term
  if($_POST["by_options"] == "Categories")
  {     //getting clean user inputs

      //  $search_term = preg_replace("#[^a-zA-A ?0-9]#i", "", $_POST["search_term"]);
        echo $search_term;
        $query = $connection->prepare("SELECT * FROM categories WHERE name LIKE '%$search_term%'");

        $query-> execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        print "<pre>";
 }
  elseif($_POST["by_options"] == "Price")
  {
      $query = $connection->prepare ("SELECT * FROM products WHERE price BETWEEN '0' and '500'  ORDER by price;");
      $query-> execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      print "<pre>";
  }

  elseif($_POST["by_options"] == "Name")
  {
      $query = $connection->prepare("SELECT * FROM products WHERE name LIKE '%$search_term%'");
      $query-> execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      print "<pre>";
  }

//var_dump($result);
}
else{

}

 ?>

 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <title>Advanced Search Engine</title>
 </head>

 <body>
<div class="container">
     <form method="post">
         <div class="form-group">
             <label for="search_term"></label>
             <input class="form-control" type="text" name="search_term" placeholder="Search..." value="<?php if(isset($_POST[" search_term "])) { echo htmlspecialchars($_POST["search_term "]);} ?>">
         </div>

         <div class="form-group">
             <select name="by_options" class="browser-default custom-select">
                 <option value="">Choose your option</option>
                 <option name="categories" value="Categories">by Categories</option>
                 <option name="price" value="Price">by Price</option>
                 <option name="name" value="Name">by Name</option>
             </select>
         </div>
         <div class="form-group">
             <input type="submit" name="search" title="Search for it" value="Go for it" class="btn btn-success">
         </div>
     </form>

     <table class="table">
         <thead>
             <tr>
                 <th></th>
                 <th>Search Results</th>
                 <th>
                     <button class="btn" onclick="filterSelection('needs JS')"><strong>Sort by name</strong></button>
                 </th>
                 <th>
                     <button class="btn" onclick="filterSelection('needs JS')"><strong>Sort by price</strong></button>
                 </th>

             </tr>
         </thead>
         <tbody>
             <?php
             $result = array();
       for($i=0;$i<sizeof($result);$i++) { ?>
                 <tr>
                     <td>
                         <?php echo $i; ?>
                     </td>
                     <td>
                         <?php echo($result[$i]['Categories']); ?>
                     </td>
                     <td>
                         <?php echo($result[$i]['Name']); ?>
                     </td>
                     <td>
                         <?php echo($result[$i]['Price']);?>
                     </td>

                 </tr>
               <?php } ?>
         </tbody>

     </table>
     </div>
 </body>
