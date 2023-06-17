<?php
include("db-con.php");
include('header.php');


if (isset($_GET['pid'])) {

    $pid = $_GET['pid'];
    $sql = "DELETE  FROM parent where ParentId ='$pid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>
            alert("User deleted successfully");
            window.location.href = "user_list.php";
           </script>';
    } else {
        echo '<script>alert("Something went wrong!")</script>';
    }
} else if (isset($_GET['sid'])) {

    $sid = $_GET['sid'];
    $sql = "DELETE  FROM staff where StaffId  ='$sid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>
            alert("User deleted successfully");
            window.location.href = "user_list.php";
           </script>';
    } else {
        echo '<script>alert("Something went wrong!")</script>';
    }
}

?>
<!-- End Navbar -->
<!-- End Navbar -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

                <div class="card-header pb-0">
                    <a class="btn bg-gradient-dark mb-0" href="create_user.php"><i class="fas fa-plus"></i> &nbsp;&nbsp;Create New User</a>
                    <br><br>
                    <h6>All Users</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Name</th>

                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM parent";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) >= 1) {
                                    foreach ($result as $r) {

                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?php echo $r['ParentName']; ?></h6>
                                                        <p class="text-xs text-secondary mb-0"><?php echo $r['ParentAge']; ?></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-primary">PARENT</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo $r['ParentPhnum']; ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo $r['ParentAddress']; ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="edit_user.php?pid=<?php echo $r['ParentId'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="user_list.php?pid=<?php echo $r['ParentId'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>

                                <?php }
                                } ?>

                                <?php
                                $sql = "SELECT * FROM staff";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) >= 1) {
                                    foreach ($result as $r) {

                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?php echo $r['StaffName']; ?></h6>
                                                        <p class="text-xs text-secondary mb-0"><?php echo $r['StaffAge']; ?></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">STAFF</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffPhnum']; ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo $r['StaffAddress']; ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="edit_user.php?sid=<?php echo $r['StaffId'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="user_list.php?sid=<?php echo $r['StaffId'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Delete
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


    <?php
    include('footer.php');
    ?>
    <script>
        function naviHead() {
            //Header name
            document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "View All Users";
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

        
        document.getElementById("nav-item5").style.display = "None"; 
        document.getElementById("nav-item6").style.display = "None"; 
        }
        window.onload = naviHead;
    </script>
    </body>

    </html>