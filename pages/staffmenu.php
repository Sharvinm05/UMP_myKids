<?php
include('header.php');
?>
<!-- Contents Starts-->

<head>
  <link rel="stylesheet" href="../assets/css/staff.css">
</head>
<div class="container-fluid py-4">
  <h2>UMP myKids Staff Salary Management Menu</h2>
  <div class="container h-100">
    <div class="row align-middle">
      
      <div class="col-md-6 col-lg-4 column">
        <div class="card gr-2">
          <div class="txt">
            <h1>Manage </br>
              Staff Salary details</h1>
            <p>Manage Existing Staff Salary Details </p>
          </div>
          <a href="../pages/viewstaff.php">Click here</a>
          <div class="ico-card">
            <i class="fa fa-codepen"></i>
          </div>
        </div>
      </div>
      <br>
      <div class="col-md-6 col-lg-4 column">
        <div class="card gr-3">
          <div class="txt">
            <h1>staff salary management </br>report</h1>
            <p>UMP myKids Staff Salary Report</p>
          </div>
          <a href="#">Click here </a>
          <div class="ico-card">
            <i class="fa fa-empire"></i>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php
  include('footer.php');
  ?>
</div>

<!-- Contents End-->

<script>
  function naviHead() {
    //Header name
    document.getElementById("head-direct").innerHTML = "Staff Main Menu";
    document.getElementById("head-nav").style.display = "none";
    document.getElementById("page-head").innerHTML = "UMP myKids Staff Salary Management Menu";
    //Side Navigation Bar
    document.getElementById("mod1").className = "nav-link  ";
    document.getElementById("mod5").className += "active";
    document.getElementById("name-5").innerHTML = "Staff Main Menu";
  }
  window.onload = naviHead;
</script>