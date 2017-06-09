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
        
        $sql = 'select * from book;';
        
        $result = $conn->query($sql);        
        
        $conn->close();

        
?>

<html>
   
  <head>
     <title>Books list</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap   -->
     
  </head>

  <body style="background-color:palegreen">

  <div class="container">
    <h3 class="text-center">Results:</h3>
        
        <div class="col-xs-12" style="height:30px;"></div>
        
        <?php
            if(isset($result) && $result != NULL)
            {
                if ($result->num_rows > 0) 
                {
                    echo "<table class='table table-hover'>";
                    echo "<thead><tr><th>Title</th><th>Category</th><th>Writer</th><th>Description</th><th>Year</th></tr></thead>";
                    echo "<tbody>";
                    
                    while($row = $result->fetch_assoc()) 
                    {       
                        echo "<tr>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td>" . $row["category"] . "</td>";
                        echo "<td>" . $row["writer"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["year"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
                else
                {
                    echo "<div class='text-center'>
                            No results.
                          </div>";
                }
            }
        ?>
      <div class="col-xs-12" style="height:30px;"></div>
      
    <form action="books.php">
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