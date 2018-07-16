<?php

    function getAdvice($documentID)
    {
        $count = 0;
        $errorCount = 0;
        $errorArray = array();

        // Check if variable is an integer
        if (!ctype_digit(strval($documentID)))  
        {
            array_push($errorArray, "<span class='card-title red-text text-accent-4'><h3>Er is iets fout gegaan met het ophalen van de advies voor de document. probeer later opnieuw.</span></h3>");
        }

        $errorCount = count($errorArray);
        if($errorCount == 0)
        {
            //get advice from database
            $conn = dbConnect();
            $result = $conn->query("SELECT `adviceType`, `adviceTekst` 
                                    FROM `advice` 
                                    WHERE `documentID`='".$documentID."';");
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
                        echo $row['adviceType'];
                        echo $row['adviceTekst'];
                    }
                */
            }
            else 
            {
                /* close result set */
                $result->close();
                /* close connection */
                $conn->close();
               
                return NULL;
            }
        }
        else
        {
            return $errorArray;
        }
    }

?>