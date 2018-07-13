<?php

	function deleteProjectDocument($projectID, $documentID)
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

        // Check if variable is an integer
		if (!ctype_digit(strval($projectID))) 
        {
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het project selecteren.</span></h3>");
    	}

        // Check if variable is an integer
    	if (!ctype_digit(strval($documentID))) 
        {
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het document selecteren.</span></h3>");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{

            // check if document is linked to project
    		if($count == 0)
    		{
    			$conn = dbConnect();
    			$result = $conn->query(" SELECT * FROM `projectdocuments` 
                                        WHERE `projectID`='".$projectID."' AND `documentID`='".$documentID."'");

            	$count = $result->num_rows;
    		}

            // Delete link between document and project
    		if($count > 0)
    		{
    			$sql = "DELETE FROM `projectdocuments` WHERE `projectID`='".$projectID."' AND `documentID`='".$documentID."';";

    			if ($conn->query($sql) === true) 
    			{
    				array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>
                        De document is ontkoppeld van het project.</span></h3>");
    			}
    			else 
    			{
    				array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het ontkoppelen van de document</span></h3>");
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
            	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>De gekozen document is niet gekoppeld aan het project.    </span></h3>");

            	return $errorArray;
        	}
    	}
    	else 
    	{
        	return $errorArray;
    	}
	}

?>