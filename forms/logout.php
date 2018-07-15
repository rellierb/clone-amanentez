<?php

session_start();

include('../assets/config/connection.php');

// if($_ES)

if(isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['account_type'])){

  session_destroy();
  header('location: ../index.php');

}