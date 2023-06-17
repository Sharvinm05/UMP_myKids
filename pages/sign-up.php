<?php
include("db-con.php");

if (isset($_POST['submit'])) {

    
    $username = $_POST['username'];
    $userid = $_POST['userid'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if ($usertype == 'Teacher') {
        $sql = "INSERT INTO staff (StaffName, StaffUsername  , 	StaffType, StaffEmail, StaffAge,StaffPhnum,StaffAddress,StaffPass) VALUES ('$username', '$userid', '$usertype','$email', '$age', '$phone', '$address', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("User added successfully");
             window.location.href = "sign-in.php";
            </script>';
        } else {
            echo '<script>alert("Something went wrong!")</script>';
        }
    }

    if ($usertype == 'Parent') {
        $sql = "INSERT INTO parent (ParentName,ParentEmail, ParentAge, ParentPhnum,ParentAddress,ParentPass) VALUES ('$username','$email', '$age', '$phone', '$address', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("User added successfully");
             window.location.href = "sign-in.php";</script>';
        } else {
            echo '<script>alert("Something went wrong!")</script>';
        }
    }
} //end of post

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/ump.png">
    <title>
        Sign Up
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
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">

            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register New Account</h5>

                            <div class="card-body">
                                <form role="form" method="POST">

                                    <div class="mb-3">
                                        <select name="usertype" id="type" class="form-control">
                                            <option value="0">--Type--</option>
                                            <option value="Teacher">Staff (Teacher)</option>
                                            <option value="Parent">Parent</option>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="Name" aria-label="user name" required>
                                    </div>

                                    <div class="mb-3" id="username">

                                        <input type="text" name="userid" class="form-control" placeholder="Username" aria-label="user id">
                                    </div>
                                    <div class="mb-3" id="usertype">

                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email">
                                    </div>


                                    <div class="mb-3">
                                        <input type="number" name="age" class="form-control" placeholder="Age" aria-label="age" required>
                                    </div>


                                    <div class="mb-3">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" aria-label="phone" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" name="address" class="form-control" placeholder="Address" aria-label="address" required>
                                    </div>


                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="password" required>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                    </div>
                                </form>

                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="./sign-in.php" class="text-dark font-weight-bolder">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php
include('footer.php');
?>
</body>

</html>