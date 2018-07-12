<?php

	function deleteProjectDocument($projectID, $documentID)
	{
		$errorCount = 0;
		$errorArray = array();
		
		if (!ctype_digit(strval($projectID))) {
        	array_push($errorArray, "Error on project selection");
    	}

    	if (!ctype_digit(strval($documentID))) {
        	array_push($errorArray, "Error on document selection");
    	}


	}

?>