<?php 
function inlog($student_ID, $student_wachtwoord)
{
    // To protect MySQLi injection (more detail about MySQL injection)
    $student_ID = stripslashes($student_ID);
    $student_wachtwoord = stripslashes($student_wachtwoord);

    $student_ID = mysqli_reali_escape_string($student_ID);
    $student_wachtwoord = mysqlii_real_escape_string($student_wachtwoord);

    if ($count == 0) {
        $sql = ("SELECT * FROM `users` WHERE userID= '" . $student_ID . "' And userPass = '" . $student_wachtwoord . "';");
        $result = mysqli_query($sql);
         
         // Mysqli_num_row is counting table row
        $count = mysqli_num_rows($result);
         
         // als result matched $student_ID and $student_wachtwoord, table row must be 1 row
        if ($count == 1) {
            //ID opslaan en in session zeten 
            while ($row = mysqli_fetch_array($result)) {
                $userID = $row['userID'];
                $_SESSION["userID"] = $userID;
                $_SESSION["login"] = 1;
            }
        }
        if ($count == 0) {
            echo "Wrong userID or Password";
            header("Location:index.php?login=mislukt");
        }
    }
    $db->close();// database sluiten
}

function logout()
{
    session_start();
    session_destroy();
    header("Location:index.php?login=uitgelogt");
}
?>