<?php include '../../../../../src/connection/connection.php';

$par_id             = $_POST['param_id'];
$par_basic_fee      = $_POST['param_basic_fee'];
$par_transport      = $_POST['param_transport'];

mysqli_query($connect, "UPDATE tb_role SET basic_fee = '$par_basic_fee', transport = '$par_transport' WHERE id_role = '$par_id'");