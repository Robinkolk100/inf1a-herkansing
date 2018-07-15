<?php

	function getUsers($userReference)
	{
		$count = 0;

		$errorArray = array();
        $conn = dbConnect();
	   
	    $result = $conn->query("SELECT `userID`, `userName`
                                FROM `users`                             
                                WHERE `userName` LIKE '%".$userReference."%'
                                OR `userID` LIKE '".$userReference."'
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
    		array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>There are no users with the given value.</span></h3>");

   			return $errorArray;
   		}
    }

?>