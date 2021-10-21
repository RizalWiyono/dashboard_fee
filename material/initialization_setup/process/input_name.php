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

// Add New
    $name         = $_POST['name'];

    $query_input = "INSERT INTO tb_person_responsible (id_responsible, id_nama) 
    values 
    ( NULL, '$name' )";
    mysqli_query($connect, $query_input) or trigger_error("Query Failed! SQL: $query_input - Error: ".mysqli_error($connect), E_USER_ERROR);
    

    header("location: ../index.php?elements=pj");   
