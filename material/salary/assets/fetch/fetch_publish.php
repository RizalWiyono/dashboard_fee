<?php include '../../../../../src/connection/connection.php';

$id  = $_POST['param_id'];
$id_fee  = $_POST['param_id_fee'];
$id_role  = $_POST['param_id_role'];
$code  = $_POST['param_code'];

mysqli_query($connect, "UPDATE tb_fee SET status='Publish' WHERE id_nama='$id' && id_fee='$id_fee' && id_role='$id_role' && code='$code'");

$query = "INSERT INTO tb_activity (id_activity, username) 
values 
( '$code', 'Heki')";
mysqli_query($connect, $query);