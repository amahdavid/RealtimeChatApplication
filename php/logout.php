<?php

    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once('config.php');
        $logout_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $status = "Offline now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$_SESSION['unique_id']}");
        if($sql){
            session_unset();
            session_destroy();
            header("location: ../html/loginPage.php");
        }
    }else{
        header("location: ../html/loginPage.php");
    }

?>