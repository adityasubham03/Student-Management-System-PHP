<?php

define('TITLE', "Dashboard");
include '../assets/layouts/navbar.php';
check_verified();
$level = $_SESSION['level'];
?>
<div class="container mt-4">
    <div class="alert alert-primary text-center" role="alert">
        <h4 class="alert-heading">Hello <?php echo $_SESSION['username'] ?>,</h4>
        <p>Welcome To KIIT Student Portal!</p>
        <hr>
        <p class="mb-2">Name:- <?php echo $_SESSION['first_name']; echo " "; echo $_SESSION['last_name']?></p>
        <p class="mb-2">Email:- <?php echo $_SESSION['email']?></p>
        <p class="mb-2">Gender:- <?php if($_SESSION['gender']=="m") echo "Male"; else if($_SESSION['gender']=="f") echo "Male"; else echo "N/A"  ?></p>

        <p class="mb-2">Level:- <?php if($_SESSION['level']==0) echo "Super Admin"; else if($_SESSION['level']==1) echo "HOD/Teacher/Admin"; else echo "Student"  ?></p>
    </div>


    <div>
        <?php if($level !=2){ ?>
            <h2 class="mt-4 mb-4 text-center">Admin Management Panel</h2>
        <?php } else{ ?>
            <h2 class="mt-4 mb-4 text-center">Student Self Service Window</h2>
        <?php } ?>
    </div>

    <div class="row text-center d-flex justify-content-center">
    <?php if($level !=2){ ?>

        <div class="col-md-4 mb-4">
            <div class="card mt-2" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Check and Manage Users Here</h6>
                    <p class="card-text">You can add and check users under your department here.</p>
                    <a href="/users" class="card-link">View Users</a>
                    <a href="/register" class="card-link">Add Users</a>
                </div>
            </div>
        </div>

        <?php if($level != 1){ ?>
        <div class="col-md-4 mb-4">
            <div class="card mt-2" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">Departments</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Check and Manage Departments Here</h6>
                    <p class="card-text">You can add and check Departments here.</p><br>
                    <a href="/departments" class="card-link">View Departments</a>
                    <a href="/departments/add" class="card-link">Add Dept.</a>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>

        <div class="col-md-4 mb-4">
            <div class="card mt-2" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">Marks</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Check and Manage Marks Of Students Here</h6>
                    <p class="card-text">You can add and check marks of all the students under your department here.</p>
                    <a href="/marks" class="card-link">View Marks</a>
                    <?php if($level !=2){ ?>
                    <a href="/marks/add" class="card-link">Add Marks</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    
</div>


<?php include '../assets/layouts/footer.php'; ?>