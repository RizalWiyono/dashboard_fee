<?php
session_start();
    
if(!isset($_SESSION['email']) ) {
    header('location: ../../login/login.php');
    exit;
}else{
    if($_SESSION['role'] == 'Team'){
        header('location: ../../team-viewer/');
    }
}

include '../../../src/connection/connection.php';

$par_id             = $_POST['param_id'];
$par_name           = $_POST['level_name'];
if(isset($_POST['payroll_view'])){
    $par_checkbox1      = $_POST['payroll_view'];
}else{
    $par_checkbox1      = 'Not Active';
}

if(isset($_POST['payroll_admin'])){
    $par_checkbox2      = $_POST['payroll_admin'];
}else{
    $par_checkbox2      = 'Not Active';
}

if(isset($_POST['dashboard'])){
    $par_checkbox3      = $_POST['dashboard'];
}else{
    $par_checkbox3      = 'Not Active';
}

    mysqli_query($connect, "UPDATE tb_level SET level_name='$par_name', payroll_view='$par_checkbox1', payroll_admin='$par_checkbox2', dashboard='$par_checkbox3' WHERE id_level = '$par_id'");

header("location: ../index.php");
