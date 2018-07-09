<?php 
function NewAccountUser($student_ID, $student_userEmail, $student_userPass)
{
    $count = 0;
    $emailErr = 0;
    $IdErr = 0;
    if (!filter_var($student_userEmail, FILTER_VALIDATE_EMAIL)) { //Validate E-mail
        $emailErr = "Invalid email format";
    }
    if (!ctype_digit(strval($variable))) {  // Check if variable is an integer
        $IdErr = "Your variable is not an integer";
    }
    if ($emailErr == 0 && $IdErr == 0) {
    // kijken als deze persoon al eerder heeft opgegeven
        if ($count == 0) {
            $sql = ("SELECT * FROM `users` WHERE `userID_ID` = '" . $student_ID . "';");
            $result = mysqli_query($sql);
         
         // Mysql_num_row is counting table row
            $count = mysqli_num_rows($result);
        }

        if ($count == 0) { // persoon in database zetten
            $student_userPass = mysqli_real_escape_string($db->connect(), $student_userPass);
            @$db->run_query("INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES 
                                    ('" . $student_ID . "', '" . $userName . "', '" . $student_userEmail . "', '" . $student_userPass . "'); ");
            header('Location:login.php?status=succes');
        }
        if ($count == 1) { //als count 1 is heeft deze persoon zich al eerder opgegeven
            header('Location:login.php?status=fail');
        }
    } else {
        return array('IdErr' => $IdErr, 'emailErr' => $emailErr);
        /* 
        And accessing it:
            $new = newaccountuser();
            echo $new['IdErr'];
            echo $new['emailErr'];
         */
    }
}
?>