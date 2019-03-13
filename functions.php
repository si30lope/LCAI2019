<?php
define('DB_NAME', 'perm_chat');
define('DB_USERNAME', 'perm_chat');
define('DB_PASSWORD', '');
define('DB_HOST', 'cs.siena.edu');
define('DB_CHARSET', 'utf8');



function connectDB($user, $pass, $db) {
    // Create connection
        //$link = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
        $link = mysql_connect($host, $user, $pass);

    // Check connection
    if (!$link) {
        die("Connection failed: " . mysql_error());
    } 

    //$db_selected = mysql_select_db(DB_NAME, $link);
    $db_selected = mysql_select_db($db, $link);

    if(!$db_selected){
        //die("Cannot use " . DB_NAME . ': ' . mysql_error());
        die("Cannot use " . $db . ': ' . mysql_error());
    }

    echo "Connected successfully";
}

function f_clean($array) {
    return array_map('mysql_real_escape_string', $array);
}

?>



