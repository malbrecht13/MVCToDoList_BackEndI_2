<?php

    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $dsn = "mysql:host=$hostname;dbname=$database";

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        include('view/error.php');
    }
?>
    