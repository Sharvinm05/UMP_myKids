<?php
include("db-con.php");
include('header.php');

?>
<?php
$sql = "SELECT COUNT(ParentId) FROM parent ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$parent = $row[0];


$sql = "SELECT COUNT(StaffId) FROM staff where StaffType Like 'Teacher'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$teacher = $row[0];

$sql = "SELECT COUNT(StaffId) FROM staff where StaffType Like 'Owner'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$owner = $row[0];

$total = $parent + $teacher + $owner;

$dataPoints = array(
  array("y" => $teacher, "label" => "Teachers"),
  array("y" => $owner, "label" => "Owners"),
  array("y" => $parent, "label" => "Parents"),

);

?>

<!-- End Navbar -->

<!-- Contents Starts-->

<div class="container-fluid py-4">
  <div><strong> TOTAL USERS <?php echo $total ?></div>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>

  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


</div>

<!-- Contents End-->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/fullcalendar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
<?php
include('footer.php');
?>
<script>
  function naviHead() {
    //Header name
    document.getElementById("head-nav").style.display = "none";
    document.getElementById("page-head").innerHTML = "Dashboard";
    document.getElementById("mod1").href = "./adminmain.php";
    //Side Navigation Bar
    document.getElementById("mod1").className = "nav-link  ";
    document.getElementById("mod4").className += "active";

    document.getElementById("name-2").innerHTML = "Create New Uer";
    document.getElementById("mod2").href = "./create_user.php";

    document.getElementById("name-3").innerHTML = "View All Users";
    document.getElementById("mod3").href = "./user_list.php";

    document.getElementById("name-4").innerHTML = "Dashboard";
    document.getElementById("mod4").href = "./user_dashboard.php";


    document.getElementById("nav-item5").style.display = "None"; 
    document.getElementById("nav-item6").style.display = "None"; 

    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      exportEnabled: true,
      theme: "light1", // "light1", "light2", "dark1", "dark2"
      title: {
        text: "All Users"
      },
      data: [{
        type: "column", //change type to bar, line, area, pie, etc  
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();
  }
  window.onload = naviHead;
</script>