<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: http://localhost/library/index.php");

    if (isset($_GET['av']))
    {
        $title = $_GET['title'];
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $booksQ = 'SELECT book.id FROM book WHERE title = "' . $title . '" AND book.id NOT IN (SELECT book.id FROM book JOIN lending ON book.id = lending.id WHERE lending.end = "0000-00-00") LIMIT 1;';
        
        $booksQres = $conn->query($booksQ);
        
        if ($booksQres->num_rows > 0)
        {
            $my_id_array=mysqli_fetch_assoc($booksQres);
            $my_id=$my_id_array['id'];
            $_SESSION['id'] = $my_id;
            $avail = 1;
        }
        else
        {
            $booksQ = 'SELECT book.id FROM book WHERE title = "' . $title . '" LIMIT 1;'; //Just to be safe
            $booksQres = $conn->query($booksQ);
            
            if ($booksQres->num_rows > 0)
            {
                $my_id_array=mysqli_fetch_assoc($booksQres);
                $my_id=$my_id_array['id'];
                $_SESSION['id'] = $my_id;
            }
        }
        
        
        $conn->close();
    }
        
?>

<html>
   
  <head>
     <title>Availability</title>
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
      
      
      
      <div class="col-xs-12" style="height:45px;"></div>
      <?php if(isset($avail)) echo '
      <div class="text-center">
          <form action="borrow.php">
          <div class="form-group">
              
                <div class="text-center"><h2>Your book is available!</h2></div>;
              <div class="col-xs-12" style="height:30px;"></div>
              
              <button type="submit" class="btn btn-primary btn-md">Get it</button>
              <div class="col-xs-12" style="height:30px;"></div>
          </div>
          </form>
      </div>';
      else echo '<div class="text-center">
          <form action="setbook.php">
          <div class="form-group">
              
                <div class="text-center"><h2>Your book is not available right now.</h2></div>
              <div class="col-xs-12" style="height:30px;"></div>
              
              <button type="submit" class="btn btn-primary btn-md">Set it</button>
              <div class="col-xs-12" style="height:30px;"></div>
          </div>
          </form>
      </div>'; ?>
      
      <div class="col-xs-12" style="height:200px;"></div>
      
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