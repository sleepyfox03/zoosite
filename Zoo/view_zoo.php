<?php
include "../Database/db_con2.php";
include "../Database/db_con.php";
include "../header_log.php";
if(!isset($_SESSION['user']))
{
    header("Location:../register.php");
}
$sql = " SELECT * FROM zoo where activity=1";
$result = $mysqli->query($sql);

$mysqli->close();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['zoo_id'])){
     echo "<script>alert('Deleted Data');</script>";
        $zoo_id1=$_GET['zoo_id'];
        
        $sql="UPDATE zoo SET activity= 0 WHERE zoo_id='$zoo_id1'";

        $result=mysqli_query($conn,$sql);
        if($result) { 
            echo "<script>window.location.replace('view_zoo.php');</script>";
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../CSS/stylesheet.css">
        <script src="../Javascript/index.js"></script>
    </head>
    <body background="images/bg.jpeg">
        <div class="error">

        </div>
    <div><h1>Zoo</h1>
       
    </div>
    <div>
        <!-- modal -->
     <!-- Button trigger modal -->
<button type="button" class="btn float-right mr-5" data-toggle="modal" data-target="#addZoo">
  Add Zoo
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="addZoo" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Zoo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body center">
    <div class="form">
         <form method='post' action="" class="form" name="insertZoo">   
            <div class="row">
                <div>
                    <div class="form-group">
                        <label for="username">Zoo Name</label>
                        <input type="text" class="form-control" name="zoo_name" id="zoo_name">
                    </div>
                </div>

                <div >
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="state" id="state">
                    </div>
                </div>
                <div >
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                </div>
                <div >
                    <div class="form-group">
                        <label> Area (Sq. km)</label>
                        <input type="text" class="form-control" name="area" id="area">
                    </div>
                </div>    
            
            </div>   

        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn " data-dismiss="modal">Close</button>
        <button onclick="addzoo()" data-dismiss="modal" type="submit" class="btn ">Add</button>
       
      
      </div>
    </div>
  </div>
</div>
    
    <a href=""></a>
       <div class="container">

        <table class="table table-bordered table-light table-sm">
            <tr><th>Zoo ID</th>
                <th>Zoo Name</th>
                <th>State</th>
                <th>City</th>
                <th>Area (sq km)</th>
                <th>Action</th>
                
            </tr>
          
            <?php
             
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr id="row<?= $rows['zoo_id'] ?>">
                <td><?php echo $rows['zoo_id'];?></td>
                <td><?php echo $rows['zoo_name'];?></td>
                <td><?php echo $rows['state'];?></td>
                <td><?php echo $rows['city'];?></td>
                <td><?php echo $rows['area'];?></td>
                <td>
                    <button onclick="updateZooData(this.id)" id="update<?= $rows['zoo_id'] ?>" class="btn btn-outline-warning">Edit</button>
                   
                     <a href="view_zoo.php?zoo_id=<?php echo $rows['zoo_id'];?>" class="btn btn-outline-warning">Delete</a></td>
                   
            </tr>
            <?php
                }
            ?>
            
        </table>
            </div>
       <div id="error">
        
       </div>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="" async defer></script>
    </body>
</html>