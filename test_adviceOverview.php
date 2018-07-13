<?php

	include 'db_connect.php';
	include 'function_getAdvice.php';

	$advices = getAdvice('1');
	foreach ($advices as $advice) {
		echo $advice['adviceType']. "<br>";
		echo $advice['adviceTekst']. "<p>";
	}

?>