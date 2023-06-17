<?php
include("header.php");
?>


<!DOCTYPE html>
<html lang="en">
<style>
  table {
    border: 2px solid green;
    margin-bottom: 10px;
  }

  td,
  th {
    border: 2px solid black;
    padding: 10px 30px 10px 10px;
  }
</style>


<body>
  <center>

    <table>
      <tr>
        <th>Parent Name</th>
        <th>Payment Status</th>
        <th>Payment Amount</th>
        <th>Payment Date</th>
        <th>Payment ID</th>
        <th>Invoice</th>

      </tr>


      <!-- Contents Starts-->

      <?php

      require "db-con.php";
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } else {
        $sql = "SELECT parent.ParentName, payment.PaymentID, payment.PaymentAmount, payment.PaymentStatus, payment.PaymentDate
                                                  from parent JOIN payment ON parent.PaymentID = payment.PaymentID ";
        $result = $conn->query($sql);
        $count = $result->num_rows;
        $i = 0;
        if ($count > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

            $a[$i] = $row["ParentName"];
            $b[$i] = $row["PaymentStatus"];
            $c[$i] = $row["PaymentAmount"];
            $d[$i] = $row["PaymentDate"];
            $e[$i] = $row["PaymentID"];


            $i++;
          }
          for ($i = 0; $i < $count; $i++) {

            echo "<tr>";
            echo "<td>" . $a[$i] . "</td>";
            echo "<td>" . $b[$i] . "</td>";
            echo "<td>" . $c[$i] . "</td>";
            echo "<td>" . $d[$i] . "</td>";
            echo "<td>" . $e[$i] . "</td>";
          }
        }
      }
      ?>

      <td class="align-middle">
        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> View Invoice</button>
      </td>

      <td class="align-middle">
        <div class="align-middle text-center">
          <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
        </div>
      </td>

      <td class="align-middle">
        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
          Notify
        </a>
      </td>



    </table>

    <button type="submit" name="submit" class="btn bg-gradient-info w-20 mt-4 mb-0">Update</button>


    <!-- Contents End-->
    <?php
    include('footer.php');
    ?>
    <script>
      function naviHead() {
        //Header name
        

        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Payment Fee";
        document.getElementById("mod1").href = "./ownermain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod2").className += "active";

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

      }
      window.onload = naviHead;
    </script>