<?php
include("db-con.php");
include('header.php');
?>
<!-- Contents Starts-->

    <div class="container-fluid py-4">
         <h2>Welcome Admin</h2>

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
        document.getElementById("mod1").className += "active";   

        document.getElementById("name-2").innerHTML = "Create New Uer"; 
        document.getElementById("mod2").href = "./create_user.php";

        document.getElementById("name-3").innerHTML = "View All Users";  
        document.getElementById("mod3").href = "./user_list.php";

        document.getElementById("name-4").innerHTML = "Dashboard";  
        document.getElementById("mod4").href = "./user_dashboard.php";

        
        document.getElementById("nav-item5").style.display = "None"; 
        document.getElementById("nav-item6").style.display = "None"; 

        //document.getElementById("nav-item5").style.display = "None"; 
        //document.getElementById("nav-item6").style.display = "None"; 

        //document.getElementById("user").innerHTML = "????"; 
        
}
window.onload = naviHead;
    
</script>