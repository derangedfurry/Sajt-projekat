

<html>
    <head>
        <link rel="stylesheet" href="PHP.css">
        <title>Paint</title>
        <script src="Functions.js"></script>
    </head>

    <body class="main primary">

    <?php
    $servername = "localhost:3306";
    $Username = "root";
    $password = "";
    $datab = "projekat_2";
    $user = $_POST["Username"];
    $signeduser = null;
    // Create connection
    $conn = new mysqli($servername, $Username, $password, $datab);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    //echo  $user;
    $query = "SELECT Username from user";
    $result = mysqli_query($conn,$query);
    
    while ($row = mysqli_fetch_array($result)) {
        //echo $row["Username"];
        if($user == $row["Username"])
        {
            $signeduser = $row;
        }

    }
    if(!$signeduser)
    {     
        header("location:javascript://history.go(-1)"); 
    }
    
    ?>
    
        <header class="secondary PHP">
            <form id="input">
            welcome <?php echo $user ?>!
                
            </form>
            <script>

            GetUser("<?php echo $user ?>");

            </script>
            <form action="signout.php">
            <input style="position: absolute;" type="submit" value="Sign out" id="signout"/>
            </form>
        </header>

        

        <main class="primary">


        <script>
            GetPicture();
            </script>
            <aside class="secondary">
                <form style="display: flex; flex-direction: column; align-items: center; padding-right: 3%;
                    margin-right: 2%;
                    position: relative;

                    width: 100%;
                    height:100%;
    
                    font-size: 35px;" method="post" action="AddPicture.php" enctype="multipart/form-data">

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
    

    $sql = "SELECT UserPic FROM user where ID=1";
    
    $Pic;
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
       
        $Pic = $row["UserPic"];
    }
        $image = base64_encode($Pic);
        ?>
                
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $image ?>" style="widht : 100px ; height:100px ; margin-top : 10%"/>
                    <div style="margin-top: 5%; "><?php echo $user ?></div>
                    
                    <input type="file" name="image" accept=".jpg,.jpeg,.png" style="width:200px ; height: 50px; margin-top:20%; display:block;"/>


                        <div style="font-size: 25px; align-self : start; overflow : hidden;">
                            <label>name:</label><input id="PictureName" type="text" name="text"/>
                        </div>
                    <input id="ConfirmInput" type="submit" value="Confirm" style="margin-top : 10%; height : 30px"/>
                </form>
            </aside>
            
            <section id="main">
           
            </section>
            
            
        </main>

    </body>
</html>