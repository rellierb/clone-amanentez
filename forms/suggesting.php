<?php

include('../assets/config/connection.php');

$db = db_connection();  

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $full_name = mysqli_real_escape_string($db, trim($_POST['fullName']));
  $email_address = mysqli_real_escape_string($db, trim($_POST['emailAddress']));
  $rating = mysqli_real_escape_string($db, trim($_POST['rating']));
  $comment = mysqli_real_escape_string($db, trim($_POST['comment']));

  echo $full_name;
  echo $email_address;
  echo $rating;
  echo $comment;


  $query = "INSERT INTO suggestion(full_name, email, comment, rating) VALUES ('$full_name', '$email_address', '$comment', $rating)";

  $result = mysqli_query($db, $query);

  if($result) {
    echo 'success';
  } else {
    echo 'fail';
  }


}