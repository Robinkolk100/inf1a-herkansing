<?php 
function NewAccountUser($student_ID, $student_userEmail, $student_userPass)
{
    $count = 0;
    $emailErr = 0;
    $IdErr = 0;

    //Validate E-mail
    if (!filter_var($student_userEmail, FILTER_VALIDATE_EMAIL)) 
    { 
        $emailErr = "Invalid email format";
    }
    
    // Check if variable is an integer
    if (!ctype_digit(strval($variable))) 
    {  
        $IdErr = "Your variable is not an integer";
    }
    

    if ($emailErr == 0 && $IdErr == 0) 
    {
        // kijken als deze persoon al eerder heeft opgegeven
        if ($count == 0) 
        {
            dbConnect();
            $sql = ("SELECT `userName`, `userEmail` FROM `users` WHERE `userID` = {$student_ID} OR `userEmail` = {$student_userEmail};");
            $result = mysqli_query($sql);
         
            // Mysql_num_row is counting table row
            $count = mysqli_num_rows($result);
        }

        // persoon in database zetten
        if ($count == 0) 
        { 
            $student_userEmail = strstr($student_userEmail, '@', true); // user name
            str_replace('.', ' ', $student_userEmail); // replace dot met black space 
            $student_userPass = mysqli_real_escape_string(dbConnect(), $student_userPass);
            $userPass_encrypt = password_hash("$student_userPass", PASSWORD_DEFAULT);
            @$db->run_query("INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES 
                            ('" . $student_ID . "', '" . $userName . "', '" . $student_userEmail . "', '" . $userPass_encrypt . "'); ");
            dbclose();
            header('Location:login.php?status=succes');
        }
        
        //als count 1 is heeft deze persoon zich al eerder opgegeven
        if ($count == 1) 
        { 
            dbclose();
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