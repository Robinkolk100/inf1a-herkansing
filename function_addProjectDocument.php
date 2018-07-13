<?php

	function addProjectDocument($projectID, $documentID, $documentDeadline) 
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

        // Check if variable is an integer
		if (!ctype_digit(strval($documentID))) 
        {
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het document selecteren.</span></h3>");
    	}

        // Check if variable is an integer
    	if (!ctype_digit(strval($projectID))) 
        {
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het project selecteren.</span></h3>");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
            // check if document is already linked
    		if($count == 0)
    		{
    			$conn = dbConnect();
    			$result = $conn->query(" SELECT * FROM `projectdocuments` 
                                        WHERE `projectID`='".$projectID."' AND `documentID`='".$documentID."'");

                // Mysqli_num_row is counting table row
            	$count = $result->num_rows;
    		}

            //Adding document to project
    		if($count == 0)
    		{
    			$sql = "INSERT INTO `projectdocuments` (`projectID`, `documentID`, `documentDeadline`) 
    					VALUES ('".$projectID."', '".$documentID."', '".$documentDeadline."');";

    			if ($conn->query($sql) === true) 
    			{
    				array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>De document is toegevoegd aan de project.</span></h3>");
    			}
    			else 
    			{
    				array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het koppelen van de document</span></h3>");
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
            	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>De geselecteerde document is al gelinked.</span></h3>");
            	return $errorArray;
        	}
    	}
    	else 
    	{
        	return $errorArray;
    	}
	}

?>