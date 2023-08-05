<?php 
include "../Database/db_con.php";
$animals_name = $_POST['animals_name'];
$scientific_name = $_POST['scientific_name'];
$type=$_POST['type'];
$category=$_POST['category'];
$zooid=$_POST['a'];
$id = $_POST['id'];

            $sql = "UPDATE animals set animals_name='$animals_name' , scientific_name='$scientific_name', type='$type', category='$category' where animals_id='$id'";
            $result = mysqli_query($conn,$sql);
            $sql2=" UPDATE a_z_map set zoo_id='$zooid' where animals_id='$id'";
            $result = mysqli_query($conn,$sql2);
                if($result) 
                    { 
                    echo "Data updated successfully";
                    }
                else 
                    { 
                    echo "Error in updating the data";
                    }
        
?>