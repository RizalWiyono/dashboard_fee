
<?php
session_start();

include '../../../../../src/connection/connection.php';

$p_id = $_POST['param-id'];

mysqli_query($connect, "UPDATE tb_absent SET status = 'Reject' WHERE id_absent = '$p_id'");

header("location: ../index.php");    
