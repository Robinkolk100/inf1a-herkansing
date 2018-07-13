<?php 
function NewProject($ProjectName, $projectPeriode, $projectGroup)
{
    $errcount = 0;
    $message = array();
    $conn = dbConnect();
    //check als alles is ingevult
    if ($ProjectName == '' || $projectPeriode == '' || $projectGroup == '') 
    {
        array_push($message, "ERROR - Please make sure all required fields are filled<br>");
    }

    // Check if variable is an integer
    if (!ctype_digit(strval($variable))) 
    {
        array_push($message, "Your variable is not an integer<br>");
    }

    // check als periode niet groter is dan 5
    if ($projectPeriode > 5) 
    {
        array_push($message, "Wil jij langer dan kan naar school dat kan niet knul<br>");
    } 
    else 
    {
        $errcount = count($message);
        //geen error ga door 
        if ($errcount == 0)
        {
            $projectYear = date("Y");// dit jaar
            $ProjectName = htmlentities($ProjectName);
            $projectGroup = htmlentities($projectGroup);
            $ProjectName = mysqli_real_escape_string($conn, $ProjectName);
            $projectGroup = mysqli_real_escape_string($conn, $projectGroup);

            $sql = "INSERT INTO `projects` (`projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) VALUES ('" . $projectGroup . "', '" . $projectPeriode . "', '" . $projectYear . "', '" . $ProjectName . "');";

            if ($conn->query($sql) === true) 
            {
                echo "New record created successfully<br>";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //header('Location:login.php?status=succes');
        } 
        else 
        {
            return $message;
        }
    }
    $conn->close();
}
?>