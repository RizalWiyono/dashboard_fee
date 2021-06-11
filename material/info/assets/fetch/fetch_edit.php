<?php include '../../../../../src/connection/connection.php';
$param_id        = $_POST['param_id'];
$param_email     = $_POST['param_email'];
$param_flip      = $_POST['param_flip'];
$param_password  = md5($_POST['param_password']);
$param_level     = $_POST['param_level'];

$query_biodata  = mysqli_query($connect, "SELECT * FROM tb_account WHERE id_nama='$param_id'");
while($row = mysqli_fetch_array($query_biodata)){
    $pass = $row['pass'];

    if($pass == $_POST['param_password']){
        mysqli_query($connect, "UPDATE tb_biodata SET email = '$param_email', flip_id='$param_flip' WHERE id_nama = '$param_id'");
        mysqli_query($connect, "UPDATE tb_account SET email = '$param_email', role = '$param_level' WHERE id_nama = '$param_id'");
    }else{
        mysqli_query($connect, "UPDATE tb_biodata SET email = '$param_email', flip_id='$param_flip', password='$param_password'  WHERE id_nama = '$param_id'");
        mysqli_query($connect, "UPDATE tb_account SET email = '$param_email', pass = '$param_password', role = '$param_level' WHERE id_nama = '$param_id'");
    }
}