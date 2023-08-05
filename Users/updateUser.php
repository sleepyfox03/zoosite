<?php 
include "../Database/db_con.php";
$uname = $_POST['uname'];
$email = $_POST['email'];
$phn_no=$_POST['phn_no'];
$role=$_POST['role'];
$id = $_POST['id'];

            $sql = "update user set uname='$uname' , email='$email', phn_no='$phn_no', role='$role' where user_id='$id'";
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
<!-- UPDATE `user` SET `email`='rahul@gmail.com' WHERE `user_id`=22 && email NOT IN (SELECT email from user2); -->