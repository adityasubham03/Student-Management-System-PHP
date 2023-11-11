<?php
define('TITLE', "View User");
include '../assets/layouts/navbar.php';
check_verified();
if($_SESSION['level']==2){
    header("Location: ../");
}

$id = $_GET['id'];
?>


<div class="container mt-5">
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Marks Details of <?php echo $_GET['id'] ?>
                        <a href="add?id=<?php echo $_GET['id'] ?>" class="btn btn-primary float-end">Add Marks</a>
                        </h4>
                    </div>
                    <div class="card-body">
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
                                    <th>Semester</th>
                                    <th>Subject</th>
                                    <th>Marks</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM marks WHERE username='$id' ORDER BY username,semester,`type`";
                                $results = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($results) > 0)
                                    {
                                        foreach($results as $employee)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $employee['username']; ?></td>
                                                <td><?= $employee['semester']; ?></td>
                                                <td><?= $employee['subject']; ?></td>
                                                <td><?= $employee['marks']; ?></td>
                                                <?php if($employee['type']==0){?>
                                                    <td>Midsem</td>
                                                <?php } else{?>
                                                    <td>Endsem</td>
                                                <?php }?>
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


<?php

include '../assets/layouts/footer.php';

?>