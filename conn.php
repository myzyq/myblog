<?php
$dsn      = 'mysql:dbname=myblog;host=127.0.0.1';
$user     = 'root';
$password = 'root';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (Exception $e) {
     echo $e ->getMessage();die;
}
