<?php
function NewDocument($documentName)
{
    $count = 0;
    $errcount = 0;
    $errorArray = array();
    // Check if variable is an integer
    if ((empty($documentName))) 
    {
        array_push($errorArray, "Niks ingevult<br>");
    }

    $errcount = count($errorArray);
    if ($errcount == 0) 
    {

        // Insert document into database
        $conn = dbConnect();
        $documentName = mysqli_real_escape_string($conn, $documentName);
        $documentName = htmlentities($documentName);
        $sql = "INSERT INTO `documents` (`documentID`,`documentName`) VALUES ( NULL, '" . $documentName . "')";

        if ($conn->query($sql) === true) 
        {
            /* close connection */
            $conn->close();

            return 1;
        } 
        else 
        {
            /* close connection */
            $conn->close();

            return NULL;
        }
    } 
    else 
    {

        return NULL;
    }
}
?>