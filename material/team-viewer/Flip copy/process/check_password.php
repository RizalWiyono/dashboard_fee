
<?php

include '../../../src/connection/connection.php';

$email = $_POST['param_email'];

$query_check  = mysqli_query($connect, "SELECT * FROM tb_account WHERE email='$email'");
while($row = mysqli_fetch_array($query_check)){
    $pass = $row['pass'];
}

$output[] = [
    'pass'   => $pass,
];

echo json_encode($output);
