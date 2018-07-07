<?php

  include('partials/header.php');
  include('assets/config/connection.php');

?>

  <?php
  
  $db = db_connection();
  
  $rooms = array(
    2 => 2,
    3 => 2,
    4 => 3
  );

  foreach($rooms as $k => $v) {
    for($i = 1; $i <= $v; $i++) {
      // $db->query("INSERT INTO booking_rooms(reservation_id, room_id) VALUES(1, $k)");    
    }
  }



  
  
  
  ?>
    
</body>
</html>