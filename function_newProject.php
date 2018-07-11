<?php

	function newProject($projectGroup, $projectPeriod, $projectYear, $projectName)
	{
		$errorArray = array();
		$errCount = 0;

		if (!ctype_digit(strval($projectPeriod))) 
		{
        	array_push($errorArray, "Please use a number for the period field");
    	}

		if (!ctype_digit(strval($projectYear))) 
		{
        	array_push($errorArray, "Please use a number for the year field");
    	}

    	$errCount = count($errorArray);
    	if($errCount == 0)
    	{
    		$projectName = htmlspecialchars($projectName);

    		$conn = dbConnect();

    		$sql = "INSERT INTO `projects` 
    		(`projectID`, `projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) 
    		VALUES (NULL, '".$projectGroup."', '".$projectPeriod."', '".$projectYear."', '".$projectName."');";

    		if ($conn->query($sql) === true) 
    		{
                array_push($errorArray, "New record created successfully");
            } 
            else 
            {
                 array_push($errorArray, ("Error: " . $sql . "<br>" . $conn->error));
            }

            $conn->close();
            array_push($errorArray, "is gelukt<br>");
    	}
    	else 
    	{
        	return $errorArray;
    	}

	}

?>