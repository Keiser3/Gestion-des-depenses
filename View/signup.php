<?php 
include('dbConnect.php');
include('User.php');
if (isset($_POST['uname']) && isset($_POST['password'])  ) {
   $user = new User();
   $user->initUser($_POST['fname'],$_POST['lname'],$_POST['uname'],$_POST['email'],$_POST['password']);
   $user->register($db->conn);
   header('Location: login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    
    <link rel="stylesheet" href="styles.css">
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
    <form name="signup" method="post" >
      <input type="text" id="login" class="fadeIn second" name="fname" placeholder="First Name" required>
      <input type="text" id="login" class="fadeIn second" name="lname" placeholder="Last Name" required>
      <input type="text" id="login" class="fadeIn second" name="uname" placeholder="User Name" required>
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required><br><br>
      <input type="submit" class="fadeIn fourth" value="Sign Up">
    </form>
    
  </div>
</div>
</body>
</html>