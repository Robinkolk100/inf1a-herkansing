<?php
	include 'db_connect.php';
	include 'function_account.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

	<form>
		<input type="text" name="userID"><br>
		<input type="text" name="userEmail"><br>
		<input type="password" name="password"><br>
		<input type="submit" name="sumbit" value="submit"><br>
	</form>

</body>
</html>

<?php

	if(isset($_POST["submit"])) {
		$userID = $_POST["userID"];
		$userEmail = $_POST["userEmail"];
		$password = $_POST["password"];

		$test = NewAccountUser($userIDs, $userEmail, $password);
		
		echo $test;
             echo $test['IdErr'];
             echo $test['emailErr'];

	}
?>