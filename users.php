<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");        
?>

<html>
   
  <head>
     <title>Books</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap   -->
     
  </head>

  <body style="background-color:palegreen">

  <div class="container">
    <h3 class="text-center">Users management options</h3>
        
        <div class="col-xs-12" style="height:30px;"></div>

      <form action="userslist.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg btn-block">Users list</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
      
      <form action="edtuser.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg btn-block">Edit user</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
      
      <form action="sendmsg.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg btn-block">Alert user</button>
      </div>
    </form>
      
      <div class="col-xs-12" style="height:30px;"></div>
      
      <form action="deluser.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg btn-block">Delete user</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
      
      <div class="col-xs-12" style="height:30px;"></div>
      
    <form action="management.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg">Back</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
      
      <form action="logout.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-md">Logout</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
      
  </div>
  </body>
</html>