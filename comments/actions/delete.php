<?php
    include '../../dbh.php';

    if (isset($_POST['id']) && isset($_POST['reason'])) {
        $query = $connection->prepare("
            UPDATE comments
            SET comment = ?
            WHERE id = ?
        ");

        $query->bind_param(
          'si', $_POST['reason'], $_POST['id']
        );

        $query->execute();

        $connection->close();
    }
