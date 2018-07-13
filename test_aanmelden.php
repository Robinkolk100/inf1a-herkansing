<?php 
session_start();
include 'db_connect.php';
include 'function_account.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		<input type="text" name="userID"><br>
		<input type="text" name="userEmail"><br>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
if (isset($_POST["submit"])) {
	$userID = $_POST["userID"];
	$userEmail = $_POST["userEmail"];
	$password = $_POST["password"];

	$test = NewAccountUser($userID, $userEmail, $password);
	foreach ($test as $value) {
		echo "$value <br>";
	}
}
?>
</html>