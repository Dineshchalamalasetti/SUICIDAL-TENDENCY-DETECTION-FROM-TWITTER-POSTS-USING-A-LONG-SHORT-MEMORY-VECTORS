<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mainproject";
    $con = new mysqli($host,$username,$password,$dbname);
    if($con->connect_error){
        die("Connect Failed:".$con->connect_error);
    }
?>