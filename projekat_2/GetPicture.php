<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $datab = "projekat_2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $datab);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    

    $sql = "SELECT max(id) as max FROM slika";
    

    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_array($result)) {
       
        $ID = $row["max"];
    }

    for ($ID; $ID >= 0; $ID--) {

        $sql = "SELECT Picture from slika where ID = $ID";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($result)) {
            $data =  $row["Picture"];
            $image = base64_encode($data);
            
            echo '<img src="data:image/jpg;charset=utf8;base64,'.$image.'" style="width : 23%; height: 75%; margin-left : 1%; margin-top: 1%; border : 2px solid black; position:relative;"/>';
        }
    

        
      }


    


?>