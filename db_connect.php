<?php
function dbConnect()
{
	$dbHost = "localhost";
	$dbName = "projectdatabase";
	$dbUser = "root";
	$dbPass = "";

	if(!($conn=mysqli_connect($dbHost, $dbUser, $dbPass)))
	{
		echo "Error on connect.";
	}
	else
	{
		if(!(mysqli_select_db($dbName, $conn))){
			echo mysqli_error();
			echo "error on database connection. Check your settings.";
		}
	}
}
#-#############################################
# desc: close the connection
function dbclose() {
	if(!@mysqli_close(dbConnect())){
		$errorclose = mysqli_error(dbConnect());
		return $errorclose;
	}
}#-#close()

?>