<?php
    include '../dbh.php';

    $query = $connection->prepare("
        SELECT posts.*, SUM(ratings.rating) as rating
        FROM posts
        LEFT JOIN ratings ON ratings.model_id = posts.id AND ratings.model_type = 'post'
        WHERE posts.id = ?
        GROUP BY posts.id
    ");

    $query->bind_param(
      'i', $_POST['id']
    );

    $query->execute();

    $result = $query->get_result();

    $resultsArray = [];

    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    echo json_encode($resultsArray);

    $connection->close();

