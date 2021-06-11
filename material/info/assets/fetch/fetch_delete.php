<?php include '../../../../../src/connection/connection.php';

$param_id        = $_POST['param_id'];

    mysqli_query($connect, "DELETE FROM tb_account WHERE id_nama = '$param_id'");
