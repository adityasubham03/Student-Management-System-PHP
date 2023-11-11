<?php

session_start();

require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/auth_functions.php';
require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/datacheck.php';
require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/security_functions.php';

if(check_logged_in()){
    if (isset($_SESSION)) {
        if($_SESSION["auth"]!="verified"){
            header("Location: ../");
        }
        else{
            if($_SESSION["level"]!=0){
                header("Location: ../dashboard");
            }
        }
    }
    else {
        header("Location: ../");
    }
}


if (isset($_POST['depsubmit'])) {
    /*
    * -------------------------------------------------------------------------------
    *   Verifying CSRF token
    * -------------------------------------------------------------------------------
    */

    if (!verify_csrf_token()){

        $_SESSION['STATUS']['deletestatus'] = 'Request could not be validated';
        header("Location: ../");
        exit();
    }

    require $_SERVER['DOCUMENT_ROOT'].'/assets/setup/db.inc.php';
    
    //filter POST data
    function input_filter($data) {
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }
    
    $username = input_filter($_POST['user']);
    $subject = input_filter($_POST['subject']);
    $semester = input_filter($_POST['semester']);
    $marks = input_filter($_POST['marks']);
    $type = input_filter($_POST['type']);


        $sql = "INSERT INTO `marks`(`username`, `semester`, `subject`, `marks`, `type`) VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['ERRORS']['deletestatus'] = 'SQL ERROR';
            header("Location: ../");
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt,"sssss",$username,$semester,$subject,$marks,$type);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $greet = 'Marks added Successfully!!';
            $_SESSION['STATUS']['deletestatus'] = $greet;
            header("Location: ../");
            exit();
        }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 
else {

    header("Location: ../");
    exit();
}
