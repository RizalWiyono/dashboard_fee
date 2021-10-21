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

// Division 

if($_POST['param'] == 'edit'){
    $email   = $_POST['email'];
    $id_a    = $_POST['id_a'];
    $id_n    = $_POST['id_n'];
    $flip    = $_POST['flip_id'];
    $pass    = md5($_POST['password']);
    $role    = $_POST['role'];

    mysqli_query($connect, "UPDATE tb_account SET email = '$email', pass = '$pass', role = '$role' WHERE id_account = '$id_a' && id_nama = '$id_n'");
    mysqli_query($connect, "UPDATE tb_biodata SET email = '$email', password = '$pass', flip_id = '$flip' WHERE id_nama = '$id_n'");

    header("location: ../");   

}elseif ($_POST['param'] == 'delete'){
    $id = $_POST['id'];

    mysqli_query($connect, "DELETE FROM tb_account WHERE id_account = '$id'");

    header("location: ../index.php?elements=role");    

}
