<?php 
include('../src/dbConnect.php');
include('../src/User.php');
$err ='';
if (isset($_POST['username']) && isset($_POST['password']) ) {
   $user = new User();
   $user->fetchUSer($db->conn,$_POST['username']);
   if ($user->errMsg === 'VERIFIED') {
    if ( $user->authenticate($_POST['password'])) {
      header('Location:expenses.php');
    }
    else{
      $err = 'Wrong Password!';
    }
   }else{
     $err = 'Username Does Not Exist!';
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="../Styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../Assets/main.ico">
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <img src="../Assets/profile.jpg" id="icon" alt="User Icon" />
    </div>
    <form name="login" method="post" >
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <span id="error"><?= $err ?></span><br><br>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="signup.php">Create Account</a>
    </div>

  </div>
</div>
</body>
</html>