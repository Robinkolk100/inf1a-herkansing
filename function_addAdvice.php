<?php

	function addAdvice($documentID, $adviceType, $adviceTekst)
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

		if (!ctype_digit(strval($documentID))) {
        	array_push($errorArray, "Error on document selection");
    	}

    	$errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
    		if($count == 0)
    		{
    			$conn = dbConnect();
    			$result = $conn->query(" SELECT * FROM `documents` 
                                        WHERE `documentID`='".$documentID."';");

            	$count = $result->num_rows;
    		}

    		if($count > 0)
    		{
    			$sql = "INSERT INTO `advice` (`adviceID`, `documentID`, `adviceType`, `adviceTekst`) 
    					VALUES (NULL, '".$documentID."', '".$adviceType."', '".$adviceTekst."');";

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