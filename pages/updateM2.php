<?php
include("db-con.php");
  $id=$_GET['id'];
  $ChildName = $_POST['ChildName'];
  $ChildAge = $_POST['ChildAge'];
  $ChildStatus = $_POST['ChildStatus'];
  $ChildMedical = $_POST['ChildMedical'];
  $gender = $_POST['gender'];


  // $genders="";

  // if(isset($_POST['gender'])){

  //   $gender=$_POST['gender'];

  //   foreach($gender as $g){
  //     $genders.= $g." ";
  //   }
  // }

  //First, connect to the MySQL server.
  

  //Then, insert query.
  $sql = "UPDATE child SET ChildName='$ChildName', ChildAge='$ChildAge', ChildStatus='$ChildStatus', ChildMedical='$ChildMedical', gender='$gender' WHERE ChildId='$id'";

  if (mysqli_query($conn, $sql)) {

  } else {
    echo 'Error updating database: '.mysqli_connect_error()."\n";
  }

  //And finally we close the connection to the MySQL server
  mysqli_close($conn);

  header("Refresh:0; url=displaymainM2.php");
?>
