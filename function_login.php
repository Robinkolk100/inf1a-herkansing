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
    $hash = hash('sha256', $student_wachtwoord);

    $result = $conn->query("SELECT * FROM `users` WHERE `userID` = '" . $student_ID . "' And `userPass` = '" . $hash . "';");
        
        // Mysql_num_row is counting table row
    $count = $result->num_rows;
        // als result matched $student_ID and $student_wachtwoord, table row must be 1 row
    if ($count == 1) {
            //ID opslaan en in session zeten 
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["userID"] = $row['userID'];
            $_SESSION["login"] = 1;
        }
    }
    if ($count == 0) {
        array_push($message, "Wrong userID or Password");
        return $message;
    }
     /* close result set */
    $result->close();
    /* close connection */
    $conn->close();
    array_push($message, "is gelukt");
    return $message;
}

function Logout()
{
    session_unset();
    session_destroy();
    return;
}
?>