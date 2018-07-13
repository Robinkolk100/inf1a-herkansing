<?php

	function uploadProjectDocument($projectID, $documentID, $documentLink) 
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
            // Check if document is linked to project
    		if($count == 0)
    		{
    			$conn = dbConnect();
    			$result = $conn->query(" SELECT * FROM `projectdocuments` 
                                        WHERE `projectID`='".$projectID."' AND `documentID`='".$documentID."'");

            	$count = $result->num_rows;
    		}

            // Update project document 
    		if($count > 0)
    		{
    			$sql = "UPDATE `projectdocuments` 
                        SET `documentLink`='".$documentLink."', `documentUpload`=NOW() 
                        WHERE `projectID`='".$projectID."' 
                        AND `documentID`='".$documentID."';";

    			if ($conn->query($sql) === true) 
                {
                    array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Document is ingeleverd.</span></h3>");
                }
                else 
                {
                    array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het inleveren.</span></h3>");
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
            	array_push($errorArray, "FAIL is nog niet eerder opgegeven<br>");
            	return $errorArray;
        	}
    	}
    	else 
    	{
        	return $errorArray;
    	}
	}

?>