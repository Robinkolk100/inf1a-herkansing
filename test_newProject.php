<?php 
	include 'db_connect.php';
	include 'function_newPoject.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		<input type="text" name="projectGroup"><br>
		<input type="text" name="projectPeriod"><br>
		<input type="text" name="projectYear"><br>
		<input type="text" name="projectName"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
	if (isset($_POST["submit"])) {
		$projectGroup = $_POST["projectGroup"];
		$projectPeriod = $_POST["projectPeriod"];
		$projectYear = $_POST["projectYear"];
		$projectName = $_POST["projectName"];

		$test = newProject($projectGroup, $projectPeriod, $projectYear, $projectName);
		foreach ($test as $value) {
			echo "$value <br>";
		}
	}
?>
</html>