<?php 

function Inlog($student_ID, $student_wachtwoord)
{
    $count = 0;
    $conn = dbConnect();
    $message = array();

    // To protect MySQLi injection (more detail about MySQL injection)
    $student_ID = mysqli_real_escape_string($conn, $student_ID);
    $student_ID = stripslashes($student_ID);
    $student_wachtwoord = mysqli_real_escape_string($conn, $student_wachtwoord);

    // Check if variable is an integer
    if (!ctype_digit(strval($student_ID))) 
    {
        array_push($message, "<span class='card-title red-text text-accent-4'><h3>Vul een nummer in bij studentnummer</h3></span>");
    }

    $hash = hash('sha256', $student_wachtwoord);
    $result = $conn->query("SELECT * FROM `users` WHERE `userID` = '" . $student_ID . "' And `userPass` = '" . $hash . "';");
        
    // Mysql_num_row is counting table row
    $count = $result->num_rows;

    // Using query result to log in 
    if ($count == 1) 
    {
        // Save query result in Session 
        while ($row = mysqli_fetch_array($result)) 
        {
            $_SESSION["userID"] = $row['userID'];
            $_SESSION["login"] = 1;
        }
    }
    if ($count == 0) 
    {
        array_push($message, "<span class='card-title red-text text-accent-4'><h3>Verkeerde gebruikers naam of wachtwoord </h3></span>");
        return $message;
    }

     /* close result set */
    $result->close();
    /* close connection */
    $conn->close();
    
    array_push($message, "<span class='card-title lime-text text-accent-4'><h3>U bent ingelogt</span></h3>");
    return $message;
}

function Logout()
{
    // Stopping session to logout the user
    session_unset();
    session_destroy();
    return "<span class='card-title lime-text text-accent-4'><h3>U bent uit gelogt</h3></span>";
}
?>