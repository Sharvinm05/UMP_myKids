<?php include 'header.php' ?>
<?php 
  include 'db-con.php';

?>



<div class="text-center">
<h4 class="card-title">Summary</h4>
</div>
<table>
<tr>
    <th>Total number of Paid Payment</th>
    <?php
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } else {
        $result = mysqli_query($conn, "SELECT COUNT(PaymentStatus) FROM payment
        WHERE PaymentStatus = 'Paid'");
        $row = $result->fetch_row();
        echo "<td>".$row[0]."</td>";
        $numPaid=$row[0];
    }
    ?>
</tr>
<tr>
    <th>Total number of Pending Payment</th>
    <?php
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } else {
        $result = mysqli_query($conn, "SELECT COUNT(PaymentStatus) FROM payment
        WHERE PaymentStatus = 'Pending'");
        $row = $result->fetch_row();
        echo "<td>".$row[0]."</td>";
        $numPending=$row[0];
    }
    ?>
</tr>
<tr>
    <th>Total number of Overdue Payment</th>
    <?php
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } else {
        $result = mysqli_query($conn, "SELECT COUNT(PaymentStatus) FROM payment
        WHERE PaymentStatus = 'Overdue'");
        $row = $result->fetch_row();
        echo "<td>".$row[0]."</td>";
        $numOverdue=$row[0];
    }
    ?>
</tr>
</table>

<head>


<canvas id="doughnutChart" style="max-height: 600px;"></canvas>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#doughnutChart'), {
                type: 'doughnut',
                data: {
                labels: [
                  'Total Number of Paid Payment',
                  'Total Number Pending Payment',
                  'Total Number Overdue Payment',
                ],
                datasets: [{
                label: 'My First Datase',
                data: [2, 1, 1],
                backgroundColor: [
                  'rgb(54, 162, 235)',
                  'rgb(255, 99, 132)',
                  'rgb(300, 20, 132)',
                ],
                hoverOffset: 4
                    }]
                  }
                });
              });

              function naviHead() {
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Dashboard";
        document.getElementById("mod1").href = "./ownermain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod3").className += "active";   

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
            </script><!-- End Doughnut CHart -->
<?php include 'footer.php' ?>
</html>


