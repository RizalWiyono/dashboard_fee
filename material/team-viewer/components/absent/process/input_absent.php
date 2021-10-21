
<?php
session_start();

include '../../../../../src/connection/connection.php';

$p_name = $_POST['param-name'];
$ic_happen = $_POST['ic-happen'];
$explanation = $_POST['explanation'];
$date = $_POST['date'];
$time = $_POST['time'];
$feeling = $_POST['happen'];
$condition = $_POST['condition'];

if($condition == "in"){
    mysqli_query($connect, "INSERT INTO tb_absent (id_absent, id_nama, explanation, date, time, feeling, icon, status) 
    values 
    ( NULL, $p_name, '$explanation', '$date', '$time', '$feeling', '$ic_happen', 'Pending')");
}else{
    mysqli_query($connect, "INSERT INTO tb_absent (id_absent, id_nama, explanation, date, time, feeling, icon, status) 
    values 
    ( NULL, $p_name, '$explanation', '$date', '$time', '$feeling', '$ic_happen', 'Pending')");
}


header("location: ../index.php");    
