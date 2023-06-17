<?php
include('header.php');
?>
<!-- Contents Starts-->

    <div class="container-fluid py-4">
         <h2>Welcome</h2>

    </div>

<!-- Contents End-->
<?php
include('footer.php');
?>
<script>
    function naviHead() {
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Profile";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod2").className += "active";   
        document.getElementById("name-2").innerHTML = "Profile";   
}
window.onload = naviHead;
    
</script>


   

