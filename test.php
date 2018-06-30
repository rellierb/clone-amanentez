<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    
</head>
<body>
    
    
    
    
    
    <script>
        var myRooms = "";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                // myRooms = JSON.parse(this.responseText);
                console.log(this.responseText);
            }
        };
        xmlhttp.open("GET", "rooms/list_room.php", true);
        xmlhttp.send();
    </script>

</body>
</html>