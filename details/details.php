<?php

define('TITLE', "Other's Details");
include '../assets/layouts/navbar.php';

if(isset($_GET['username'])){
    $id = mysqli_real_escape_string($conn, $_GET['username']);
    $query = "SELECT * FROM users WHERE username='$id' ";
    $query_run = mysqli_query($conn, $query);
    $employee = mysqli_fetch_array($query_run);
?>
<div class="container mt-4">
    <div class="alert alert-primary text-center" role="alert">
        <h4 class="alert-heading">Hello <?php echo $id ?>,</h4>
        <p>Welcome To KIIT Student Portal!</p>
        <hr>
        <p class="mb-2">Name:- <?php echo $employee['first_name']; echo " "; echo $_SESSION['last_name']?></p>
        <p class="mb-2">Email:- <?php echo $employee['email']?></p>
        <p class="mb-2">Gender:- <?php if($employee['gender']=="m") echo "Male"; else if($_SESSION['gender']=="f") echo "Male"; else echo "N/A"  ?></p>

        <p class="mb-2">Level:- <?php if($employee['level']==0) echo "Super Admin"; else if($employee['level']==1) echo "HOD/Teacher/Admin"; else echo "Student"  ?></p>
    </div>
</div>

<?php }?>

