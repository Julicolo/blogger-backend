<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function debug($info) {
        echo '<pre>';
        print_r($info);
        echo '<pre>';
    };

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    // debug($_POST);
    // $a = $_POST;
    echo json_encode('text');