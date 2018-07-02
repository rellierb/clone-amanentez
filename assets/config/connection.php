<?php

function db_connection() {
    static $conn;
    $server = 'localhost';
    $db_name = 'amanentez';
    $password = '';
    $username = 'root';
    
    $conn = @mysqli_connect($server, $username, $password, $db_name);

    if(!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 
    
    return $conn;
}
