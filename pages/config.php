<?php
include("db-con.php");

    $ChildName = $_POST['ChildName'];
    $ChildAge = $_POST['ChildAge'];
    //$gender = $_POST['gender'];
    $ChildStatus = $_POST['ChildStatus'];
    //$email = $_POST['email'];
    $ChildMedical =$_POST['ChildMedical'];
    $gender =$_POST['gender'];
    //$password = $_POST['password'];
    //$number = $_POST['number'];

    //database connection
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }else{
        $stmt =$conn->prepare("insert into child(ChildName, ChildAge, ChildStatus, ChildMedical, gender) values (?,?,?,?,?)");
        $stmt->bind_param("sisss", $ChildName,$ChildAge,$ChildStatus,$ChildMedical,$gender);
        $stmt->execute();
        //echo "registration successfull";
        $stmt->close();
        $conn->close();
        echo'<script>alert("Activity updated successfully");
        window.location.href = "displaymainM2.php"; </script>';
    }


?>

