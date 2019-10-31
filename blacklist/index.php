<?php
    include '../dbh.php';

    $query = $connection->query("
        SELECT *
        FROM blacklist
        ORDER BY id DESC
    ");

    while ($row = $query->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    $connection->close();
    
    echo json_encode($resultsArray);
