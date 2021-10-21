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
// $par_img            = $_POST['param_img'];
$para_division      = $_POST['param_division'];
$par_role           = $_POST['param_role'];

// $output[] = [
//     'month'   => $par_id,
//     'TOTAL'  => $para_division,
//     'JUMLAH'  => $par_role,
// ];

$query_division  = mysqli_query($connect, "SELECT * FROM tb_division WHERE id_division='$para_division'");
while($row = mysqli_fetch_array($query_division)){
    $par_division = $row['division_name'];
}

mysqli_query($connect, "UPDATE tb_biodata SET divisi = '$par_division', role = '$par_role'  WHERE id_nama = '$par_id'");

$query_role  = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$para_division' && role_name='$par_role'");
while($row = mysqli_fetch_array($query_role)){
    $para_role = $row['id_role'];
}

$sql_check = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$par_id'");
if(mysqli_num_rows($sql_check) < 1) {
    $query = "INSERT INTO tb_fee (id_fee, id_role, id_nama, date, basic_fee, transport_fee, absent, overtime, bounty, min_jaminan, min_cashbon, tip, thr, total, more, note, status) 
    values 
    ( NULL, $para_role, '$par_id', '', '', '', '', '','','','','', '', '', '', '', '')";
    mysqli_query($connect, $query);
}else{
    mysqli_query($connect, "UPDATE tb_fee SET id_role = '$para_role' WHERE id_nama = '$par_id'");
}

echo json_encode($output);
