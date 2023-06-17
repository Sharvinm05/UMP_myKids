<?php
include("db-con.php");
include('header.php');

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM parent where 	ParentId = $pid ";
    $result_all = mysqli_query($conn, $sql);
    $type = "Parent";
} else if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
    $sql = "SELECT * FROM staff where StaffId  = $sid ";
    $result_all_s = mysqli_query($conn, $sql);
    $type = "Staff";
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (isset($_GET['sid'])) {
        $userid = $_POST['userid'];
        $usertype = $_POST['usertype'];
        $sql = "UPDATE staff SET StaffName = '$username',  StaffUsername = '$userid',StaffType='$usertype', StaffAge='$age', StaffPhnum='$phone' ,	StaffAddress ='$address' WHERE StaffId  ='$sid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>
            alert("User updated successfully");
            window.location.href = "user_list.php";
           </script>';
        } else {
            echo '<script>alert("Something went wrong!")</script>';
        }
    } else if (isset($_GET['pid'])) {
        $sql = "UPDATE parent SET ParentName = '$username', ParentAge='$age', ParentPhnum='$phone' , ParentAddress ='$address' WHERE ParentId ='$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>
            alert("User updated successfully");
            window.location.href = "user_list.php";
           </script>';
        } else {
            echo '<script>alert("Something went wrong!")</script>';
        }
    }
} //end of post



?>


<!-- End Navbar -->

<!-- Contents Starts-->

<div class="container-fluid py-4">
    <h3>Update User Info</h3>
    <main class="main-content  mt-0">
        <section>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-6 d-flex flex-column mx-auto">
                            <div>
                                <div class="card-body">
                                    <form role="form" method="POST">

                                        <?php
                                        if (isset($_GET['pid'])) {
                                            foreach ($result_all as $r) { ?>
                                                <label>Type of User</label>
                                                <div class="mb-3">
                                                    <input type="text" name="type" class="form-control" value="<?php echo $type ?>" readonly>
                                                </div>

                                                <label> Name</label>
                                                <div class="mb-3">
                                                    <input type="text" name="username" value="<?php echo $r['ParentName'] ?>" class="form-control" placeholder="User name" aria-label="user name" required>
                                                </div>

                                             

                                                <label>Age</label>
                                                <div class="mb-3">
                                                    <input type="number" name="age" class="form-control" value="<?php echo $r['ParentAge'] ?>" placeholder="Age" aria-label="age" required>
                                                </div>

                                                <label>Phone Number</label>
                                                <div class="mb-3">
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $r['ParentPhnum'] ?>" placeholder="Phone Number" aria-label="phone" required>
                                                </div>

                                                <label>Address</label>
                                                <div class="mb-3">
                                                    <input type="text" name="address" class="form-control" value="<?php echo $r['ParentAddress'] ?>" placeholder="Address" aria-label="address" required>
                                                </div>

                                            <?php }
                                        } else if (isset($_GET['sid'])) {
                                            foreach ($result_all_s as $r) { ?>

                                                <label>Type of User</label>
                                                <div class="mb-3">
                                                    <input type="text" name="type" class="form-control" value="<?php echo $type ?>" readonly>
                                                </div>

                                                <label> Name</label>
                                                <div class="mb-3">
                                                    <input type="text" name="username" value="<?php echo $r['StaffName'] ?>" class="form-control" placeholder="User name" aria-label="user name" required>
                                                </div>

                                                <label>User Name</label>
                                                <div class="mb-3">
                                                    <input type="text" name="userid" value="<?php echo $r['StaffUsername'] ?>" class="form-control" placeholder="User ID" aria-label="user id" required>
                                                </div>

                                                <label>User Type</label>
                                                <div class="mb-3">
                                                    <input type="text" name="usertype" value="<?php echo $r['StaffType'] ?>" class="form-control" placeholder="User ID" aria-label="user id" required>
                                                </div>
                                                <label>Age</label>
                                                <div class="mb-3">
                                                    <input type="number" name="age" class="form-control" value="<?php echo $r['StaffAge'] ?>" placeholder="age" aria-label="age" required>
                                                </div>

                                                <label>Phone Number</label>
                                                <div class="mb-3">
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $r['StaffPhnum'] ?>" placeholder="Phone Number" aria-label="phone" required>
                                                </div>

                                                <label>Address</label>
                                                <div class="mb-3">
                                                    <input type="text" name="address" class="form-control" value="<?php echo $r['StaffAddress'] ?>" placeholder="Address" aria-label="address" required>
                                                </div>
                                        <?php }
                                        }
                                        ?>

                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Update</button>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

</div>

<!-- Contents End-->
<?php
include('footer.php');
?>
<script>
    function naviHead() {
        //Header name
      

        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Main Menu";
        document.getElementById("mod1").href = "./adminmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod3").className += "active";   

        document.getElementById("name-2").innerHTML = "Create New Uer"; 
        document.getElementById("mod2").href = "./create_user.php";

        document.getElementById("name-3").innerHTML = "View All Users";  
        document.getElementById("mod3").href = "./user_list.php";

        document.getElementById("name-4").innerHTML = "Dashboard";  
        document.getElementById("mod4").href = "./user_dashboard.php";

        
        document.getElementById("name-5").innerHTML = "????"; 

    }
    window.onload = naviHead;
</script>