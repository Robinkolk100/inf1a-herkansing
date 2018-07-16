<?php

    function getDocuments()
    {
        $errorArray = array();

        $conn = dbConnect();
        $result = $conn->query("SELECT `documentID`, `documentName` FROM `documents` ORDER BY `documents`.`documentID` ASC");
        
        // Check if there are results
        if($result->num_rows > 0)
        {
            /* close connection */
            $conn->close();
            //return sql results
            return $result;
            /* 
                the return value will be in a array and have to be summon accordingly
                example:
                foreach ($rows as $row) {
                    echo $row['documentID'];
                    echo $row['documentName'];
                }
            */
        }
        else 
        {
            /* close connection */
            $conn->close();
            return NULL;
        }
    }

?>