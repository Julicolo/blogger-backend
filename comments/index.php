<?php
    include '../dbh.php';

    $query = $connection->prepare("
        SELECT *
        FROM comments
        WHERE post_id = ?
    ");

    $query->bind_param(
      'i', $_POST['id']
    );

    $query->execute();

    $result = $query->get_result();

    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    echo $resultsArray ? json_encode($resultsArray) : json_encode([]);

    $connection->close();
