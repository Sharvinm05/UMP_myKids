<?php
include("db-con.php");
?>

<?php
include('header.php');
//$_SESSION['userID'] = $_GET['id'];
$sid = $_SESSION['id'];
// echo "<script> let id = "+$sid+"</script>";
?>
<!-- Contents Starts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid py-4">
  <h2>My Salary Status</h2>

  <div class="row">
    <div class="col-md-7 mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">My Details</h6>
        </div>
        <?php
        $query = "SELECT * FROM viewstaffsdetails WHERE StaffId = '$sid' ORDER BY SalaryDate DESC";
        $result = mysqli_query($conn, $query) or die("Could not execute query");
        $r = mysqli_fetch_assoc($result);


        
        ?>
        <div class="card-body pt-4 p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm"><?php echo $r['StaffName']; ?></h6>
                <span class="mb-2 text-xs">Username: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $r['StaffUsername']; ?></span></span>
                <span class="mb-2 text-xs">Position: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $r['StaffType']; ?></span></span>
                <span class="text-xs">Registered Date: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo date('l, jS \of F Y', strtotime($r['StaffRegDate'])); ?></span></span>
                <!-- <span class="text-xs">Salary Payment status: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $r['StaffRegDate']; ?></span></span> -->
              </div>
              
            </li>

            <div class="d-flex flex-column">
              <h6 class="mb-3 text-sm">Salary Payment Details:</h6>
            </div>

            <?php
            
            if (isset($r['SalaryDate'])) {
              foreach ($result as $p) {
               $slryid= $p['SalaryId'];
                $strSQL = "SELECT * FROM qrcode WHERE Salaryid = ' $slryid'";
                $rs = mysqli_query($conn, $strSQL);
                $r = mysqli_fetch_assoc($rs);
            ?>
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                      <span class="mb-2 text-xs">Paid on: <span class="text-dark font-weight-bold ms-sm-2"><?php echo date('l, jS \of F Y', strtotime($p['SalaryDate'])); ?></span></span>
                      <span class="mb-2 text-xs">Paid by: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $p['Paidby']; ?></span></span>
                      <span class="text-xs">Total Paid Amount: RM<span class="text-dark ms-sm-2 font-weight-bold"><?php echo $p['SalaryAmount']; ?></span></span>
                    </div>
                    <div class="d-flex align-items-center text-sm">
                      <a class="btn btn-link text-sm mb-0 px-0 ms-4" style="color: blue;" target="_blank" href="../pages/download.php?id=<?php echo $p['SalaryId']; ?>"><i class="fas fa-file-pdf text me-2" aria-hidden="true"></i> View</a>
                      
                      <img src="<?php echo $r['qrimg']; ?>" style="margin-left:40px; width:150px; height:150px;"><br>
                    </div>
                
                  </li>
                </ul>
                <br>
        
        <?php

              }
            } else {

              echo "No Salary Payment Recorded";
            } ?>
         </ul>
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
        document.getElementById("page-head").innerHTML = "View Salary Details";
        document.getElementById("mod1").href = "./staffmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        //document.getElementById("mod1").className += "active";   

        document.getElementById("name-2").innerHTML = "????"; 
        document.getElementById("mod2").href = "";

        //document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod5").className += "active";

        document.getElementById("name-2").innerHTML = "Add Activity";  
        document.getElementById("mod2").href = "./add.php";

        document.getElementById("name-3").innerHTML = "Display Activity"; 
        document.getElementById("mod3").href = "./display_page.php";

        
        document.getElementById("name-4").innerHTML = "Chart";  
        document.getElementById("mod4").href = "./chart.php";

        document.getElementById("name-5").innerHTML = "View Salary Details";  
        document.getElementById("mod5").href = "./teacherview.php";

         
        document.getElementById("nav-item6").style.display = "None";  
        
        //document.getElementById("user").innerHTML = "Nur Aina binti Amirudin"; 
    }
  window.onload = naviHead;




  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myDIV tbody tr*").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>