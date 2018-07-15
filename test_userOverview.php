<?php 
	include 'db_connect.php';
	include 'function_getUsers.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		part userID or userName: <input type="text" name="userReference"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
	if (isset($_POST["submit"])) {
		$userReference = $_POST["userReference"];
		$test = getUsers($userReference);
		foreach ($test as $value) {
			echo $value['userID']. "<br>";
			echo $value['userName']. "<p>";
		}
	}
?>
</html>