<?php
    include '../../dbh.php';

    $userIp = $_SERVER['REMOTE_ADDR'];

    if (isset($_POST['post_id']) && isset($_POST['name']) && isset($_POST['comment'])) {
        $query = $connection->prepare("
            INSERT INTO comments (post_id, user_ip, name, comment)
            VALUES (?, ?, ?, ?)
        ");

        $query->bind_param(
          'isss', $_POST['post_id'], $userIp, $_POST['name'], $_POST['comment']
        );

        $query->execute();
    }

    $connection->close();
