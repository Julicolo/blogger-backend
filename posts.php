<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    
    $_POST = json_decode(file_get_contents('php://input'), true);

    $connection = new mysqli('localhost', 'root', 'root', 'blog');
    $connection->set_charset('utf8');

    $query = $connection->prepare("
        SELECT *
        FROM posts
        ORDER BY id DESC
        LIMIT ?, 10
    ");

    $query->bind_param(
      'i', $_POST['start']
    );

    $query->execute();

    $result = $query->get_result();

    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    echo json_encode($resultsArray);

    $connection->close();

