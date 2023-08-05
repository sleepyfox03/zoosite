<?php
include "header.php";
$not_match=false;
if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    include "../Database/db_con.php";
    $uname=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $email=$_POST["email"];
    $role=$_POST["role"];
    $number=$_POST["number"];

    $sql="SELECT * FROM user WHERE email='$email'";
    $result= mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result); 
        


    if(mysqli_num_rows($result)>0){
    echo "<script type='text/javascript'>alert('Email already exists');</script>";
    }
    else{
        if($password != $cpassword) {
            $not_match = "true"   ;   
        }
        else{
        $sql=" INSERT INTO user(uname,email,phn_no,role,pass) VALUES ('$uname','$email','$number','$role','$password')";
        mysqli_query($conn,$sql);
        echo "
        <script type='text/javascript'>alert('Account has been added');</script>";
        }
    }
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
    
        
            <h1 style="color: #CD833a">Register</h1>
        </div class="form">
         <form method=post action="register.php" class="form">   
            <div class="row">
                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                </div>

                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                        <label>Phone no</label>
                        <input type="text" class="form-control" name="number">
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                         <label>Role</label>
                                <select class="form-control" name="role" >
                                    <option value="User">User</option>
                                    <!-- <option value="Admin">Admin</option> -->
                                    <option value="Manager">Manager</option>
                                    <option value="Employee">Employee/Staff</option>
                                   
                                </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>    
                <div class="col-md-6 col-lg-8">
                    <div class="form-group">
                        <label> Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword">            
                        <?php
                            if($not_match) {
                                                echo  "<div>Password do not match</div>";
                                             }
                        ?>
                    </div>
                </div> 
                <div class="sp col-md-6 col-lg-8">   
                    <input type="submit" class="btn"value="Register">
                </div>
            </div>   

        </form>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="" async defer></script>
    </body>
</html>