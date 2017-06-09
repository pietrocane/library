<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");  

    $from = $_SERVER['HTTP_REFERER'];
    
    $nfrom = substr($from, -11, 7);

    switch ($nfrom) {
    case "newbook":
        $title = $_GET['title'];
        $category = $_GET['category'];
        $writer = $_GET['writer'];
        $year = $_GET['year'];
        $description = $_GET['description'];
        $sql = 'insert into book (title,category,writer,description,year) values ("' . $title . '","' . $category . '","' . $writer . '","' .             $description . '","' . $year . '");';
        break;
    case "edtbook":
        $id = $_GET['id'];
        $toedit = $_GET['toedit'];
        $newvalue = $_GET['newvalue'];
        $sql = 'update book set ' . $toedit . '="' . $newvalue . '" where id = "' . $id . '";';
        break;
    case "delbook":
        $title = $_GET['title'];
        $sql = 'delete from book where title = "' . $title . '";';
        break;
    case "edtuser":
        $usr = $_GET['username'];
        $toedit = $_GET['toedit'];
        $newvalue = $_GET['newvalue'];
        
        if($toedit == "password")
            $newv = hash("sha256", $newvalue);
        else
            $newv = $newvalue;
            
        $sql = 'update users set ' . $toedit . '="' . $newv . '" where username = "' . $usr . '";';
        break;
    case "deluser":
        $usr = $_GET['username'];
        $sql = 'delete from users where username = "' . $usr . '";';
        break;
    case "sendmsg":
        $usr = $_GET['ualert'];
        $txt = $_GET['amsg'];
        $sql = 'insert into messages (username, text) values ("' . $usr . '", "' . $txt . '");';
        break;
    case "closebk":
        $today = date("YYYY-mm-gg");
        $id = $_GET['id'];
        $cuser = $_GET['username'];
        $sql = 'update lending set end = "' . $today . '" where username = "' . $cuser . '" and id = "' . $id . '";'; //doesn't work?
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

  <body style="background-color:palegreen">
<div class="col-xs-12" style="height:60px;"></div>
      
  <div class="text-center">
      <h1>Task completed.</h1>
  </div>
      
      <div class="col-xs-12" style="height:30px;"></div>
      
      <form action="management.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg">Back to the management page</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
      
    <form action="books.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg">Back to the books management page</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
      
      <form action="logout.php">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-md">Logout</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
        
    </body>
</html>