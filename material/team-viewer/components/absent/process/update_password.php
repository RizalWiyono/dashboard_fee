
<?php
session_start();

include '../../../../../src/connection/connection.php';

$email = $_POST['email'];
$date = $_POST['date'];
$password = md5($_POST['pass']);

mysqli_query($connect, "UPDATE tb_account SET pass = '$password' WHERE email = '$email'");

header("location: ../?date=$date");    
