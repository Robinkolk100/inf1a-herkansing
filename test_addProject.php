<?php 
	session_start();
	echo $_SESSION['userID'];
	include 'db_connect.php';
	include 'function_addProject.php';
	include 'function_addProjectMember.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		projectgroup : <input type="text" name="projectGroup"><br>
		projectperiod : <input type="text" name="projectPeriod"><br>
		projectyear : <input type="text" name="projectYear"><br>
		projectname : <input type="text" name="projectName"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
	if (isset($_POST["submit"])) {
		$projectGroup = $_POST["projectGroup"];
		$projectPeriod = $_POST["projectPeriod"];
		$projectYear = $_POST["projectYear"];
		$projectName = $_POST["projectName"];

		$test = addProject($projectGroup, $projectPeriod, $projectYear, $projectName);
		foreach ($test as $value) {
			echo "$value <br>";
		}
	}
?>
</html>