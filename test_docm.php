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
		<input type="text" name="documentName"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
if (isset($_POST["submit"])) {
	$documentName = $_POST["documentName"];

	$test = NewAccountUser($documentName);
	foreach ($test as $value) {
		echo "$value <br>";
	}
}
?>
</html>