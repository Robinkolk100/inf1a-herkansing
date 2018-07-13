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
            array_push($message, "successfully created ".$documentName."<br>");
        } 
        else 
        {
            array_push($message, "Er is iets mis gegaan<br>");
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