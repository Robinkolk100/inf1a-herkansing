<?php
function NewDocument($documentName)
{
    $count = 0;
    $errcount = 0;
    $message = array();
    // Check if variable is an integer
    if ((empty($documentName))) 
    {
        array_push($message, "Niks ingevult<br>");
    }

    $errcount = count($message);
    if ($errcount == 0) 
    {

        // Insert document into database
        $conn = dbConnect();
        $documentName = mysqli_real_escape_string($conn, $documentName);
        $documentName = htmlentities($documentName);
        $sql = "INSERT INTO `documents` (`documentID`,`documentName`) VALUES ( NULL, '" . $documentName . "')";

        if ($conn->query($sql) === true) 
        {
            array_push($message, "<span class='card-title red-text text-accent-4'><h3>".$documentName." is aangemaakt.</span></h3>");
        } 
        else 
        {
            array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan bij het aanmaken van het document</span></h3>");
                //echo "Error: " . $sql . "<br>" . $conn->error;
        }
        /* close connection */
        $conn->close();
        
        return $message;
        }
    } 
    else 
    {

        return $message;
    }
}
?>