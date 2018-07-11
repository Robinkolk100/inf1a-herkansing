<?php
function NewDocument($documentName)
{
    $count = 0;
    $errcount = 0;
    $message = array();
        // Check if variable is an integer
    if ((empty($student_ID))) {
        array_push($message, "Niks ingevult<br>");
    }
    $errcount = count($message);
    if ($errcount === 0) {
        // kijken ales er error is
        if ($errcount == 0) {
            $conn = dbConnect();
            $documentName = mysqli_real_escape_string($conn, $documentName);
            $documentName = htmlentities($documentName);
            // Mysql_num_row is counting table row
            $count = $result->num_rows;
            $sql = "INSERT INTO `documents` (`documentName`) VALUES ('" . $documentName . "')";

            if ($conn->query($sql) === true) {
                array_push($message, "New record created successfully<br>");
            }
            /* close connection */
            $conn->close();
        }
    } else {
        $conn->close();
        return $message;
    }
    function EditDocument()
    {

    }
    function DeleteDocument()
    {

    }




            /* close result set */
    $result->close();
            /* close connection */
    $conn->close();
    array_push($message, "is gelukt<br>");
            //header('Location:login.php?status=succes');
    return $message;
}
        
        //als count niet 0 is heeft deze persoon zich al eerder opgegeven
else {
            /* close connection */
    $conn->close();
           // header('Location:login.php?status=fail');
    array_push($message, "FAIL is al eerder opgegeven<br>");
    return $message;
}

} else {
    return $message;
}
}
?>
?>