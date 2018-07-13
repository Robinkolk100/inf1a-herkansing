<?php

	function warningProjectMember($userID, $projectID)
	{
		$count = 0;
		$WarningCount = 0;
		$errorCount = 0;
		$errorArray = array();

        // Check if variable is an integer
		if (!ctype_digit(strval($userID))) {
        	array_push($errorArray, "Error on user selection");
    	}

        // Check if variable is an integer
    	if (!ctype_digit(strval($projectID))) {
        	array_push($errorArray, "Error on project selection");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
            //get warning of user if user is connect
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
                    //add warning to current WarningCount
    			 	$WarningCount = $row['WarningCount'] + 1;
    			 }

                //Update warning in database
    			$sql = "UPDATE `userproject` SET `WarningCount`='".$WarningCount."' WHERE `userID`='".$userID."' AND `projectID`='".$projectID."';";

    			if ($conn->query($sql) === true) 
                {
                    array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3> De waarschuwing is toegevoegd.</span></h3>");
                }
                else 
                {
                    array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het updaten van de waarschuwingen.</span></h3>");
                    //echo "Error: " . $sql . "<br>" . $conn->error;
                }

                /* close result set */
                $result->close();
                /* close connection */
                $conn->close();

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