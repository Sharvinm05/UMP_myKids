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
        document.getElementById("mod1").href = "./staffmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        //document.getElementById("mod1").className += "active";   

        document.getElementById("name-2").innerHTML = "????"; 
        document.getElementById("mod2").href = "";

        //document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod1").className += "active";

        document.getElementById("name-2").innerHTML = "Add Activity";  
        document.getElementById("mod2").href = "./add.php";

        document.getElementById("name-3").innerHTML = "Display Activity"; 
        document.getElementById("mod3").href = "./display_page.php";

        
        document.getElementById("name-4").innerHTML = "Chart";  
        document.getElementById("mod4").href = "./chart.php";

        document.getElementById("name-5").innerHTML = "View Salary Details";  
        document.getElementById("mod5").href = "./teacherview.php";

         
        document.getElementById("nav-item6").style.display = "None"; 
        
}
window.onload = naviHead;
    
</script>