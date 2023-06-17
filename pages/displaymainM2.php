<?php
include("db-con.php");
include('header.php');
?>

<!-- Contents Starts-->

<!DOCTYPE html>
<html>
    <title>
        <head>Fetch data</title>
    </title>

<?php


  //Then, insert query.
  $sql = "SELECT * FROM child ORDER BY gender";

  $result = $conn->query($sql);

  $i=0;
?>


<!DOCTYPE html>
<html lang="en">
<style>
table{
  border: 2px solid green;
  margin-bottom: 10px;
}

td, th{
  border: 2px solid black;
  padding: 10px 30px 10px 10px;
}
</style>
<body>
  <center>
    <p><b>View Child Record</b></p>
    <table>
      <tr>
        <th>No.</th>
        <th>Child Name</th>
        <th>Child Age</th>
        <th>Child Medical</th>
        <th>Gender</th>
      </tr>
      <?php
        while($row = mysqli_fetch_array($result)) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $row['ChildName'];?></td>
        <td><?php echo $row['ChildAge'];?></td>
        <td><?php echo $row['ChildMedical'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><a href="configDelete.php?id=<?php echo $row['ChildId'];?>"><button>Delete</button></a></td>
        <td><a href="editM2.php?id=<?php echo $row['ChildId'];?>"><button>Edit</button></a></td>
      </tr>
      <?php

        }
      ?>
    </table>
    <br><br><br><a href="mainM2.php"><button>Add</button></a>
  </center>

  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
</body>
</html>
<!-- Contents End-->
<?php
include('footer.php');
?>
<script>
    function naviHead() {
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Display Children Details";
        document.getElementById("mod1").href = "./parentmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod3").className += "active";   

        document.getElementById("name-2").innerHTML = "Add New Child Details"; 
        document.getElementById("mod2").href = "./mainM2.php";

        document.getElementById("name-3").innerHTML = "Display Children Details";  
        document.getElementById("mod3").href = "./displaymainM2.php";

        document.getElementById("name-4").innerHTML = "Payment Fee";  
        document.getElementById("mod4").href = "./display_payment_fee.php";
        
        //document.getElementById("name-4").innerHTML = "????"; 

        //document.getElementById("nav-item4").style.display = "None"; 
        document.getElementById("nav-item5").style.display = "None"; 
        document.getElementById("nav-item6").style.display = "None"; 
}
window.onload = naviHead;
    
</script>