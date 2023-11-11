<?php
define('TITLE', 'Add Department');
include '../../assets/layouts/navbar.php';
if(check_logged_in()){
    if (isset($_SESSION)) {
        if($_SESSION["auth"]!="verified"){
            header("Location: ../");
        }
        else{
            if($_SESSION["level"]==2){
                header("Location: ../");
            }
        }
    }
    else {
        header("Location: ../");
    }
}
if(isset($_GET['id']) && $_GET['id']!="") $username = $_GET['id'];
else header("Location: ../");
?>


<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-lg-4">

            <form class="form-auth" action="register.inc.php" method="post" enctype="multipart/form-data">

                <?php insert_csrf_token(); ?>


                <h6 class="h3 mt-3 mb-3 font-weight-normal text-muted text-center">Add A Department</h6>

                <div class="text-center mb-3">
                    <small class="text-success font-weight-bold">
                        <?php if (isset($_SESSION['STATUS']['depstatus'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?php echo $_SESSION['STATUS']['depstatus'] ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                    </small>
                </div>

                <div class="form-group mb-3">
                    <div class="mb-2"><label for="user" class="sr-only">Username</label></div>
                    <input type="text" id="user" name="user" class="form-control" value="<?php echo $username ?>" placeholder="<?php echo $username ?>" required autofocus autocomplete="off" readonly>
                    <sub class="text-danger">
                        <?php if (isset($_SESSION['ERRORS']['formerroe'])) {
                            echo $_SESSION['ERRORS']['formerror'];
                        } ?>
                    </sub>
                </div>


                <div class="form-group mb-3">
                    <div class="mb-2"><label for="subject" class="sr-only">Subject Name</label></div>
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject Name" required autofocus autocomplete="off">
                    <sub class="text-danger">
                        <?php if (isset($_SESSION['ERRORS']['formerroe'])) {
                            echo $_SESSION['ERRORS']['formerror'];
                        } ?>
                    </sub>
                </div>

                <div class="form-group mb-3">
                    <div class="mb-2"><label for="semester" class="sr-only">Semester</label></div>
                    <input type="number" id="semester" name="semester" min="1" max="8" class="form-control" placeholder="Semester" required autofocus autocomplete="off">
                    <sub class="text-danger">
                        <?php if (isset($_SESSION['ERRORS']['formerroe'])) {
                            echo $_SESSION['ERRORS']['formerror'];
                        } ?>
                    </sub>
                </div>

                <div class="form-group mb-3">
                    <div class="mb-2"><label for="marks" class="sr-only">Marks Secured</label></div>
                    <input type="number" id="marks" min="0" max="100" name="marks" class="form-control" placeholder="Marks Secured" required autofocus autocomplete="off">
                    <sub class="text-danger">
                        <?php if (isset($_SESSION['ERRORS']['formerroe'])) {
                            echo $_SESSION['ERRORS']['formerror'];
                        } ?>
                    </sub>
                </div>

                <div class="form-group mb-3">
                <div class="mb-2"><label for="type" class="sr-only" required>Exam Type</label></div>
                    <select id="type" name="type" class="form-select" placeholder="Type" required>
                        <option type="number" value=0 selected>Midsem</option>
                        <option type="number" value=1>Endsem</option>
                    </select>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit" name='depsubmit'>Add Marks For <?php echo $username ?></button>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/layouts/footer.php'; ?>