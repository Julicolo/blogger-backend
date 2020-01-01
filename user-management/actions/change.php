<?php
    include '../../dbh.php';

    if (isset($_POST['id']) && isset($_POST['level'])) {
        $query = $connection->prepare("
            UPDATE users
            SET authLevel = ?
            WHERE id = ?
        ");

        $query->bind_param(
          'ii', $_POST['level'], $_POST['id']
        );

        $query->execute();

        debug($query);

        echo $query->affected_rows === 1 ? json_encode(true) : json_encode(false);
    }

    $connection->close();
