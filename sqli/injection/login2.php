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
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Create prepared statement
$stmt = mysqli_prepare($conn, "SELECT * FROM login_details WHERE username = ? AND password = ?");

// Bind parameters
mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);

// Execute statement
$success = mysqli_stmt_execute($stmt);

// Get result set
$result = mysqli_stmt_get_result($stmt);

$check = mysqli_fetch_array($result);

if(isset($check)){
	echo '<h1>Connection is successful</h1>';
	echo 'nitectf{w3nT_1nT0_Th3_s3rV3r}';
}
else {
	echo '<h1>Connection failed.</h1><p>Wrong user credentials</p>';
}
?>
