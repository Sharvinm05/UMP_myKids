<?php
include("db-con.php");
include('header.php');
?>
<!-- Contents Starts-->

<div class="container-fluid py-4">
  <h3></h3>

</div>
<!DOCTYPE html>
<html lang="en">

<head>

  <div class="container-fluid py-4" style="margin-left:10px; width:1100px;">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Kid's detail</h6>
          </div>
          <div>
            <form action="config.php" method="post">
              <div class="form-group">
                <label for="first-name">Child Name *</label>
                <input type="text" class="form-control" id="ChildName" name="ChildName" required />
              </div>
              <div class="form-group">
                <label for="last-name">Child Age *</label>
                <input type="text" class="form-control" id="ChildAge" name="ChildAge" required />
              </div>
              <div class="form-group">
                <label for="last-name">Child Status *</label>
                <input type="text" class="form-control" id="ChildStatus" name="ChildStatus" required />
              </div>
              <div class="form-group">
                <label for="last-name">Child Medical *</label>
                <input type="text" class="form-control" id="ChildMedical" name="ChildMedical" required />
              </div>
              <div class="form-group">
                <label for="email">Gender *</label>
                <div>
                  <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" id="male" required>Male</label>
                  <label for="female" class="radio-inline"><input type="radio" name="gender" value="f" id="female" required>Female</label>
                </div>
              </div>
              <!-- <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email"/>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password"/>
                </div>
                <div class="form-group">
                  <label for="number">Phone number</label>
                  <input type="number" class="form-control" id="number" name="number"/>
                </div> -->
              <input type="submit" class="btn btn-primary">
            </form>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <head>
    <?php
    include('footer.php');
    ?>

    <script>
      function naviHead() {
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Add New Child Details";
        document.getElementById("mod1").href = "./parentmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod2").className += "active";   

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