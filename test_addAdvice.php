<?php 
	include 'db_connect.php';
	include 'function_addAdvice.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		documentID : <input type="text" name="documentID"><br>
		adviceType : <input type="text" name="adviceType"><br>
		adviceTekst : <input type="text" name="adviceTekst"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
	if (isset($_POST["submit"])) {
		$documentID = $_POST["documentID"];
		$adviceType = $_POST["adviceType"];
		$adviceTekst = $_POST["adviceTekst"];

		$test = addAdvice($documentID, $adviceType, $adviceTekst);
		foreach ($test as $value) {
			echo "$value <br>";
		}
	}
?>
</html>