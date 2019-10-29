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

    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    $noResults = [[
        'id' => '',
        'title' => 'No results!',
        'post_content' => '',
        'author_name' => ''
    ]];

    echo $resultsArray ? json_encode($resultsArray) : json_encode($noResults);

    $connection->close();

