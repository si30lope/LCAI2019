<? 
require_once("functions.php");
session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}
print_html_header2("Forgot Password");
// Assume no submission error
$error = false;
// More compact numeric array for storing question data
$q = array();
// For keeping track of which radio button was checked
$a = array();
//  Only process if $_POST is not empty and the Insert button was pressed 
if (empty($_POST) == false && $_POST['action'] == "Insert") {
	// Put the data in a more compact numeric array
	$q[0] = $_POST['Email'];
	
	// Keep track of which radio button should stay checked if there is an error
	$a[$_POST['answer']] = "checked";
	
	// Check for blank input
    foreach ($q as $value) {
		if ($value == "") {
			$error = true;
            $mysqli = db_connect();				
            $sql = "SELECT email
            FROM users
            WHERE email == .$q[value]";
            $mysqli->query($sql);
            echo '<a href="forgotPass_post.php">Forgot Password</a>';

            print_question_table($mysqli);

            $mysqli->close();
			
		}
	}
	
	// Make sure all the data is present
	if ($error == false) {	
		echo '<a href="forgotPass_post.php">No Account on File</a>';
        
	}
}
// If the post is not set or if there is an error
if (empty($_POST) == true || $error == true) {
	echo '<a> Email has been sent</a>';
}
print_html_footer2();
?>