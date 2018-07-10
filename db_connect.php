<?php

function dbConnect()
{
	$conn = mysqli_connect("localhost", "root", "", "projectdatabase");
	if(!$conn)
	{
		die("Cant connect to database.");
	}
}

?>