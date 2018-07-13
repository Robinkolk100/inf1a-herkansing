<?php

	function getProjects($userID)
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

	    // Check if variable is an integer
	    if (!ctype_digit(strval($userID)))  
	    {
	        array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan met uw ID, log opnieuw in om dit op te lossen</span></h3>");
	    }

	    $errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
    		$conn = dbConnect();
    		$result = $conn->query("SELECT `projectPeriode`, `projectGroup`, `projectYear`, `projectName` 
    								FROM `projects` 
    								JOIN `userproject` ON `projects`.`projectID` = `userproject`.`projectID`
                                    WHERE `userID`='".$userID."';");

            // Check if there are results
    		if($result->num_rows > 0)
    		{
    			//return sql results
    			return $result;
    		}
    		else 
    		{
    			array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>U hebt nog niet ingeschreven voor een project.</span></h3>");

   				return $errorArray;
   			}
   		}
   		else
   		{
    		return $errorArray;
    	}
    }

?>