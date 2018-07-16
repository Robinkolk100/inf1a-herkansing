<?php

	function getProjectsYearTwo($userID)
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
    		//get projects from database
    		$conn = dbConnect();
    		$result = $conn->query("SELECT `projectPeriode`, `projectGroup`, `projectYear`, `projectName`, `projects`.`projectID` 
    														FROM `projects` 
    														JOIN `userproject` ON `projects`.`projectID` = `userproject`.`projectID`
                                WHERE `userID`='".$userID."' 
                                AND `projectYear` = '2'
                                ORDER BY `projectYear`, `projectPeriode` ASC;");

            // Check if there are results
    		if($result->num_rows > 0)
    		{
                /* close connection */
                $conn->close();
    			//return sql results
    			return $result;
    			/* 
					the return value will be in a array and have to be summon accordingly
					example:
					foreach ($rows as $row) {
						echo $row['projectPeriode'];
						echo $row['projectGroup'];
						echo $row['projectYear'];
						echo $row['projectName'];
					}
    			*/
    		}
    		else 
    		{
                /* close connection */
                $conn->close();
                //return sql results
    			array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>U hebt nog niet ingeschreven voor een project.</span></h3>");

   				return NULL;
   			}
   		}
   		else
   		{
    		return NULL;
    	}
    }

?>