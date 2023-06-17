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
        document.getElementById("mod1").href = "./parentmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod1").className += "active";   

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

        //document.getElementById("user").innerHTML = "????"; 
        
}
window.onload = naviHead;
    
</script>