<?php
    clearstatcache();
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

$id                         = $_POST['id'];
$nama                       = $_POST['nama'];
$email                      = $_POST['email'];
$flip_id                    = $_POST['flip_id'];
$start_kerja                = $_POST['start_kerja'];
$gender                     = $_POST['gender'];
$tempat_lahir               = $_POST['tempat_lahir'];
$tanggal_lahir              = $_POST['tanggal_lahir'];
$telpon                     = $_POST['telpon'];
$telpon_2                   = $_POST['telpon_2'];
$domisili_malang            = htmlspecialchars($_POST['domisili_malang']);
$alamat_lain                = htmlspecialchars($_POST['alamat_lain']);
$ibu                        = $_POST['ibu'];
$ayah                       = $_POST['ayah'];
$telpon_lain                = $_POST['telpon_lain'];
$status                     = $_POST['status'];
$agama                      = $_POST['agama'];
$pendidikan                 = $_POST['pendidikan'];
$institusi                  = $_POST['institusi'];
$jurusan                    = $_POST['jurusan'];
$riwayat_penyakit           = $_POST['riwayat_penyakit'];


if($_FILES["image"]["name"] !== ''){
    $var1 = rand(1111,9999);
    $var2 = rand(1111,9999);
    
    $var3 = $var1.$var2;
    $var3 = md5($var3);
    
    $fnm = $_FILES["image"]["name"];
    $dst = "../../../src/image/profile/".$var3.$fnm;
    $dst_db = "../../src/image/profile/".$var3.$fnm;
    
    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);

    $query_image = "INSERT INTO tb_image (id_image, id_nama, image) 
    values 
    (NULL, '$id', '$dst_db')";
    mysqli_query($connect, $query_image);
        
    mysqli_query($connect, "UPDATE tb_biodata SET nama='$nama', email='$email', flip_id='$flip_id', gender='$gender', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', 
    telpon='$telpon', telpon_2='$telpon_2', domisili_malang='$domisili_malang', alamat_lain='$alamat_lain', ibu='$ibu', ayah='$ayah', telpon_lain='$telpon_lain', status='$status', 
    agama='$agama', pendidikan='$pendidikan', institusi='$institusi', jurusan='$jurusan', riwayat_penyakit='$riwayat_penyakit', start_kerja='$start_kerja' WHERE id_nama = '$id'");

}else{
    mysqli_query($connect, "UPDATE tb_biodata SET nama='$nama', email='$email', flip_id='$flip_id', gender='$gender', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', 
    telpon='$telpon', telpon_2='$telpon_2', domisili_malang='$domisili_malang', alamat_lain='$alamat_lain', ibu='$ibu', ayah='$ayah', telpon_lain='$telpon_lain', status='$status', 
    agama='$agama', pendidikan='$pendidikan', institusi='$institusi', jurusan='$jurusan', riwayat_penyakit='$riwayat_penyakit', start_kerja='$start_kerja' WHERE id_nama = '$id'");
}

header("location: ../?id=".$id);    