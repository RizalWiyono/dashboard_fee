<?php include '../../../../../src/connection/connection.php';

$id = $_POST['id'];

$query="SELECT * FROM tb_role WHERE id_division=$id";
$result = mysqli_query($connect, $query);
while($row =mysqli_fetch_array($result)) {

    if(mysqli_num_rows($result) < 1) {
        $output[] = [
            'subcategory_id'  => 'ss',
            'name'  => 'sss',
        ];
    }else{
        $output[] = [
            'subcategory_id'  => $row["id_role"],
            'name'  => $row["role_name"],
        ];
    }
    
}
$respon = [
    "status" => 200,
    "data"   => $output
];

echo json_encode($respon); ?>