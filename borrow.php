<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $today = date("Y-m-d");
        
        $sql = 'insert into lending (id, username, startdate) values ("' . $_SESSION['id'] . '","' . $_SESSION['username'] . '","' . $today . '");';

        $conn->query($sql);
        
        $conn->close();
            
?>

<!DOCTYPE html>
<html>
   
  <head>
     <title>Index</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- implementato correttamente Bootstrap   -->
     
  </head>

  <body style="background-color:lavender">
<div class="col-xs-12" style="height:60px;"></div>
      
  <div class="text-center">
      <h1>Your order was placed!</h1>
  </div>
      
      <div class="col-xs-12" style="height:30px;"></div>
      
    <form action="index.php">
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Back to the index</button>
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