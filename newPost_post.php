
<? 
require_once("functions.php");
session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}
print_html_header2("New Post");
// Assume no submission error
$error = false;
// More compact numeric array for storing question data
$q = array();
// For keeping track of which radio button was checked
$a = array();
//  Only process if $_POST is not empty and the Post button was pressed 
if (empty($_POST) == false && $_POST['action'] == "Post") {
	// Put the data in a more compact numeric array
	$q[0] = $_POST['postID'];
    $q[1] = $_POST['description'];
	$q[2] = $_POST['body'];

	// Keep track of which radio button should stay checked if there is an error
	//$a[$_POST['answer']] = "checked";
	
	// Check for blank input
	foreach ($q as $value) {
		if ($value == "") {
			$error = true;
			break;
		}
	}
	
	// Make sure all the data is present
	if ($error == false) {	
		$mysqli = db_connect();				
		$sql = "INSERT INTO newPost (postID, description, body) VALUES ('".$q[0]."','".$q[1]."','".$q[2]."')";
		$mysqli->query($sql);
		echo '<a href="newPost_post.php">Write Another Post</a>';
		
		print_post_table($mysqli);
		
		$mysqli->close();
	}
}
// If the post is not set or if there is an error
if (empty($_POST) == true || $error == true) {
	print_post_form($error, $q, $c);
}
print_html_footer2();
?>