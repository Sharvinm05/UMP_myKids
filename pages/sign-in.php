<?php
include("db-con.php");

session_start();


if (isset($_POST['submit'])) {

    $admin_username = $_POST['admin_username'];
    $admin_pass = $_POST['admin_pass'];
    $usertype = $_POST['usertype'];

    if ($usertype ==1){
        $sql = "SELECT * FROM staff WHERE 	StaffEmail ='$admin_username' AND StaffPass='$admin_pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) < 1) {
            echo '<script>alert("The Username or Password is invalid");  
            </script>';
    
        } else {

            $row = mysqli_fetch_assoc($result);
            $id = $row['StaffId'];
            $name = $row['StaffName'];
            $stype = $row['StaffType'];
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            if($stype == "Owner"){
                echo '<script>alert("Login successfull");
                window.location.href = "ownermain.php";
               </script>';
            }else{
                echo '<script>alert("Login successfull");
                window.location.href = "staffmain.php";
               </script>';
            }
            
        }

    }
    else if ($usertype == 2){
        $sql = "SELECT * FROM parent WHERE 	ParentEmail ='$admin_username' AND ParentPass='$admin_pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) < 1) {
            echo '<script>alert("The Username or Password is invalid");  
            </script>';
        } else {

            $row = mysqli_fetch_assoc($result);
            $id = $row['ParentId'];
            $parentnm = $row['ParentName'];
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $parentnm;
            echo '<script>alert("Login successfull");
             window.location.href = "parentmain.php";
            </script>';
        }

    }

else {
    $sql = "SELECT * FROM admin WHERE 	AdminUsername ='$admin_username' AND AdminPass='$admin_pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 1) {
            echo '<script>alert("The Username or Password is invalid");  
            </script>';
    } else {

        $row = mysqli_fetch_assoc($result);
        $id = $row['AdminId'];
        $_SESSION["id"] = $id;
        $_SESSION["name"] = "Admin";
            echo '<script>alert("Login successfull");
             window.location.href = "adminmain.php";
            </script>';
    }
  }
}// end of post

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/ump.png">
    <title>
        Sign In
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>


<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">UMP MyKids</h3>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">

                                <form role="form" method="POST">
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="text" name="admin_username" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="admin_pass" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <label>User Type</label>
                                    <div class="mb-3">
                                        <select name="usertype" id="type" class="form-control">
                                            <option value="0">--Type--</option>
                                            <option value="1">Staff</option>
                                            <option value="2">Parent</option>
                                            <option value="3">Admin</option>
                                        </select>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign In</button>
                                    </div>

                                </form>
                                <div class="text-center">
                                        <button type="button" name="signup" onclick="location.href='./sign-up.php'" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign Up</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<center>
<?php
include('footer.php');
?>
</center>

</body>

</html>