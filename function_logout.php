<?php

    // Stopping session to logout the user
    session_start();
    session_unset();
    session_destroy();
    header('location: Index.php');
    echo "<span class='card-title lime-text text-accent-4'><h3>U bent uit gelogt</h3></span>";

?>