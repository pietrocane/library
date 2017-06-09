<?php
session_start();
    if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");
?>
<!DOCTYPE html>
<html>
   
  <head>
     <title>Set date</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- implementato correttamente Bootstrap   -->
     
  </head>

  <body style="background-color:lavender">
<div class="col-xs-12" style="height:60px;"></div>
      
  <div class="container">
    <form method="get" action="done.php">
      <div class="col-xs-12">
        <label>Date:</label>
        <input type="text" class="form-control" name="sdate" placeholder="YYYY-mm-gg">
      </div>
      
        <div class="col-xs-12" style="height:40px;"></div>
        
        <div class="text-center">
            <button type="submit" name="ssub" class="btn btn-primary">Set date</button>
            </div>

    </form>
  </div>
      
      <div class="col-xs-12" style="height:270px;"></div>
      
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
        
    </body>
</html>