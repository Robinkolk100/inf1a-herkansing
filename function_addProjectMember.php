<?php

	function addProjectMember($userID, $projectID) 
	{
		$checkUser = 0;
        $checkConnectedUser = 0;
		$errorCount = 0;
		$errorArray = array();

		if (!ctype_digit(strval($userID))) {
        	array_push($errorArray, "The student number need to be numbers only");
    	}

    	if (!ctype_digit(strval($projectID))) {
        	array_push($errorArray, "error on project selection");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
            $conn = dbConnect();
    	
        	if($checkUser == 0)
    		{
    			$result = $conn->query("SELECT `userID` FROM `users` WHERE `userID` = '".$userID."';");

            	$checkUser = $result->num_rows;
                $result->close();
    		}

            if($checkConnectedUser)
            {
                $result = $conn->query("SELECT * FROM `userproject` 
                                        WHERE `userID`='".$userID."' AND `projectID`='".$projectID."';");

                $checkConnectedUser = $result->num_rows;
                echo $checkConnectedUser;
                $result->close();
            }

    		if($checkUser > 0 && $checkConnectedUser == 0)
    		{
    			$sql = "INSERT INTO `userproject` (`userID`, `projectID`, `WarningCount`) 
    					VALUES ('".$userID."', '".$projectID."', '0');";

    			if ($conn->query($sql) === true) 
    			{
    				array_push($errorArray, "New record created successfully<br>");
    			}
    			else 
    			{
    				echo "Error: " . $sql . "<br>" . $conn->error;
    			}

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