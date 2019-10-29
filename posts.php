<?php
    include 'dbh.php';

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

