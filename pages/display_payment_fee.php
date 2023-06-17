<?php
include("db-con.php");
include("header.php");

if (isset($_POST['submit'])) {

  $type = $_POST['type'];
  $username = $_POST['username'];
  $userid = $_POST['userid'];
  $age = $_POST['age'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];

  if ($type == 1) {
    $sql = "INSERT INTO staff (StaffName, StaffId , StaffAge,StaffPhnum,StaffAddress,StaffPass) VALUES ('$username', '$userid', '$age', '$phone', '$address', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo '<script>alert("User added successfully");
             window.location.href = "user_list.php";
            </script>';
    } else {
      echo '<script>alert("Something went wrong!")</script>';
    }
  }

  if ($type == 2) {
    $sql = "INSERT INTO parent (ParentName,ParentId, ParentAge, ParentPhnum,ParentAddress,ParentPass) VALUES ('$username', '$userid', '$age', '$phone', '$address', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo '<script>alert("User added successfully");
             window.location.href = "user_list.php";</script>';
    } else {
      echo '<script>alert("Something went wrong!")</script>';
    }
  }
} //end of post



?>




<!-- Contents Starts-->

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">

              <tbody>
                <tr>
                  <td>
                    <div class="card-body pt-4 p-3">
                      <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <h1 class="mb-3 text-sm">Parent Details</h1>
                            <span class="mb-2 text-xs">Parents Name: <span class="text-dark font-weight-bold ms-sm-2">NURUL NABIELA</span></span>
                            <span class="mb-2 text-xs">Kid Name: <span class="text-dark ms-sm-2 font-weight-bold">FATIN NADZIRAH</span></span>

                            <div class="col-6 text-end">
                              <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Kid</a>
                            </div>

                          </div>
                        </li>
                </tr>
                <tr>
                  <td>
                    <div class="card-body pt-4 p-3">
                      <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <h1 class="mb-3 text-sm">Summary</h1>
                            <span class="mb-2 text-xs">Total Payment Fee: <span class="text-dark font-weight-bold ms-sm-2">RM400</span></span>
                            <span class="mb-2 text-xs">Balance: <span class="text-dark ms-sm-2 font-weight-bold">-</span></span>
                            <span class="mb-2 text-xs">Status Payment: <span class="text-dark ms-sm-2 font-weight-bold">PAID</span></span>
                            <span class="mb-2 text-xs"><i class="far fa-calendar-alt me-2"></i>Payment Date : <span class="text-dark ms-sm-2 font-weight-bold">26/1/22</span></span>
                            <span class="mb-2 text-xs">Note: <span class="text-dark ms-sm-2 font-weight-bold">-</span></span>
                          </div>
                        </li>
                </tr>

                <tr>
                  <td>
                    <div class="card-body pt-4 p-3">
                      <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <h1 class="mb-2 text-sm">Proceed To Payment</h1>
                            <span class="mb-2 text-xs"><i class="far fa-calendar-alt me-2"></i>Payment Date :
                              <div class="mb-2">
                                <input type="text" name=" " class="form-control" placeholder="" aria-label="" required>
                              </div>
                            </span>
                            <span class="mb-2 text-xs">Total Amount Pay: <div class="mb-3">
                                <input type="number" name=" " class="form-control" placeholder="" aria-label="" required>
                              </div>
                            </span>


                            <div action="upload.php" method="post" enctype="multipart/form-data">
                              <i class="fas fa-upload"></i>
                              Upload receipt
                              <input type="file" name="fileToUpload" id="fileToUpload">
                              <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                            </div>
                            <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Submit</button>
                          </div>
                        </li>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- Contents End-->
  <?php
  include('footer.php');
  ?>
  <script>
    function naviHead() {
      //Header name
      document.getElementById("head-nav").style.display = "none";
      document.getElementById("page-head").innerHTML = "Payment Fee";
      document.getElementById("mod1").href = "./parentmain.php";
      //Side Navigation Bar
      document.getElementById("mod1").className = "nav-link  ";
      document.getElementById("mod4").className += "active";

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