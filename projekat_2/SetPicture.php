 <?php
   // check if an image file was uploaded
   if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      $name = $_FILES['image']['name'];

      $data = file_get_contents($_FILES['image']['tmp_name']);

      // connect to the database
      $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $datab = "projekat_2";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $datab);
        
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $query = "INSERT INTO slika (Name,Datum,User_ID,Picture) Values ('bruh',NOW(),1,$data)";
        $result = mysqli_query($conn,$query);

    }
    //header("location:javascript://history.go(-1)"); 
?>


