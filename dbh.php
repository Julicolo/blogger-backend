<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    
    $_POST = json_decode(file_get_contents('php://input'), true);

    $connection = new mysqli('localhost', 'root', 'password', 'blog');
    $connection->set_charset('utf8');    

    function debug($info) {
        echo '<pre>';
        print_r($info);
        echo '<pre>';
    };
