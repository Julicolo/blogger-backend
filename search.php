<?php
    include 'dbh.php';

    $search = "%{$_POST['input']}%";

    $query = $connection->prepare("
        SELECT *
        FROM posts
        WHERE title LIKE ? 
        OR author_name LIKE ? 
        OR post_content LIKE ?
    ");

    $query->bind_param('sss', $search, $search, $search);

    $query->execute();

    $result = $query->get_result();

    $resultsArray = [];

    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    $connection->close();
    
    echo json_encode($resultsArray);
