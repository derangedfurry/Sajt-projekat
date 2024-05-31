<?php
error_reporting(0);
 #file_get_contents ["tmp_name"]
$msg = "";
 

    $name = $_POST["text"];
    $image = $_FILES['image']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image));
    echo $name;
    echo $data;
    
    $db = mysqli_connect("localhost", "root", "", "projekat_2");
    if ($db->connect_errno) {
        echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
    }
    $ID = 0;
    $sql = "SELECT max(ID) as max from slika";
    $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)) {
                $ID = $row["max"];
        }
        $ID++;

        try {
            $query = "INSERT INTO slika(Name,Datum,User_ID,Picture) VALUES('$name','NOW()',1,'$imgContent')";
            $result = mysqli_query($db,$query); 
        } catch (\Throwable $th) {
           echo $th;
        }
    
    include 'GetPicture.php';
    
    header("location:javascript://history.go(-1)"); 

?>