<?php
include("db-con.php");
include('header.php');

?>


<!-- End Navbar -->

<!-- Contents Starts-->

<div class="container-fluid py-4">
    <div class="col-6 text-end">
        <a class="btn bg-gradient-dark mb-0" href="create_user.php"><i class="fas fa-plus"></i> &nbsp;&nbsp;Create New User</a>
        &nbsp;&nbsp;&nbsp;&nbsp; <a class="btn bg-gradient-dark mb-0" href="user_list.php"><i class="fas fa-list"></i>&nbsp;&nbsp;View All Users</a>
        &nbsp;&nbsp;  <a class="btn bg-gradient-dark mb-0" href="user_dashboard.php"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;Dashboard</a>
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
        document.getElementById("page-head").innerHTML = "Manage User";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod3").className += "active";
        document.getElementById("name-3").innerHTML = "Manage User";
    }
    window.onload = naviHead;
</script>