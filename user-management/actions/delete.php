<?php
    include '../../dbh.php';

    if (isset($_POST['id'])) {
        $query = $connection->prepare("
            DELETE FROM users
            WHERE id = ?
        ");

        $query->bind_param(
          'i', $_POST['id']
        );

        $query->execute();

        echo $query->affected_rows === 1 ? json_encode(true) : json_encode(false);
    }

    $connection->close();
