<?php

	function addProjectMember($newMember, $project) 
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

		if (!ctype_digit(strval($newMember))) {
        	array_push($errorArray, "The student number need to be numbers only");
    	}

    	if (!ctype_digit(strval($project))) {
        	array_push($errorArray, "error on project selection");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
    		if($count == 0)
    		{
    			$conn = dbConnect();
    			$result = $conn->query(" SELECT `userID` FROM `users` WHERE `userID` = '".$newMember."'");

            	$count = $result->num_rows;
    		}

    		if($count > 0)
    		{
    			$sql = "INSERT INTO `userproject` (`userID`, `projectID`, `WarningCount`) 
    					VALUES ('".$newMember."', '".$project."', '0');";

    			if ($conn->query($sql) === true) 
    			{
    				array_push($errorArray, "New record created successfully<br>");
    			}
    			else 
    			{
    				echo "Error: " . $sql . "<br>" . $conn->error;
    			}

    			$result->close();
    			$conn->close();
            	array_push($errorArray, "is gelukt<br>");

            	return $errorArray;
    		}
    		else 
    		{
           	 	/* close connection */
            	$conn->close();
          	 	// header('Location:login.php?status=fail');
            	array_push($errorArray, "FAIL is al eerder opgegeven<br>");
            	return $errorArray;
        	}
    	}
    	else 
    	{
        	return $errorArray;
    	}
	}

?>