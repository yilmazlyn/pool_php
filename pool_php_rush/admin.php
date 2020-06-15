<?php
session_start();

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
        <a class="nav-link" href="products.php">Products</a>
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
    <div class="btn-group">
        <input class="form-control">
        <button class="btn btn-success">Search</button>
    </div>
</div>
 
  <table class="table">
      <tr>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>Action</th>
      </tr>
      <tr>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>
            <a href="" class="btn btn-warning">Edit</a>
            <button class="btn btn-danger">Delete</button>
          </td>
      </tr>
      <tr>
          <td>4</td>
          <td>5</td>
          <td>6</td>
          <td>
            <a href="" class="btn btn-warning">Edit</a>
            <button class="btn btn-danger">Delete</button>
          </td>
      </tr>
      <tr>
          <td>7</td>
          <td>8</td>
          <td>9</td>
          <td>
            <a href="" class="btn btn-warning">Edit</a>
            <button class="btn btn-danger">Delete</button>
          </td>
      </tr>
  </table>
</div>
 
</body>
</html>