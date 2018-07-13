<?php

	function addProject($projectGroup, $projectPeriod, $projectYear, $projectName)
	{
		$errorArray = array();
		$errCount = 0;

        // Check if variable is an integer
		if (!ctype_digit(strval($projectPeriod))) 
		{
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is een verkeerde periode waarde ingevuld.</span></h3>");
    	}

        // Check if variable is an integer
		if (!ctype_digit(strval($projectYear))) 
		{
        	array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is een verkeerde jaar waarde ingevuld.</span></h3>");
    	}

    	$errCount = count($errorArray);

        // Adding project to database
    	if($errCount == 0)
    	{
    		$projectName = htmlspecialchars($projectName);

    		$conn = dbConnect();

    		$sql = "INSERT INTO `projects` 
    		(`projectID`, `projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) 
    		VALUES (NULL, '".$projectGroup."', '".$projectPeriod."', '".$projectYear."', '".$projectName."');";

    		if ($conn->query($sql) === true) 
    		{
                $last_id = $conn->insert_id;
                array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Project is succesful aangemaakt.</span></h3>");
                addProjectMember($_SESSION["userID"], $last_id);
            } 
            else 
            {
                array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het uploaden van het project</span></h3>");
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }

            /* close connection */
            $conn->close();
            
            return $errorArray;
    	}
    	else 
    	{
        	return $errorArray;
    	}

	}

?>