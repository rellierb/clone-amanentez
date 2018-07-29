<?php

session_start();
include('../../partials/header.php');
include('../../assets/config/connection.php');

$db = db_connection();

if($_SERVER['REQUEST_METHOD'] == "POST") {

  // var formFields = ["room_type", "description", "simple_description", "capacity", "rate"];
  if(isset($_POST["room_type"])) {
    $room_type =  mysqli_real_escape_string($db, trim($_POST["room_type"]));
  }

  if(isset($_POST["description"])) {
    $description =  mysqli_real_escape_string($db, trim($_POST["description"]));
  }

  if(isset($_POST["simple_description"])) {
    $simple_description =  mysqli_real_escape_string($db, trim($_POST["simple_description"]));
  }
  
  if(isset($_POST["capacity"])) {
    $capacity =  mysqli_real_escape_string($db, trim($_POST["capacity"]));
  }

  if(isset($_POST["rate"])) {
    $rate =  mysqli_real_escape_string($db, trim($_POST["rate"]));
  }

  echo $room_type;
  echo $description;
  echo $simple_description;
  echo $capacity;
  echo $rate;


  $query = "INSERT INTO room (type, description, simple_description, capacity, rate) VALUES ('$room_type', '$description', '$simple_description', '$capacity', '$rate')";

  echo $query;

  $result = mysqli_query($db, $query); 

  if($result) {
    $_SESSION["add_room_msg_success"] = "Room Successfully added";
    header('Location: ../../admin/index.php');
  } else {
    $_SESSION["add_room_msg_error"] = "Error. Room Cannot be added";
    header('Location: ../../admin/index.php');
  }

  

}