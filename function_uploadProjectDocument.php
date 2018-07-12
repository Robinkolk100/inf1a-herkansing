<?php

	function uploadProjectDocument($projectID, $documentID, $documentLink) 
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

		if (!ctype_digit(strval($documentID))) {
        	array_push($errorArray, "Error on document selection");
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
    			$result = $conn->query(" SELECT * FROM `projectdocuments` 
                                        WHERE `projectID`='".$projectID."' AND `documentID`='".$documentID."'");

            	$count = $result->num_rows;
    		}

    		if($count > 0)
    		{
    			$sql = "UPDATE `projectdocuments` 
                        SET `documentLink`='".$documentLink."', `documentUpload`=NOW() 
                        WHERE `projectID`='".$projectID."' 
                        AND `documentID`='".$documentID."';";

    			if ($conn->query($sql) === true) 
    			{
    				array_push($errorArray, "Record has been updated<br>");
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