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
$par_person           = $_POST['param_person'];

$sql_check_person = mysqli_query($connect, "SELECT * FROM tb_member WHERE id_nama='$par_id'");
if(mysqli_num_rows($sql_check_person) < 1) {
    $query_person = "INSERT INTO tb_member (id_member, id_responsible, code_name, id_nama) 
    values 
    ( NULL, $par_person, '', '$par_id')";
    mysqli_query($connect, $query_person);
}else{
    mysqli_query($connect, "UPDATE tb_member SET id_responsible = '$par_person' WHERE id_nama = '$par_id'");
}

echo json_encode($output);
