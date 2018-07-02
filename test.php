<?php
    include('partials/header.php');
?>

    
    <?php
    
    $a = ["a", "b", "c", "a", "b"];

    function array_has_dupes($array) {
        return count($array) !== count(array_unique($array));
    }

    echo array_has_dupes($a);
    
    ?>
    
</body>
</html>