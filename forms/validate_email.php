<?php

require('../assets/config/connection.php');

$db = db_connection();

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = mysqli_real_escape_string($db, trim($_POST["client_email"]));
  $query = "SELECT email FROM client WHERE email='$email'";

  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) == 1) {
    echo "true";
  } else {
    echo "false";
  }

}