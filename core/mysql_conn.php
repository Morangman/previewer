<?php

include 'env.php';

// connect to databse
function connect() {
    $env = getEnvValues();

    $hostname = $env['DB_HOST'];
    $username = $env['DB_USERNAME'];
    $password = $env['DB_PASSWORD'];
    $database = $env['DB_DATABASE'];
    $port = $env['DB_PORT'];
    
    $connection = mysqli_connect($hostname, $username, $password, $database, $port);
    
    if ($connection->error) {
        die('Could not connect: ' . $connection->error);
    }

    if (!$connection) {
        die('MySQL connection error! ' . mysqli_connect_error());
    }

    mysqli_query($connection, "SET NAMES UTF8");
    
    return $connection;
}