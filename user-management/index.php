<?php
   include '../dbh.php';

    $query = $connection->prepare("
        SELECT *
        FROM USERS        
    ");
    
    $query->execute();

    $result = $query->get_result();

    $resultsArray = [];

    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    echo json_encode($resultsArray);

    $connection->close();
