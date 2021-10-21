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

// Set Salary 

        if($_POST['param'] == 'set_salary'){
            $basic_fee = $_POST['basic_fee'];
            $transport = $_POST['transport'];
            $param_id  = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_role SET basic_fee = '$basic_fee', transport = '$transport' WHERE id_role = '$param_id'");

            header("location: ../index.php?elements=set");   

        }elseif($_POST['param_param'] == 'set_all_salary'){
            $par_id             = $_POST['param_id'];
            $par_basic          = $_POST['param_basic'];
            $para_transport     = $_POST['param_transport'];

            mysqli_query($connect, "UPDATE tb_role SET basic_fee = '$par_basic', transport = '$para_transport' WHERE id_role = '$par_id'");
        }


