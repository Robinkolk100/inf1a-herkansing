<?php

    include 'db_connect.php';
    include 'function_getDocuments.php';

    $documents = getDocuments();
    foreach ($documents as $document) {
        echo $document['documentID']. "<br>";
        echo $document['documentName']. "<p>";
    }

?>