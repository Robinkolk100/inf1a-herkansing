<?php 
function NewAccountUser($student_ID, $student_userEmail, $student_userPass)
{
    $count = 0;
    $errcount = 0;
    $message = array();

    //Validate E-mail
    if (!filter_var($student_userEmail, FILTER_VALIDATE_EMAIL)) 
    {
        array_push($message, "<span class='card-title red-text text-accent-4'><h3>Geen valid Email is opgegeven</span></h3>");
    }
    
    // Check if variable is an integer
    if (!ctype_digit(strval($student_ID))) 
    {
        array_push($message, "<span class='card-title red-text text-accent-4'><h3>Opgegeven variable is geen nummer </h3></span>");
    }

    $errcount = count($message);
    if ($errcount === 0) 
    {
        // kijken als deze persoon al eerder heeft opgegeven
        if ($count == 0) 
        {
            $conn = dbConnect();
            $result = $conn->query("SELECT `userName`, `userEmail` FROM `users` WHERE `userID` = '" . $student_ID . "' OR `userEmail` = '" . $student_userEmail . "';");

            // Mysqli_num_row is counting table row
            $count = $result->num_rows;
        }

        // persoon in database zetten
        if ($count == 0) 
        {
            $userName = strstr($student_userEmail, '@', true); // user name
            $userName = str_replace('.', ' ', $userName); // replace dot met black space 
            $student_userPass = mysqli_real_escape_string($conn, $student_userPass);
            $userPass_encrypt = hash('sha256', $student_userPass);

            $sql = "INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES ('" . $student_ID . "', '" . $userName . "', '" . $student_userEmail . "', '" . $userPass_encrypt . "')";

            if ($conn->query($sql) === true) 
            {
                array_push($message, "<span class='card-title lime-text text-accent-4'><h3>Nieuwe gebruiker is toegevoegd</span></h3>");
                $_SESSION["userID"] = $student_ID;
                $_SESSION["login"] = 1;
            } 
            else 
            {
                echo "<span class='card-title red-text text-accent-4'>  Error: " . $sql . "</span><br>" . $conn->error;
            }
            /* close result set */
            $result->close();
            /* close connection */
            $conn->close();
            //array_push($message, "<span class='card-title lime-text text-accent-4'>is gelukt</span>");
            //header('Location:login.php?status=succes');
            return $message;
        }
        else 
        {
            /* close connection */
            $conn->close();
            // als wachtwoord of nummer niet kloppen 
            array_push($message, "<span class='card-title red-text text-accent-4'><h3>Email of nummer is al eerder opgegeven</span></h3>");
            return $message;
        }

    } 
    else 
    {
        return $message;
    }
}
?>