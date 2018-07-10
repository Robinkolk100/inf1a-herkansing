<?php 
function NewProject($ProjectName, $projectPeriode, $projectGroup)
{
    //check als alles is ingevult
    if ($ProjectName == '' || $projectPeriode == '' || $projectGroup == '') {
        $err = "ERROR - Please make sure all required fields are filled";
    }
        // Check if variable is an integer
    if (!ctype_digit(strval($variable))) {
        $IdErr = "Your variable is not an integer";
    }
    // check als periode niet groter is dan 5
    if ($projectPeriode > 5) {
        $errperiode = "Wil jij langer dan kan naar school dat kan niet knul";
    } else {
        //geen error ga door 
        if ($err == 0) {
            $projectYear = date("Y");// dit jaar
            $ProjectName = htmlentities($ProjectName);
            $projectGroup = htmlentities($projectGroup);
            $ProjectName = mysqli_real_escape_string($db->connect(), $ProjectName);
            $projectGroup = mysqli_real_escape_string($db->connect(), $projectGroup);

            @$db->run_query("INSERT INTO `projects` (`projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) VALUES 
            ('" . $projectGroup . "', '" . $projectPeriode . "', '" . $projectYear . "', '" . $ProjectName . "'); ");
            header('Location:login.php?status=succes');
        } else {
            return array('errperiode' => $errperiode, 'err' => $err);
        }
    }
}
function EditProject()
{

}
function DeleteProject()
{

}
function AddUserToProject()
{

}
?>