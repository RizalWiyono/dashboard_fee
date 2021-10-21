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

// Delete 
$param  = $_POST['param'];

$query = "DELETE FROM tb_person_responsible WHERE id_responsible=$param;";
mysqli_query($connect, $query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($connect), E_USER_ERROR);

header("location: ../index.php?elements=pj");   
