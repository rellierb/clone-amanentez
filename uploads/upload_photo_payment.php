<?php

session_start();

require('../assets/config/connection.php');

$db = db_connection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $reference_no = $_POST['referenceNo'];

  $query = "SELECT res.id, res.reference_no, res.status FROM reservation res WHERE res.reference_num='$reference_no'";
  $result = mysqli_query($db, $query);

  if(intval(mysqli_num_rows($result)) == 1) {
    while($reference = mysqli_fetch_assoc($result)) {
      $reservation_id = $reference['id'];
      $reservation_status = $reference['status'];
    }

    $target_dir = "payment_photo/";
    $target_file = $target_dir . basename($_FILES["paymentPhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if((isset($_POST["submit"])) && ($reservation_status != 'FOR PAYMENT CONFIRMATION')) {
      $check = getimagesize($_FILES["paymentPhoto"]["tmp_name"]);

      if($check !== false) {

        if (file_exists($target_file)) {
          $uploadOk = 0;
          $_SESSION['file_upload']['err_file_exists'] = "Your photo has existing name";
        } 
    
        if ($_FILES["paymentPhoto"]["size"] > 500000) {
          $uploadOk = 0;
          $_SESSION['file_upload']['err_file_size'] = "The file you uploaded has exceeded the capacity of 5MB";
        } 
    
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $uploadOk = 0;
          $_SESSION['file_upload']['err_file_type'] = "The file types allowed are JPG, PNG, JPEG, and GIF";
        } 
    
        if ($uploadOk == 0) {
          $_SESSION['file_upload']['err_file'] = "Sorry, there was an error uploading your file";
         
        } else {
          if (move_uploaded_file($_FILES["paymentPhoto"]["tmp_name"], $target_file)) {
      
            $query = "UPDATE reservation res SET res.status='FOR PAYMENT CONFIRMATION', res.date_updated=NOW() WHERE res.reference_no='$reference_no'";
    
            $result = mysqli_query($db, $query);
    
            if($result) {
              header('Location: success.php');
            }    
            
          } else {
            $_SESSION['file_upload']['err_file'] = "Sorry, there was an error uploading your file";
            header('Location: index.php');
          }
        }

      } else {
        $uploadOk = 0;
      }
    } else {
      
    }    

  } else {
    $_SESSION['err_record_not_found'] = "Your reference number is invalid";
    header('Location: index.php');
  }


}

