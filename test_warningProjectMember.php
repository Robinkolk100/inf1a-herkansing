<?php 
	include 'db_connect.php';
	include 'function_warningProjectMember.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		projectID : <input type="text" name="projectID"><br>
		userID : <input type="text" name="userID"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
	if (isset($_POST["submit"])) {
		$projectID = $_POST["projectID"];
		$userID = $_POST["userID"];

		$test = warningProjectMember($userID, $projectID);
		foreach ($test as $value) {
			echo "$value <br>";
		}
	}
?>
</html>