<?php

include('header.php');
//include("db-con.php");

if (isset($_POST['submit'])) {

    $type = $_POST['type'];
    $username = $_POST['username'];
    $userid = $_POST['userid'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    
        $sql = "INSERT INTO staff (StaffName, StaffUsername  , 	StaffType, StaffEmail, StaffAge,StaffPhnum,StaffAddress,StaffPass) VALUES ('$username', '$userid', '$usertype','$email', '$age', '$phone', '$address', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("User added successfully");
             window.location.href = "user_list.php";
            </script>';
        } else {
            echo '<script>alert("Something went wrong!")</script>';
        }
    


} //end of post




?>


<!-- End Navbar -->

<!-- Contents Starts-->

<div class="container-fluid py-4">
    <h3>Create New User</h3>

    <main class="main-content  mt-0">
        <section>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-6 d-flex flex-column mx-auto">
                            <div>

                                <div class="card-body">

                                    <form role="form" method="POST">
                                        <div class="mb-3" id="usertype">
                                            <label>User Type</label>
                                            <input type="text" name="usertype" value="Owner" class="form-control" placeholder="User Type" aria-label="usertype" readonly>
                                        </div>

                                        <label>Name</label>
                                        <div class="mb-3">
                                            <input type="text" name="username" class="form-control" placeholder="Name" aria-label="user name" required>
                                        </div>

                                        <div class="mb-3" id="username">
                                            <label>User Name</label>
                                            <input type="text" name="userid" class="form-control" placeholder="Username" aria-label="user id">
                                        </div>

                                        <div class="mb-3" id="username">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="emmail" aria-label="email">
                                        </div>

                                        <label>Age</label>
                                        <div class="mb-3">
                                            <input type="number" name="age" class="form-control" placeholder="Age" aria-label="age" required>
                                        </div>

                                        <label>Phone Number</label>
                                        <div class="mb-3">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" aria-label="phone" required>
                                        </div>

                                        <label>Address</label>
                                        <div class="mb-3">
                                            <input type="text" name="address" class="form-control" placeholder="Address" aria-label="address" required>
                                        </div>

                                        <label>password</label>
                                        <div class="mb-3">
                                            <input type="text" name="password" class="form-control" placeholder="Password" aria-label="password" required>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Create</button>
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
    document.getElementById("page-head").innerHTML = "Create New User";
    document.getElementById("mod1").href = "./adminmain.php";
    //Side Navigation Bar
    document.getElementById("mod1").className = "nav-link  ";
    document.getElementById("mod2").className += "active";

    document.getElementById("name-2").innerHTML = "Create New User";
    document.getElementById("mod2").href = "./create_user.php";

    document.getElementById("name-3").innerHTML = "View All Users";
    document.getElementById("mod3").href = "./user_list.php";

    document.getElementById("name-4").innerHTML = "Dashboard";
    document.getElementById("mod4").href = "./user_dashboard.php";


    document.getElementById("nav-item5").style.display = "None"; 
        document.getElementById("nav-item6").style.display = "None"; 

    }
    window.onload = naviHead;
</script>