<?php include('db-con.php');?>

<?php
include('header.php');
?>
<!-- Contents Starts-->
<?php
$idURL = $_GET['id'];
$query = "SELECT * FROM staff WHERE StaffId = '$idURL'";
$result = mysqli_query($conn, $query) or die("Could not execute query");
$p = mysqli_fetch_assoc($result);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid py-4">
    <h2>Salary Payment to <?php echo $p["StaffName"]; ?></h2>
    <div class="card-body p-3 pb-0" >
        <ul class="list-group" id="myDIV" >
            <?php
            $sql = " SELECT * FROM salary WHERE StaffId = '$idURL' ORDER BY SalaryDate DESC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) >= 1) {
                foreach ($result as $r) {


            ?>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark font-weight-bold text-sm"><?php echo date('l, jS \of F Y', strtotime($r['SalaryDate'])); ?></h6>
                            <h9 class="text-xs">Payment done by: <?php echo $r["Paidby"]; ?></h9>
                        </div>
                        <div class="d-flex align-items-center text-sm" style="font-weight: bold;">RM
                            <?php echo $r["SalaryAmount"]; 
                            
                            ?>
                            <a class="btn btn-link text-sm mb-0 px-0 ms-4" style="color: blue;" target="_blank" href="../pages/download.php?id=<?php echo $r['SalaryId'];?>"><i class="fas fa-eye text me-2" aria-hidden="true"></i> View</a>
                            <a class="btn btn-link text-sm mb-0 px-0 ms-4" style="color: green;" href="../pages/editpayment.php?id=<?php echo $r['SalaryId']; ?>"><i class="fas fa-pencil-alt text me-2" aria-hidden="true"></i> Edit</a>
                            <a class="btn btn-link text-sm mb-0 px-0 ms-4" style="color: red;" href="../pages/deletepayment.php?id=<?php echo $r['SalaryId']; ?>" onclick="return confirm('Do you want to proceed to delete?');"><i class="far fa-trash-alt me-2"></i> Delete</a>
                        </div>
                    </li>
                    
            <?php

                }
            } else {

                echo "No Salary Payment Recorded";
            } ?>
        </ul>
    </div>
    <div class="col-6 text-end">
        <button class="btn btn-outline-primary btn-sm mb-0" onclick="window.location='../pages/viewstaff.php'">Back</button>
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
        document.getElementById("page-head").innerHTML = "View Payment";
        //Side Navigation Bar
         

        document.getElementById("name-2").innerHTML = "????"; 
        document.getElementById("mod3").href = "";

        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod3").className += "active"; 
        document.getElementById("name-3").innerHTML = "Manage Staff Salary";  
        document.getElementById("mod3").href = "../pages/viewstaff.php";

        
        document.getElementById("nav-item2").style.display = "None";
        document.getElementById("nav-item4").style.display = "None";
        document.getElementById("nav-item5").style.display = "None"; 
        document.getElementById("nav-item6").style.display = "None"; 
    }
    window.onload = naviHead;

//     $(document).ready(function() {
//     $("#myInput").on("keyup", function() {
//       var value = $(this).val().toLowerCase();
//       $("#myDIV li *").filter(function() {
//         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//       });
//     });
//   });
</script>