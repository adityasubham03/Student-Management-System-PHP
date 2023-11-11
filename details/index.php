<?php
define('TITLE',"HRMS Login");
include '../assets/layouts/navbar.php';
check_logged_out();
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4 mt-5">
            <!-- <form class="form-auth" action="../api/login/" method="post"> -->
            <form class="form-auth needs-validation" action="details.php" method="get" novalidate>

                <div class="text-center">
                    <img class="mb-1 mt-4" src="../assets/images/logo.png" alt="" width="180" height="130">
                </div>

                <h6 class="h3 mb-5 mt-2 font-weight-normal text-muted text-center">Check Other's Details</h6>

                <div class="text-center mb-3">
                    <?php if (isset($_SESSION['STATUS']['loginstatus'])){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['STATUS']['loginstatus']; ?>
                        </div>
                        <?php } ?>
                </div>

                <div class="form-group mb-3">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus autocomplete="off">
                    <sub class="text-danger">
                        <?php
                            if (isset($_SESSION['ERRORS']['nouser']))
                                echo $_SESSION['ERRORS']['nouser'];
                        ?>
                    </sub>
                </div>

                <div class="d-grid gap-2">
                <button class="btn btn-lg btn-success btn-block" type="submit" value="loginsubmit" name="loginsubmit">Check Details</button>
                </div>
                
            </form>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>

<?php include '../assets/layouts/footer.php' ?>