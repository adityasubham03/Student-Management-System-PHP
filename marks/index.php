<?php
define('TITLE', "Manage Users");
include '../assets/layouts/navbar.php';
check_verified();
if($_SESSION['level']==2){
    header("Location: student-view.php");
}
?>




<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Marks Details
                        </h4>
                    </div>
                    <div class="card-body">

                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="filter_value" class="form-control" placeholder="Search" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="filter_btn" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="text-center mb-3">
                        <?php if (isset($_SESSION['STATUS']['deletestatus'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?php echo $_SESSION['STATUS']['deletestatus'] ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                </div>

                        <table class="table table-bordered table-striped">
                        
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if($_SESSION['level']==0){
                                    if(isset($_POST['filter_btn'])){
                                        foreach($_POST as $key => $value){
                                            $_POST[$key] = _cleaninjections(trim($value));
                                        }
                                        $value_filter = $_POST['filter_value'];
                                        $sql = "SELECT * FROM users WHERE concat(id,username,email,first_name,last_name,department) LIKE '%$value_filter%' ORDER BY department";
                                    }
                                    else{
                                    $sql = 'SELECT * FROM users ORDER BY department';
                                    }
                                }
                                else{
                                    if(isset($_POST['filter_btn'])){
                                        $value_filter = $_POST['filter_value'];
                                        $department = $_SESSION['department'];
                                        $sql = "SELECT * FROM users WHERE department='$department' && concat(id,username,email,first_name,last_name) LIKE '%$value_filter%' ORDER BY department";
                                    }else{
                                        $department = $_SESSION['department'];
                                        $sql = "SELECT * FROM users WHERE department='$department' ORDER BY department;";
                                    }
                                }
                                $results = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($results) > 0)
                                    {
                                        foreach($results as $employee)
                                        {
                                            $name = $employee['first_name']." ".$employee['last_name'];
                                            ?>
                                            <tr>
                                                <td><?= $employee['username']; ?></td>
                                                <td><?= $name; ?></td>
                                                <td><?= $employee['email']; ?></td>
                                                <td><?= $employee['department']; ?></td>
                                                <td>
                                                    <a href="view.php?id=<?= $employee['username']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="add?id=<?= $employee['username']; ?>" class="btn btn-info btn-sm">Add Marks</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include '../assets/layouts/footer.php'; ?>