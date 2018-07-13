<?php

	function addAdvice($documentID, $adviceType, $adviceTekst)
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

        // Check if variable is an integer
		if (!ctype_digit(strval($documentID))) 
        {
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het document selecteren.</span></h3>");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{

            // check if documentID exists
    		if($count == 0)
    		{
    			$conn = dbConnect();
    			$result = $conn->query(" SELECT * FROM `documents` 
                                        WHERE `documentID`='".$documentID."';");

                // Mysqli_num_row is counting table row
            	$count = $result->num_rows;
    		}

            //Adding advice to database
    		if($count > 0)
    		{
    			$sql = "INSERT INTO `advice` (`adviceID`, `documentID`, `adviceType`, `adviceTekst`) 
    					VALUES (NULL, '".$documentID."', '".$adviceType."', '".$adviceTekst."');";

    			if ($conn->query($sql) === true) 
    			{
    				array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Advies is succesful aangemaakt.</span></h3>");
    			}
    			else 
    			{
                    array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het uploaden van de advies</span></h3>");
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
            	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>De document bestaat niet.</span></h3>");
            	return $errorArray;
        	}
    	}
        //if count is 0 n
    	else 
    	{
        	return $errorArray;
    	}

	}

?>