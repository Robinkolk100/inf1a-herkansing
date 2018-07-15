<?php

	include 'db_connect.php';
	include 'function_getProjectMembers.php';

	$projectMembers = getProjectMembers('1');
	foreach ($projectMembers as $projectMember) {
		echo $projectMember['userID']."<br>";
		echo $projectMember['userName']."<p>";
	}
?>