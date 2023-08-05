<?php
include "../Database/db_con2.php";
include "../Database/db_con.php";
include "../header_log.php";
if(!isset($_SESSION['user']))
{
    header("Location:../register.php");
}
$sql =" SELECT a.animals_id,a.animals_name,a.scientific_name,a.type,a.category,z.zoo_id,z.zoo_name,z.state,z.city
        FROM animals as a
        JOIN animal_zoo_map as az
        ON a.animals_id=az.animals_id
        JOIN zoo AS z
        ON z.zoo_id=az.zoo_id
        WHERE a.activity=1";

$result = $mysqli->query($sql);
$mysqli->close();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['animals_id'])){
     echo "<script>alert('Deleted Data');</script>";
        $animals_id1=$_GET['animals_id'];
        
        $sql="UPDATE animals SET activity= 0 WHERE animals_id='$animals_id1'";

        $result=mysqli_query($conn,$sql);
        if($result) { 
            echo "<script>window.location.replace('view_animals.php');</script>";
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
    <div><h1>Animals</h1>
       
    </div>
    <div>
        <!-- modal -->
     <!-- Button trigger modal -->
<button type="button" class="btn float-right mr-5" data-toggle="modal" data-target="#addanimals">
  Add Animals
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="addanimals" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Animals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body center">
    <div class="form">
         <form method='post' action="" class="form" name="insertanimals">   
            <div class="row">
                <div>
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" name="animals_name" id="animals_name">
                    </div>
                </div>

                <div >
                    <div class="form-group">
                        <label>Scientific Name</label>
                        <input type="text" class="form-control" name="scientific_name" id="scientific_name">
                    </div>
                </div>
                <div >
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" id="type">
                    </div>
                </div>
                <div >
                    <div class="form-group">
                        <label> Category</label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>
                </div>    
                <div >
                    <div class="form-group">
                        <label> Zoo Name</label>
                        <select class="form-control" name="zoo" id="zoo">
                        <?php 
                        $query2 = "SELECT zoo_id,zoo_name FROM zoo";
                                $sql2 = $conn->query($query2);
                                while ($row2 = mysqli_fetch_array($sql2)) {
                                echo "<option value=\"{$row2['zoo_id']}\">" . $row2['zoo_name'] . "</option>";
                                }
                                ?>    
                                   
                                </select>
                    </div>
                </div>   
            </div>   

        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn " data-dismiss="modal">Close</button>
        <button onclick="addanimals()" data-dismiss="modal" type="submit" class="btn ">Add</button>
       
      
      </div>
    </div>
  </div>
</div>
    
    <a href=""></a>
       <div class="container">

        <table class="table table-bordered table-light table-sm">
            <tr><th>Animals ID</th>
                <th>Name</th>
                <th>Scientific Name</th>
                <th>Type</th>
                <th>Category</th>
                <th>Zoo Name</th>
                <th>State</th>
                <th>City</th>
                <th>Action</th>
                
            </tr>
          
            <?php
             
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr id="row<?= $rows['animals_id'] ?>">
                <td><?php echo $rows['animals_id'];?></td>
                <td><?php echo $rows['animals_name'];?></td>
                <td><?php echo $rows['scientific_name'];?></td>
                <td><?php echo $rows['type'];?></td>
                <td><?php echo $rows['category'];?></td>
                <td>
                    <select class="form-control" name="zoo" id="zooOption<?= $rows['animals_id'];?>" disabled>
                        <option id="q" value="<?php echo $rows['zoo_id'];?>"> <?php echo $rows['zoo_name'];?>  </option> 
                        <?php 
                        $query2 = "SELECT zoo_id,zoo_name FROM zoo";
                                $sql2 = $conn->query($query2);
                                while ($row2 = mysqli_fetch_array($sql2)) {
                                if($row2['zoo_id'] != $rows['zoo_id']) {
                                    echo "<option value=\"{$row2['zoo_id']}\">" . $row2['zoo_name'] . "</option>";
                                }}
                                ?>    
                    </select>
             
                </td>
                <td><?php echo $rows['state'];?></td>
                <td><?php echo $rows['city'];?></td>

                <td>
                    <button onclick="updateanimalsData(this.id)" id="update<?= $rows['animals_id'] ?>" class="btn btn-outline-warning">Edit</button>
                   
                     <a href="view_animals.php?animals_id=<?php echo $rows['animals_id'];?>" class="btn btn-outline-warning">Delete</a></td>
                   
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