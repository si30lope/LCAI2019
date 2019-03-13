<?php
// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailErr = $passErr = $rptPassErr = "";
$firstName = $lastName = $email = $password = $rptPass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["firstName"])) {
    $firstNameErr = "Name is required";
  } else {
    $firstName = test_input($_POST["firstName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
    
  if (empty($_POST["lastName"])) {
    $firstNameErr = "Name is required";
  } else {
    $lastName = test_input($_POST["lastName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
      $lastNameErr = "Only letters and white space allowed"; 
    }
  }
    
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  
  if (empty($_POST["repeatPass"])){
      $rptPassErr = "Re-typed password is required";
  } else {
      $rptPass = test_input($_POST["repeatPass"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>