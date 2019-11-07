<?php
    include '../../dbh.php';

    if (isset($_POST['delete'])) {
        $query = $connection->prepare("
            DELETE FROM blacklist
            WHERE id = ?
        ");

        $query->bind_param(
          'i', $_POST['delete']
        );

        $query->execute();

        $connection->close();
    }