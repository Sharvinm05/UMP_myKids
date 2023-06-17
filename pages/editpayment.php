<?php
include("db-con.php");
include('phpqrcode/qrlib.php');

        $idURL = $_GET['id'];
        $query = "SELECT * FROM salary WHERE SalaryId = '$idURL'";
        $result = mysqli_query($conn, $query) or die("Could not execute query");
        $r = mysqli_fetch_assoc($result);
        $idd = $r["StaffId"];

        $query2 = "SELECT * FROM staff WHERE StaffId = '$idd'";
        $result2 = mysqli_query($conn, $query2) or die("Could not execute query");
        $r2 = mysqli_fetch_assoc($result2);
        

        if (isset($_POST['submit'])) {

            //$name =  $_POST['name'];
            //$username =  $_POST['username'];
            //$stafftype = $_POST['stafftype'];
            $salaryvalue = $r2["StaffSalary"];
            //$regdate = $_POST['regdate'];
            $ownername = $_POST['ownername'];
            $paymentdate = $_POST['paymentdate'];
            $staffid = $r['StaffId'];
            $salarystatus = 'Paid';
            
            if(count($_FILES) > 0) {
                if(is_uploaded_file($_FILES['pdffilen']['tmp_name'])) {
                  $fileData = addslashes(file_get_contents($_FILES['pdffilen']['tmp_name']));
                  $sql = "UPDATE salary SET SalaryAmount = '$salaryvalue', SalaryDate='$paymentdate', SalaryStatus='$salarystatus' , Paidby ='$ownername' , Salarypdf ='{$fileData}' , StaffId ='$staffid' WHERE SalaryId = '$idURL'";
                  $result = mysqli_query($conn, $sql);
                }   
            }
            $strSQL = "SELECT * FROM salary WHERE SalaryDate = '$paymentdate'";
            $rsq = mysqli_query($conn, $strSQL);
            $rq = mysqli_fetch_assoc($rsq);
            $stid = $rq['SalaryId'];
            $path = '../qrimg/';
            $file = $path . uniqid() . ".png";
        
            //other parameters
            $ecc = 'L';
            $pixel_size = 10;
            $frame_size = 10;
            
            $sqlq = "UPDATE qrcode SET qrimg = '{$file}' WHERE Salaryid = '$stid'";
            $resultq = mysqli_query($conn, $sqlq);
        
            QRcode::png("http://192.168.0.117/ump_mykids2/pages/download.php?id=$stid", $file, $ecc, $pixel_size, $frame_size);

        
                if ($result) {
                     echo '<script>alert("Updated successfully");
                      window.location.href = "viewstaff.php";
                     </script>';
                    
                } else {
                    echo '<script>alert("Something went wrong!")</script>';
                }
        }
?>

<?php
include('header.php');
?>
<!-- Contents Starts-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="container-fluid py-4">
    <!-- <h2>Add Salary for </h2> -->
    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                    <h2 class="text-center">Add Salary for </h2>
                    <form role="form" role="form" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="mb-4">
                                <label>Full Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" placeholder="" value="<?php echo $r2["StaffName"]; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <div class="input-group mb-4">
                                        <input class="form-control" name="username"  type="text" value="<?php echo $r2["StaffUsername"]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 ps-2">
                                    <label>Staff Registered Date</label>
                                    <div class="input-group">
                                        <input type="text" name="regdate" class="form-control" placeholder="" aria-label="Last Name..." value="<?php echo $r2["StaffRegDate"]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Staff Position</label>
                                    <div class="input-group mb-4">
                                        <input class="form-control" name="stafftype" placeholder="" aria-label="First Name..." type="text" value="<?php echo $r2["StaffType"]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 ps-2">
                                    <label>Salary Amount</label>
                                    <div class="input-group">
                                        <input type="number" name="salaryval" class="form-control" placeholder="" aria-label="Last Name..." value="<?php echo $r2["StaffSalary"]; ?>" disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="mb-4">
                                <label>Owner</label>
                                <div class="input-group">
                                <select name="ownername" style="width: 350px; height: 40px; border-radius:8px;">
                                    <!-- <option disabled selected><?php echo $r["Paidby"]; ?></option> -->
                                    <?php
                                    $sql2 = "SELECT * FROM staff WHERE StaffType = 'Owner'";
                                    
                                   // echo "<select name=owner value=''>Owner List"; // list box select command

                                    $result2 = mysqli_query($conn, $sql2);
                                    if (mysqli_num_rows($result2) >= 1) {
                                        foreach ($result2 as $g) { //Array or records stored in $row
                                            if($r["Paidby"] == $g['StaffName'] ){
                                                echo "<option value='". $g['StaffName'] ."' selected>" .$g['StaffName'] ."</option>";
                                            }else{
                                                echo "<option value='". $g['StaffName'] ."'>" .$g['StaffName'] ."</option>";
                                            }
                                            
                                        }
                                    }
                                    echo "</select>"; // Closing of list box

                                    ?>
                                </div>
                            </div>


                            <div class="mb-5">
                                <div class="input-group mb-4">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    <input class="form-control datepicker" name="paymentdate" placeholder="Please select date" type="text" value="<?php echo $r["SalaryDate"]; ?>" >
                                </div>
                            </div>
                            <script>
                                if (document.querySelector(".datepicker")) {
                                    flatpickr(".datepicker", {});
                                }
                            </script>

                            <div class="mb-4">
                                <label>Upload Salary Statement: </label>
                                <div class="input-group">
                                    <input type="file" name="pdffilen" class="form-control" placeholder=""  accept="application/pdf" required>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn bg-gradient-dark w-100">Update Salary Payment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

<!-- Contents End-->
<?php
include('footer.php');
?>
<script>
    function naviHead() {
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Edit Salary Payment";
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

</script>