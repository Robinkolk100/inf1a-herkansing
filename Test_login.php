<?php 
session_start();
include 'db_connect.php';
include 'function_login.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<form action="#" method="post">
		<input type="text" name="userID"><br>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
</body>
<?php
if (isset($_POST["submit"])) {
    $userID = $_POST["userID"];
    $password = $_POST["password"];

    $test = Inlog($userID, $password);
    foreach ($test as $value) {
        echo "$value <br>";
    }
}
print_r($_SESSION);
if ($_SESSION["login"] = 1) {
    Logout();
} else {
    echo "geen session";
}
print_r($_SESSION);
?>
</html>