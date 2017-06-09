<?php
session_start();
    $serverName = "localhost";
    $mysqlUsername = "root";
    $mysqlPassword = "";
    $mysqlDb = "library";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashPassword = hash("sha256", $password);
    
    $conn = mysqli_connect($serverName, $mysqlUsername, $mysqlPassword, $mysqlDb);
    
    $query = "select username
              from users
              where username='" . mysqli_escape_string($conn, $username) . "' 
              and password='" .  mysqli_escape_string($conn, $hashPassword) . "'";

    $result = mysqli_query($conn, $query);
    if($result){
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $_SESSION["username"] = $row["username"];
                if(isset($_SESSION["username"]))
                {
                    header("Location: http://localhost/library/index.php");
                    exit();
                }
            }
        }
        else
        {
            echo "Fallito";
        }
    }
    
?>