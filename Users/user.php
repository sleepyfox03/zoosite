<?php
include "../Database/db_con2.php";
include "../Database/db_con.php";
include "../header_log.php";
if(!isset($_SESSION['user']))
{
    header("Location:register.php");
}

$sql = " SELECT * FROM user where activity=1";
$result = $mysqli->query($sql);
$mysqli->close();
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['user_id'])){
     echo "<script>alert('Deleted Data');</script>";
        $user_id1=$_GET['user_id'];
        
        $sql="UPDATE user set activity=0 WHERE user_id='$user_id";
        $result=mysqli_query($conn,$sql);
        if($result) { 
            echo "<script>window.location.replace('user.php');</script>";
                }
        else {
            echo "error ";
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
        <link rel="stylesheet" href="../CSS/stylesheet.css">
        <script src="../Javascript/index.js"></script>
    </head>
    <body background="images/bg.jpeg">
    


    <h1>User</h1>
       <div class="container">

        <table class="table table-bordered table-light table-sm">
            <tr><th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Role</th>
                <th>action</th>
                
            </tr>
          
            <?php
             
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr id="row<?= $rows['user_id'] ?>">
                <td><?php echo $rows['user_id'];?></td>
                <td><?php echo $rows['uname'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phn_no'];?></td>
                <td><?php echo $rows['role'];?></td>
                <td>
                    <button onclick="updateData(this.id)" id="update<?= $rows['user_id'] ?>" class="btn btn-outline-warning">Edit</button>
                   
                     <a href="user.php?user_id=<?php echo $rows['user_id'];?>" class="btn btn-outline-warning">Delete</a></td>
                   
            </tr>
            <?php
                }
            ?>
            
        </table>
            </div>
       

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="" async defer></script>
    </body>
</html>