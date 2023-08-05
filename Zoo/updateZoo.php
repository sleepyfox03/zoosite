<?php 
include "../Database/db_con.php";
$zoo_name = $_POST['zoo_name'];
$state = $_POST['state'];
$city=$_POST['city'];
$area=$_POST['area'];
$id = $_POST['id'];

            $sql = "Update zoo set zoo_name='$zoo_name' , state='$state', city='$city', area='$area' where zoo_id='$id'";
            $result = mysqli_query($conn,$sql);

                if($result) 
                    { 
                    echo "Data updated successfully";
                    }
                else 
                    { 
                    echo "Error in updating the data";
                    }
        
?>