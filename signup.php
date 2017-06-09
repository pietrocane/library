<?php
    
    $serverName = "localhost";
    $mysqlUsername = "root";
    $mysqlPassword = "";
    $mysqlDb = "library";

    $username = $_POST["newusername"];
    $password = $_POST["newpassword"];
    $hashPassword = hash("sha256", $password);
    
    $conn = mysqli_connect($serverName, $mysqlUsername, $mysqlPassword, $mysqlDb);

    $query = "insert into users values ('" . mysqli_escape_string($conn, $username) . "','" . mysqli_escape_string($conn, $hashPassword) . "')";

    if(mysqli_query($conn, $query))
    {
        header("Location: http://localhost/library/index.php");
        exit();
    }
    else
    {
        echo "Failed to sign up.";
    }
?>