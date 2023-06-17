<?php
  $id=$_GET['id'];

  //First, connect to the MySQL server.
  $link = mysqli_connect("localhost", "root", "", "mykidsdb");

  if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  //Then, insert query.
  $sql = "DELETE FROM child WHERE ChildId='$id'";

  if (mysqli_query($link, $sql)) {
   
  } else {
    echo 'Error deleting data: '.mysqli_connect_error()."\n";
  }

  //And finally we close the connection to the MySQL server
  mysqli_close($link);

  header("Refresh:0; url=displaymainM2.php");
?>