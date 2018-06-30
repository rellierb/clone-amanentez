<?php

require('../assets/config/connection.php');

$query = "SELECT * FROM room";
$result = mysqli_query($conn, $query);

$rooms = array();

if(mysqli_num_rows($result) > 0) {
    $rooms = $result->fetch_all(MYSQLI_ASSOC);
}

echo json_encode($rooms);