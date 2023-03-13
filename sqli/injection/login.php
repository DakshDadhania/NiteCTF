<?php

//Get Heroku ClearDB connection information
$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server   = "localhost";
$cleardb_username = "root";
$cleardb_password = "";
$cleardb_db       = "heroku_8df1fda03bbd279";

$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

$uname = $_GET['uname'];
$pass = $_GET['pass'];
$uname = preg_replace('/[=;\nORAND]/', '', $uname);
$pass = preg_replace('/[=;\nORAND]/', '', $pass);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login_details WHERE username = '$uname' AND password = '$pass'";
$result = mysqli_query($conn, $sql);
$check = mysqli_fetch_array($result);

if(isset($check)){
	echo '<h1>Connection is successful</h1>';
	echo 'nitectf{w3nT_1nT0_Th3_s3rV3r}'
}
else {
	echo '<h1>Connection failed.</h1><p>Wrong user credentials</p>';
}

?>
