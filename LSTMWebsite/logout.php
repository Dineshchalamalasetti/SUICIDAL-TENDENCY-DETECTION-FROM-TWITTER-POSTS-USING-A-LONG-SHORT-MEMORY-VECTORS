<?php
    session_start();
    if(isset($_SESSION['username']) && $_SESSION['username']!=""){
        unset($_SESSION['username']);
        session_destroy();
        header("location:index.php");
    }else{
        header("location:index.php");
    }
?>