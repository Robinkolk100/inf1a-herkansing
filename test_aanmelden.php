<?php

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
		<input type="pass" name="password"><br>
		<input type="submit" name="sumbit" value="submit"><br>
	</form>

</body>
</html>

<?php

	if(isset($_POST["submit"])) {
		NewAccountUser($_POST["userID"], $_POST["userEmail"], $_POST["password"]);
	}
?>