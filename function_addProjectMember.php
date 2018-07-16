<?php

	function addProjectMember($userID, $projectID) 
	{
		$checkUser = 0;
        $checkConnectedUser = 0;
		$errorCount = 0;
		$errorArray = array();

        // Check if variable is an integer
		if (!ctype_digit(strval($userID))) 
        {
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het gebuiker selecteren.</span></h3>");
    	}

        // Check if variable is an integer
    	if (!ctype_digit(strval($projectID))) 
        {
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het project selecteren.</span></h3>");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
            $conn = dbConnect();
    	
            // check user exists
            if($checkUser == 0)
    	    {
                $result = $conn->query("SELECT `userID` FROM `users` WHERE `userID` = '".$userID."';");

                if(($result->num_rows) > 0)
                {
                    $checkUser = 1;
                }
                else
                {
                    $checkUser = 0;
                }
                /* close result set */
                $result->close();
            }

            // check if user is already linked
            if($checkConnectedUser == 0)
            {
                $result = $conn->query("SELECT * FROM `userproject` 
                                        WHERE `userID`='".$userID."' AND `projectID`='".$projectID."';");

                if(($result->num_rows) > 0)
                {
                    $checkConnectedUser = 1;      
                }
                else 
                {
                    $checkConnectedUser = 0;
                }
               /* close result set */
                $result->close();
            }

            //Adding document to project
    	    if($checkUser > 0 && $checkConnectedUser == 0)
    	 	{
    	 		$sql = "INSERT INTO `userproject` (`userID`, `projectID`, `WarningCount`) 
    	 				VALUES ('".$userID."', '".$projectID."', '0');";

    	 		if ($conn->query($sql) === true) 
    	 		{
    	 			array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>
                         Nieuwe gebruiker is toegevoegd aan het project.</span></h3>");
    	 		}
    	 		else 
    	 		{
    	 			array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het koppelen van de gebruiker</span></h3>");
                     //echo "Error: " . $sql . "<br>" . $conn->error;
    	 		}

                 /* close connection */
    	 		$conn->close();

            	return $errorArray;
    		}
    		else 
    		{
           	 	/* close connection */
            	$conn->close();
          	 	// header('Location:login.php?status=fail');
            	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>De gebruiker bestaat niet of is al gekoppeld</span></h3>");
            	return $errorArray;
        	}
    	}
    	else 
    	{
        	return $errorArray;
    	}
	}

?>