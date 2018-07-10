<?php 
function NewAccountUser($student_ID, $student_userEmail, $student_userPass)
{
    $count = 0;
    $errcount = 0;
    $message = array();

    //Validate E-mail
    if (!filter_var($student_userEmail, FILTER_VALIDATE_EMAIL)) {
        array_push($message, "Invalid email format<br>");
    }
    
    // Check if variable is an integer
    if (!ctype_digit(strval($student_ID))) {
        array_push($message, "Your variable is not an integer<br>");
    }

    $errcount = count($message);
    if ($errcount === 0) {
        // kijken als deze persoon al eerder heeft opgegeven
        if ($count == 0) {
            $conn = dbConnect();
            $result = $conn->query("SELECT `userName`, `userEmail` FROM `users` WHERE `userID` = '" . $student_ID . "' OR `userEmail` = '" . $student_userEmail . "';");

            // Mysql_num_row is counting table row
            $count = $result->num_rows;
        }

        // persoon in database zetten
        if ($count == 0) {
            $userName = strstr($student_userEmail, '@', true); // user name
            $userName = str_replace('.', ' ', $userName); // replace dot met black space 
            $student_userPass = mysqli_real_escape_string($conn, $student_userPass);
            $userPass_encrypt = password_hash("$student_userPass", PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES ('" . $student_ID . "', '" . $userName . "', '" . $student_userEmail . "', '" . $userPass_encrypt . "')";

            if ($conn->query($sql) === true) {
                echo "New record created successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
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
return;
?>