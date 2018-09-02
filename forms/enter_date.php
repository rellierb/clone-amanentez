<?php
session_start();
include_once('../assets/config/connection.php');

$db = db_connection();

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST["checkDate"])) {
    $_SESSION["checkin_checkout"] = $_POST["checkDate"];
  }

  header('location: ../booking/reserve.php');

}