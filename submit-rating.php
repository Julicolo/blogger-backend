<?php
    include './dbh.php';
    
    // SELECT comments.*, SUM(ratings.rating) as rating
    // FROM comments
    // LEFT JOIN ratings ON ratings.model_id = comments.id AND ratings.model_type = $TYPE
    // WHERE comments.post_id = $ID
    // GROUP BY comments.id
    // VALUE = $VALUE