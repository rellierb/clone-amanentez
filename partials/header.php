<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation System Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/bootstrap.css">
    <!-- <link rel="stylesheet" href="../assets/vendor/now-ui-kit/assets/css/now-ui-kit.min.css"> -->
    <link rel="stylesheet" href="../assets/vendor/animate.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Quicksand" rel="stylesheet">

    <!-- Daterange Picker -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker.css" />
    <!-- Jquery SmartWizard -->
    <link rel="stylesheet" type="text/css" href="../node/node_modules/smartwizard/dist/css/smart_wizard.css">
    <link rel="stylesheet" type="text/css" href="../node/node_modules/smartwizard/dist/css/smart_wizard_theme_dots.css">
    
    <!--custom css  -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="stylesheet" href="../assets/css/carousel.css"> -->
    <link rel="stylesheet" href="../assets/css/rating.css">
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <?php
    
    if(isset($_SESSION["account_type"])) {
        echo '<link rel="stylesheet" href="../assets/css/dashboard.css">';
    }

    ?>
    <!-- JQUERY-MIN -->
    <!-- <script src="../assets/vendor/jquery.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- moment.js -->
    <script src="../assets/vendor/moment.js"></script>
    <!-- daterangepicker.js -->
    <script src="../assets/vendor/daterangepicker.js"></script>
    
</head>
<body class="animated fadeIn">
    <div id="load_screen">
        <div id="loading" class="animated infinite fadeIn">
            <img src="../assets/images/amanentez-front.jpg" alt="Amanentez Background Picture" class="loading-img fadeIn">
            <div id="loading-progress">
                <div id="loading-bar">
                </div>
            </div>
        </div>
    </div>