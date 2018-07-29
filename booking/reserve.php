<?php

session_start();
include('../partials/header.php');
include('../assets/config/connection.php');

$db = db_connection();

?>
    <?php

    if (isset($_SESSION['account_type']) && ($_SESSION['account_type'] == 'Administrator')) {
        include('../partials/admin_topnav.php');
    } else if(isset($_SESSION['account_type']) && ($_SESSION['account_type'] == 'Front Desk')) {
        include('../partials/frontdesk_dashboard.php');
    } else {
        include('../partials/navbar.php');
    }
    
    // include('../partials/navbar.php');
    ?>

    <div class="container">
        <h1 class="text-center">RESERVATION</h1>
        <?php
        
        include('../partials/reserve_form.php');
        
        ?>
    </div> <!-- ./container -->

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    
    </script>
<?

include('../modal/term.php');
include('../partials/scripts.php');
include('../partials/footer.php');

?>