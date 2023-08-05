<?php 
include "../Database/db_con.php";
$animals_name = $_POST['animals_name'];
$scientific_name = $_POST['scientific_name'];
$type=$_POST['type'];
$category=$_POST['category'];
$zoo=$_POST['zoo']; 

            $sql = "INSERT into animals(animals_name,scientific_name,type,category,activity) values( '$animals_name','$scientific_name','$type','$category',1 )";
            $result = mysqli_query($conn,$sql);
            $query = "SELECT MAX(animals_id) as temp FROM animals";
            $run = mysqli_query($conn,$query);
            $data=mysqli_fetch_assoc($run);
            $count=$data['temp'];
            $main = "INSERT into a_z_map(animals_id,zoo_id) values( '$count','$zoo')";
            $rq = mysqli_query($conn,$main);
            
                if($rq) 
                    { 
                        echo "<script>alert('data added successfully')</script>";
                   
                    }
                else 
                    { 
                    echo "Error in inserting the data";
                    }
        
?>