<?php

// Include the configuration file which likely contains the database connection
include 'config.php';

// Check if the registration form is submitted
if (isset($_POST['submit'])) {

   // Sanitize and escape user inputs to prevent SQL injection
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password'])); // Encrypt password using MD5
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword'])); // Encrypt confirm password using MD5
   $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);

   // Check if the user already exists in the database
   $select_users = mysqli_prepare($conn, "SELECT * FROM `login` WHERE email = ? AND password = ?");
   mysqli_stmt_bind_param($select_users, "ss", $email, $pass);
   mysqli_stmt_execute($select_users);
   $result = mysqli_stmt_get_result($select_users) or die('query failed');

   if (mysqli_num_rows($result) > 0) {
      $message[] = 'user already exist!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'passwords do not matched!';
      } else {
         // Use prepared statement to insert user data
         $insert_stmt = mysqli_prepare($conn, "INSERT INTO `login`(name, email, password,telephone, address) VALUES(?, ?, ?, 'login', ?, ?)");
         mysqli_stmt_bind_param($insert_stmt, "sssss", $name, $email, $cpass, $telephone, $address);
         $exec_result = mysqli_stmt_execute($insert_stmt);

         if ($exec_result) {
            $message[] = 'registered successfully!';
            header('location:Index.php');
         } else {
            die('query failed');
         }
      }
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>

<form action="" method="POST">
<h2 class="heading">Create an account</h2>

<div class="container">
<p class="username">Username</p>
<input type="text" name="name">
<p class="username">Email</p>
<input type="email" name="email">
<p class="username">Password</p>
<input type="password" name="password">
<p class="username">Confirm Password</p>
<input type="password" name="cpassword">
<p class="username">Telephone</p>
<input type="number" name="telephone" input mode="numeric">
<p class="username">Address</p>
<input type="text" name="address"><br><br>
<button class="btn" name="submit">Login</button>
</div>

<p class="register">Already have an account? <a href="./index.html">Sign in</a></p>
  </form>
    
</body>
</html>



