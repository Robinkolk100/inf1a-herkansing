<?php 
	include 'db_connect.php';
	include 'function_addProjectDocument.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		projectID : <input type="text" name="projectID"><br>
		documentID : <input type="text" name="documentID"><br>
		documentLink : <input type="text" name="documentLink"><br>
		documentUpload : <input type="date" name="documentUpload"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
	if (isset($_POST["submit"])) {
		$projectID = $_POST["projectID"];
		$documentID = $_POST["documentID"];
		$documentLink = $_POST["documentLink"];
		$documentUpload = $_POST["documentUpload"];
		$test = addProjectDocument($projectID, $documentID, $deadline);
		foreach ($test as $value) {
			echo "$value <br>";
		}
	}
?>
</html>