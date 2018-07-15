<?php

	function getProjectMembers($projectID)
	{
		$count = 0;
		$errorCount = 0;
		$errorArray = array();

	    // Check if variable is an integer
	    if (!ctype_digit(strval($projectID)))  
	    {
	        array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3><h3>Er is iets fout gegaan met het ophalen van de projectleden.</span></h3>");
	    }

	    $errorCount = count($errorArray);
    	if($errorCount == 0)
    	{
    		//get projects from database
    		$conn = dbConnect();
    		$result = $conn->query("SELECT `users`.`userID`, `users`.`userName` 
    								FROM `userproject`
                                    JOIN  `users` ON `userproject`.`userID` = `users`.`userID`
    								WHERE `projectID`='".$projectID."'
                                    ORDER BY `userID` ASC;");

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
						echo $row['userID'];
						echo $row['userName'];
					}
    			*/
    		}
    		else 
    		{
                /* close connection */
                $conn->close();
                //return sql results
    			array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er konden geen projectleden worden opgehaald.</span></h3>");

   				return $errorArray;
   			}
   		}
   		else
   		{
    		return $errorArray;
    	}
    }

?>