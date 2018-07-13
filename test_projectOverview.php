<?php

	include 'db_connect.php';
	include 'function_getProjects.php';

	$projects = getProjects('587842');
	foreach ($projects as $project) {
		echo "INF";
		echo $project['projectPeriode'];
		echo $project['projectGroup'];
		echo $project['projectYear']."<br>";
		echo $project['projectName']."<p>";
	}
?>