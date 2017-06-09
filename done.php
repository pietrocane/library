<?php
session_start();
    if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");

$from = $_SERVER['HTTP_REFERER'];
    
    $nfrom = substr($from, -11, 7);

    switch ($nfrom) {
    case "setbook":
        $sdate = $_GET['sdate'];
        $sql = 'insert into lending (id, username, startdate) values ("' . $_SESSION['id'] . '","' . $_SESSION['username'] . '","' . $sdate . '");';
        break;
    case "results":
        $title = $_GET['title'];
        $sql = 'insert into messages (username, text) values ("' . $_SESSION['username'] . '","Requesting for info about the book "' . $title . '");'; //So the admin can send the info message later
        break;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->query($sql);        

    $conn->close();

?>
<!DOCTYPE html>
<html>
   
  <head>
     <title>Done</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- implementato correttamente Bootstrap   -->
     
  </head>

  <body style="background-color:lavender">
<div class="col-xs-12" style="height:60px;"></div>
      
        <div class="text-center">Done! //WIP, found a bug at last second</div>
      
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