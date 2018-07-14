<?php

session_start();

require('../assets/config/connection.php');

$db = db_connection();


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $username = mysqli_real_escape_string($db, trim($_POST['username']));
  $password = mysqli_real_escape_string($db, trim($_POST['password']));

  if($username && $password) {

    $query = "SELECT * FROM account WHERE username='$username' AND password=SHA1('$password')";
    
    $result = mysqli_query($db, $query); 

    if($result) {

      $account_details = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $account_details['username'];
      $_SESSION['first_name'] = $account_details['first_name'];
      $_SESSION['last_name'] = $account_details['last_name'];
      $_SESSION['account_type'] = $account_details['type'];

      if($account_details['type'] == 'Front Desk') {
        header('Location: ../front_desk/index.php');
      } 
      
      if($account_details['type'] == 'Administrator') {
        header('Location: ../admin/index.php');
      }

    }
  }
  

}
