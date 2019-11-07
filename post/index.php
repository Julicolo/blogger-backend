<?php
    include '../dbh.php';

    $query = $connection->prepare("
        SELECT *
        FROM posts
        WHERE id = ?
    ");

    $query->bind_param(
      'i', $_POST['id']
    );

    $query->execute();

    $result = $query->get_result();

    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    echo json_encode($resultsArray);

    $connection->close();

