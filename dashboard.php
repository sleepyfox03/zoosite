<?php
include "Database/db_con.php";
include "header_log.php";
include "session.php";
?>
<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/stylesheet.css">
       
    </head>
    <body >

    
     <div >
        <div >
            <h1 style="color: #CD833a">Dashboard</h1>
        </div >
        <div class="container">
            <div class="row">
                <div class="col-lg-3 p-5 m-2 bg-white border">
                    <a href="Users/user.php">Users
                    </a>
                   
                   <?php
                //    include "db_con2.php";
                //    $stm =  $conn->query("SELECT COUNT('email') as temp FROM user");
                //    $userData = $stm->fetch_assoc();
                //    $c = $userData['temp'];
                //    echo $c
                    include "Database/db_con.php";
                    $query = "SELECT COUNT('email') as temp FROM user where activity=1";
                    $run = mysqli_query($conn,$query);
                    $data=mysqli_fetch_assoc($run);
                    $count=$data['temp'];
                    echo $count;
                    ?>
                </div>
                <div class="col-lg-3 p-5 m-2 bg-white border">
                <a href="Animals/view_animals.php">Animals</a>
                <?php include "Database/db_con.php";
                    $query = "SELECT COUNT('animals_id') as temp FROM animals where activity=1";
                    $run = mysqli_query($conn,$query);
                    $data=mysqli_fetch_assoc($run);
                    $count=$data['temp'];
                    echo $count;
                    ?>
                </div>
                <div class="col-lg-3 p-5 m-2 bg-white border">
                <a href="Zoo/view_zoo.php">Zoos</a>
                <?php include "Database/db_con.php";
                    $query = "SELECT COUNT('zoo_id') as temp FROM zoo where activity=1";
                    $run = mysqli_query($conn,$query);
                    $data=mysqli_fetch_assoc($run);
                    $count=$data['temp'];
                    echo $count;
                    ?>
                </div>
            </div>
                    

    </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="" async defer></script>
    </body>
</html>