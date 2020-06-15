<?php include('bdd.php') ?>

<!DOCTYPE html>
<html>

	<head>
      <title>LOGIN RUSH</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <link rel="stylesheet" href="css/login.css" type="text/css">
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
      rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" 
      crossorigin="anonymous">
   </head>

   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-5 mx-auto"> 
               <div id="first">
                  <div class="myform form ">
                     <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                           <h1>Login</h1>
                        </div>
                     </div>
                     <form method="post" action="login.php">
                        <?php include('errors.php'); ?>
                        <div class="form-group">
                           <label for="exampleInputEmail">Email</label>
                           <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword">Password</label>
                           <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                        </div>
                        <div class="col-md-12 text-center ">
                           <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="login_user">Login</button>
                        </div>  
                        <p class="text-center">Not yet a member? <a href="inscription.php">Sign up</a></p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>         
   </body>
</html>
