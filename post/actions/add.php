<?php
    include '../../dbh.php';

    if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['postContent'])) {
        $query = $connection->prepare("
            INSERT INTO posts (title, author_name, post_content)
            VALUES (?, ?, ?)
        ");

        $query->bind_param(
          'sss', $_POST['title'], $_POST['author'], $_POST['postContent']
        );

        $query->execute();

        if ($query->affected_rows === 1) echo json_encode('success!');
    }

    $connection->close();
