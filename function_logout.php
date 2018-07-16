<?php

    // Stopping session to logout the user
    session_start();
   unset($_SESSION['user']);
    header('location: Index.php');
    echo "<span class='card-title lime-text text-accent-4'><h3>U bent uit gelogt</h3></span>";

?>