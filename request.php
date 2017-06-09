<!DOCTYPE html>
<?php
session_start();
    if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");
?>
<html>
   
  <head>
     <title>Request</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap   -->
     
  </head>

  <body style="background-color:lavender">

  <div class="container">

      <div class="col-xs-12" style="height:60px;"></div>
      
      <div class="text-center"><h3>What book would you like to take with you?</h3></div>
      
      <div class="col-xs-12" style="height:45px;"></div>
      
      <div class="text-center">
          <form action="available.php" method="get">
          <div class="form-group">
              <label><h4>Title:</h4></label>
              <input type="text" class="form-control" name="title">
              
              <div class="col-xs-12" style="height:50px;"></div>
              
              <button type="submit" name="av" class="btn btn-primary btn-md">Check for availability</button>
          </div>
          </form>
      </div>
      
      <div class="col-xs-12" style="height:170px;"></div>
      
    <form action="index.php">
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Back</button>
      </div>
    </form>
    <div class="col-xs-12" style="height:30px;"></div>
      
      <form action="logout.php">
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-md">Logout</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>

  </div>
  </body>
</html>