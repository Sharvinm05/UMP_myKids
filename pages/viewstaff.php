<?php
include("db-con.php");
?>

<?php
include('header.php');
?>
<!-- Contents Starts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid py-4">
  <h2>UMP myKids Staff Details</h2>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Staffs table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="myDIV">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Position</th>
                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salary Amount (RM)</th> -->
                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Num</th> -->
                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th> -->
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Registered Date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salary Amount (RM)</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salary Status</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <script>
                  const notpaid = [];
                  const paid = [];

                </script>
                <?php
                $sql = "Select v.* FROM viewstaffsdetails v RIGHT JOIN (SELECT StaffId, MAX(SalaryDate) AS SalaryDate FROM viewstaffsdetails GROUP BY StaffId) 
                      sample ON v.staffid = sample.staffid AND (v.salarydate = sample.salarydate OR (v.salarydate IS NULL AND sample.salarydate IS NULL))";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) >= 1) {
                  foreach ($result as $r) {

                ?>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffId']; ?></span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <!-- <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div> -->
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $r['StaffName']; ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $r['StaffUsername']; ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $r['StaffAge']; ?></p>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffType']; ?></span>
                      </td>

                      <!-- <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $r['SalaryAmount']; ?></span>
                      </td> -->

                      <!-- <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffPhnum']; ?></span>
                      </td> -->
                      <!-- <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffAddress']; ?></span>
                      </td> -->
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffRegDate']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffSalary']; ?></span>
                      </td>
                      <?php

                      $todaydate = date("Y-m-d");
                      $end_date = strtotime($todaydate);
                      $start_date = strtotime($r['SalaryDate']);
                      $daysleft  = ($end_date - $start_date) / 60 / 60 / 24;
                      //echo  $daysleft;
                      if ($daysleft > 30) {
                        $salary_status = "Not Paid";
                      } else {
                        $salary_status = "Paid";
                      }
                      //badge badge-sm bg-gradient-secondary
                      //badge badge-sm bg-gradient-success
                      ?>


                      <td class="align-middle text-center text-sm">
                        <span class="<?php if ($salary_status == "Paid") {
                                        echo "badge badge-sm bg-gradient-success";
                                       
                                      } else {
                                        echo "badge badge-sm bg-gradient-secondary";
                                      } ?>"><?php echo  $salary_status; ?></span>
                      </td>

                     

                      <td class="align-middle">
                        <?php
                        if ($salary_status == 'Not Paid') {
                          echo '<script> notpaid.push("' . $r["StaffName"] . '" ); </script>';
                        ?>
                          <a href="../pages/addsalary.php?id=<?php echo $r['StaffId']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Make Payment
                          </a>
                        <?php
                        }else{
                          echo '<script> paid.push("' . $r["StaffName"] . '" ); </script>';
                        } ?>
                      </td>
                      <td class="align-middle">
                        <a href="../pages/viewpayment.php?id=<?php echo $r['StaffId']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                          View Payments
                        </a>
                      </td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-7">
    <div class="card z-index-2">
      <div class="card-header pb-0">
        <h6>Salary Payment Overview</h6>
        <p class="text-sm">
          <!-- <i class="fa fa-arrow-up text-success"></i> -->
          <!-- <span class="font-weight-bold">4% more</span> in 2021 -->
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="graphCanvas" class="chart-canvas" style="max-height: 400px;"></canvas>
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
  let ntpaidarrlgt = notpaid.length;
    let paidarrlgt = paid.length;
  function naviHead() {
    //Header name
      document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Manage Staff Salary";
        document.getElementById("mod1").href = "./ownermain.php";
        //Side Navigation Bar
         

        document.getElementById("name-2").innerHTML = "Payment Fee"; 
        document.getElementById("mod2").href = "./payment_fee.php";

        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod4").className += "active"; 

        document.getElementById("name-3").innerHTML = "Dashboard";  
        document.getElementById("mod3").href = "./dashboard.php";

        document.getElementById("name-4").innerHTML = "Manage Staff Salary";  
        document.getElementById("mod4").href = "./viewstaff.php";

        
        //document.getElementById("nav-item2").style.display = "None";
       // document.getElementById("nav-item4").style.display = "None";
        document.getElementById("nav-item5").style.display = "None"; 
        document.getElementById("nav-item6").style.display = "None"; 

    

    if (ntpaidarrlgt > 0) {
      document.getElementById("notify").style.color = "red";
    }
    document.getElementById("notify").innerHTML = notpaid.length;
    // notpaid.forEach (element => {
    //   alert("Please make payment for user(s) list below: \n"+ element);
    // })
  }
  window.onload = naviHead;

  function viewNoti() {
    let text = notpaid.toString();
    if (notpaid.length > 0) {
      alert("Please make payment for user(s) list below: \n" + text);
    }

  }




  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myDIV tbody tr*").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });


                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#graphCanvas'), {
                    type: 'pie',
                    data: {
                      labels: [
                        'Paid',
                        'Not Paid'
                      ],
                      datasets: [{
                        label: 'My First Dataset',
                        data: [paidarrlgt, ntpaidarrlgt],
                        backgroundColor: [
                          '#17ad37',
                          '#A8B8D8'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });



</script>
