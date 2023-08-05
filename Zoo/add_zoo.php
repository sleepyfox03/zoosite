<?php 
include "../Database/db_con.php";
$zoo_name = $_POST['zoo_name'];
$state = $_POST['state'];
$city=$_POST['city'];
$area=$_POST['area'];
  

            $sql = "INSERT into zoo(zoo_name,state,city,area,activity) values( '$zoo_name','$state','$city','$area',1 )";
            $result = mysqli_query($conn,$sql);
   
                if($result) 
                    { 
                        echo "<script>alert('data added successfully')</script>";
                   
                    }
                else 
                    { 
                    echo "Error in inserting the data";
                    }
        
?>