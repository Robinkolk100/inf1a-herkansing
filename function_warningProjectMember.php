<?php

	function warningProjectMember($userID, $projectID)
	{
		$count = 0;
		$WarningCount = 0;
		$errorCount = 0;
		$errorArray = array();

		if (!ctype_digit(strval($userID))) {
        	array_push($errorArray, "Error on user selection");
    	}

    	if (!ctype_digit(strval($projectID))) {
        	array_push($errorArray, "Error on project selection");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
    		if($count == 0)
    		{
    			$conn = dbConnect();
    			$result = $conn->query("SELECT `WarningCount` FROM `userproject` 
                                        WHERE `userID`='".$userID."' AND `projectID`='".$projectID."';");

    		}

    		if ($result->num_rows == 1) 
    		{
    			 while ($row = $result->fetch_assoc()) 
    			 {
    			 	$WarningCount = $row['WarningCount'] + 1;
    			 }

    			$sql = "UPDATE `userproject` SET `WarningCount`='".$WarningCount."' WHERE `userID`='".$userID."' AND `projectID`='".$projectID."';";

    			if ($conn->query($sql) === true) 
    			{
    				array_push($errorArray, "A warning has been added <br>");
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