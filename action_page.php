<?php 

require_once('functions.php');

$domain = $_SERVER['HTTP_HOST'];
$uri = parse_url($_SERVER['HTTP_REDERER']);
$r_domain = substr($uri['host'], strpos($uri['host'], "."), strlen($uri['host']));


if ($domain == $r_domain) {
   
    $link = connectDB(DB_HOST, DB_USERNAME, DB_PASSWORD);

    //Cleans the $_POST array to prevent against injection attacks
    $_POST = f_clean($_POST);
    
    // main variables
    $table = $_POST['formID'];
    $keys = implode(", ", (array_keys($_POST)));
    $values = implode(", ", (array_keys($_POST)));
    
    //variables for redirect
    $redirect = $_POST['redirect_to'];
    $referred = $_SERVER['HTTP_REFER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    
}


//insert values into table
$sql="INSERT INTO $table ($keys) VALUES ('$values')";

if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
}

mysql_close();

?>