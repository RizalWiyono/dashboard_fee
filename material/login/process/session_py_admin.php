<?php

include '../../../src/connection/connection.php';

session_start();

if(!isset($_SESSION['email']) ) {
    header('location: ../login/login.php');
    exit;
}else{
    if($_SESSION['role'] == 'Admin'){
        $query_check_admin  = mysqli_query($connect, "SELECT * FROM tb_level WHERE id_level=1");
        while($c_admin = mysqli_fetch_array($query_check_admin)){
            if($c_admin['payroll_admin'] == 'Active'){
                header('location: ../team-viewer/');
            }else{
                header('location: ../login/login.php');
            }
        }
    }elseif($_SESSION['role'] == 'Analytics'){
        $query_check_analytics  = mysqli_query($connect, "SELECT * FROM tb_level WHERE id_level=2");
        while($c_analytics = mysqli_fetch_array($query_check_analytics)){
            if($c_analytics['payroll_admin'] == 'Active'){
                header('location: ../team-viewer/');
            }else{
                header('location: ../login/login.php');
            }
        }
    }elseif($_SESSION['role'] == 'User'){
        $query_check_user  = mysqli_query($connect, "SELECT * FROM tb_level WHERE id_level=1");
        while($c_user = mysqli_fetch_array($query_check_user)){
            if($c_user['payroll_admin'] == 'Active'){
                header('location: ../team-viewer/');
            }else{
                header('location: ../login/login.php');
            }
        }
    }
    
}