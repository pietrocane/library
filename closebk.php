<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");        
?>

<html>
   
  <head>
     <title>Closing a lending</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- implementato correttamente Bootstrap   -->
     
  </head>

  <body style="background-color:palegreen">

  <div class="container">
      <div class="col-xs-12" style="height:20px;"></div>
    <form method="get" action="confirm.php">
      <div class="col-xs-12">
        <label>Book ID:</label>
        <input class="form-control" name="id">
      </div>
      <div class="col-xs-12" style="height:20px;"></div>
        <div class="col-xs-12">
        <label>User who had it:</label>
        <input class="form-control" name="username">
      </div>
      <div class="col-xs-12" style="height:20px;"></div>
        <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg">End</button>
      </div>
      </form>
      
      <div class="col-xs-12" style="height:170px;"></div>
      
      <form action="books.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg">Back</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:15px;"></div>
      
      <form action="logout.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-md">Logout</button>
      </div>
    </form>
      
      </div>
    </body>
</html>