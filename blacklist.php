<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    
    $_POST = json_decode(file_get_contents('php://input'), true);

    $connection = new mysqli('localhost', 'root', 'root', 'blog');
    $connection->set_charset('utf8');

    $query = $connection->query("
        SELECT *
        FROM blacklist
    ");

    while ($row = $query->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    echo json_encode($resultsArray);

    $connection->close();
