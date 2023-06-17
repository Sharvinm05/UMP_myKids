<?php

include("db-con.php");
include('header.php');

?>
<!-- Contents Starts-->

    <div class="container-fluid py-4">
         <h2>Welcome <?php echo $_SESSION["name"]; ?></h2>

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
        document.getElementById("mod1").href = "./ownermain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod1").className += "active";   

        document.getElementById("name-2").innerHTML = "Payment Fee"; 
        document.getElementById("mod2").href = "./payment_fee.php";

        document.getElementById("name-3").innerHTML = "Dashboard";  
        document.getElementById("mod3").href = "./dashboard.php";

        document.getElementById("name-4").innerHTML = "Manage Staff Salary";  
        document.getElementById("mod4").href = "./viewstaff.php";

        
        //document.getElementById("name-4").innerHTML = "????"; 
        //document.getElementById("nav-item2").style.display = "None";
        //document.getElementById("nav-item4").style.display = "None";
        document.getElementById("nav-item5").style.display = "None"; 
        document.getElementById("nav-item6").style.display = "None"; 

        //document.getElementById("user").innerHTML = "????"; 
        
}
window.onload = naviHead;
    
</script>