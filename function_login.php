<?php 
function inlog($student_ID, $student_wachtwoord)
{
    if ($count == 0) {
        $sql = ("SELECT * FROM `users` WHERE userID= '" . $student_ID . "' And userPass = '" . $student_wachtwoord . "';");
        $result = mysqli_query($sql);
         
         // Mysql_num_row is counting table row
        $count = mysqli_num_rows($result);
         
         // als result matched $student_ID and $student_wachtwoord, table row must be 1 row
        if ($count == 1) {
            //ID opslaan en in session zeten 
            while ($row = mysqli_fetch_array($result)) {
                $userID = $row['userID'];
                $_SESSION["userID"] = $userID;
            }
        }
    }
}



?>