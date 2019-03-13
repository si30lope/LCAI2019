<?php
// define variables and set to empty values
$headingErr = $descriptionErr = "";
$heading = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["heading"])) {
    $headingErr = "Heading is required";
  } else {
    $heading = test_input($_POST["heading"]);
    // check if e-mail address is well-formed
  }

  if (empty($_POST["description"])) {
    $descriptionErr = "Description is required";
  } else {
    $description = test_input($_POST["description"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>