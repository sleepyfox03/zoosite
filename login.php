<?php
include "header.php";

if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    include "Database/db_con.php";
    $pass=$_POST["password"];
    $email=$_POST["email"];
    $sql="SELECT email,pass,role FROM user where email='$email' && pass='$pass'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {  
         include "Database/db_con.php";
        $query = "SELECT role as role1 FROM user where email='$email'";
        $run = mysqli_query($conn,$query);
        $data=mysqli_fetch_assoc($run);
        $role=$data['role1'];
        session_start();
        $_SESSION["user"]=$email;
        $_SESSION["role"]=$role;

        echo "<script>alert('Login Successful');</script>";   
        header("Location:dashboard.php");
    }
    else{echo "<script>alert('Login Failed');</script>";  }
    }
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
    <body background="images/bg.jpeg">

     <div class="container form_heading">
        <div>
    
            <h1 style="color: #CD833a">Login</h1>
        </div class="form">
         <form method=post action="login.php" class="form">   
            <div class="row">
                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                </div>


                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>    
                
                <div class="sp col-md-6 col-lg-8">   
                    <input type="submit" class="btn"value="Login">
                </div>
            </div>   

        </form>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="" async defer></script>
    </body>
</html>