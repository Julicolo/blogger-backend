<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function debug($info) {
        echo '<pre>';
        print_r($info);
        echo '<pre>';
    };

    include '../dbh.php';

    $query = $connection->prepare("
        SELECT comments.*, SUM(ratings.rating) as rating
        FROM comments
        LEFT JOIN ratings ON ratings.model_id = comments.id AND ratings.model_type = 'comment'
        WHERE comments.post_id = ?
        GROUP BY comments.id
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
