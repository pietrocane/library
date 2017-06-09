<?php
session_start();
if(isset($_SESSION['username']))
    $usr = $_SESSION['username'];

if(isset($usr))
{
    if ($usr == "admin")
        header("Location: http://localhost/library/management.php");
}
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
      
<?php
    if(!isset($_SESSION["username"]))
        echo '
        <div class="col-xs-12" style="height:20px;"></div>
        <div class="text-center"><h1>Welcome!</h1></div>
        <div class="col-xs-12" style="height:30px;"></div>
  <div class="container">
  
    <form method="post" action="login.php">
      <div class="col-xs-6">
        <label>Username:</label>
        <input type="text" class="form-control" name="username">
      </div>
      
      <div class="col-xs-6">
        <label>Password:</label>
        <input type="password" class="form-control" name="password">
      </div>
        
        <div class="col-xs-12" style="height:30px;"></div>
        
        <div class="text-center">
            <button type="submit" name="sub" class="btn btn-primary">Login</button>
        </div>
    </form>
  </div>
  
  <div class="col-xs-12" style="height:60px;"></div>
  
  <div class="container">
    <form method="post" action="signup.php">
      <div class="col-xs-6">
        <label>New Username:</label>
        <input type="text" class="form-control" name="newusername">
      </div>
      
      <div class="col-xs-6">
        <label>New Password:</label>
        <input type="password" class="form-control" name="newpassword">
      </div>
        
        <div class="col-xs-12" style="height:30px;"></div>
        
        <div class="text-center">
            <button type="submit" name="sub" class="btn btn-primary">Sign Up</button>
        </div>
    </form>
  </div>
  '; 
    else
        echo '
        <div class="container">
        
        <div class="text-center"><h3>Logged in as ' . $usr . '</h3></div>
        <div class="col-xs-12" style="height:40px;"></div>
        
            <form action="search.php">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Search for a book</button>
            </form>
            <div class="col-xs-12" style="height:40px;"></div>
            <form action="request.php">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Take a book with you</button>
            </form>
            <div class="col-xs-12" style="height:40px;"></div>
            <form action="myls.php">
            <button type="submit" class="btn btn-primary btn-lg btn-block">My current borrowed books</button>
            </form>
            <div class="col-xs-12" style="height:40px;"></div>
            <form action="mymessages.php">
            <button type="submit" class="btn btn-primary btn-lg btn-block">My messages</button>
            </form>
            <div class="col-xs-12" style="height:60px;"></div>
            <form action="logout.php">
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-md">Logout</button>
      </div>
    </form>
        <div class="col-xs-12" style="height:30px;"></div>
        </div>';
      ?>
          
  </body>
</html> 
        