<?php
   header('Access-Control-Allow-Origin: *');

   $conn = mysqli_connect('localhost:8889','root','root','iot_database');
   $bicycle_id = $_POST['bicycle_id'];
   $bicycle_status = $_POST['bicycle_status'];
   $time = $_POST['time'];
    $username = $_POST['user_id'];

    if(mysqli_connect_error()){
       echo mysqli_connect_error();
       exit();
   }
   else{
       
       $sql = "UPDATE `bicycle_data` SET `status`='$bicycle_status',`time`='$time' ,`username`='$username' WHERE `bicycle_ID`='$bicycle_id';";
       $res = mysqli_query($conn, $sql);
       
       if($res){
           echo "Success!";
       }
       else{
           echo "Error!";
       }
       $conn->close();
   }
    
    
?>

