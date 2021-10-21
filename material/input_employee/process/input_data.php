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

$nama                       = $_POST['nama'];
$email                      = $_POST['email'];
$flip_id                    = $_POST['flip_id'];
$start_kerja                = $_POST['start_kerja'];
$gender                     = $_POST['gender'];
$nik                        = $_POST['nik'];
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
$random_pass                = md5(1);

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

    $sql_check_biodata = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE email='$email'");
    if(mysqli_num_rows($sql_check_biodata) < 1) {
        $query_biodata = "INSERT INTO tb_biodata (id_nama , email, password, nama, flip_id, start_kerja, gender, tempat_lahir, tanggal_lahir, domisili_malang, alamat_lain, telpon, telpon_2, ibu, ayah, telpon_lain, status, agama, pendidikan, institusi, jurusan, riwayat_penyakit, divisi, role) 
        values 
        ( NULL, '$email', '$random_pass', '$nama', '$flip_id', '$start_kerja', '$gender', '$tempat_lahir','$tanggal_lahir','$domisili_malang','$alamat_lain','$telpon','$telpon_2','$ibu','$ayah','$telpon_lain','$status','$agama','$pendidikan','$institusi','$jurusan','$riwayat_penyakit', '', '')";
        mysqli_query($connect, $query_biodata);

        $check_id  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE email='$email'");
        while($row = mysqli_fetch_array($check_id)){
            $param_id = $row['id_nama'];
            $query_account = "INSERT INTO tb_account (id_account, id_nama , email, pass, role) 
            values 
            ( NULL, '$param_id', '$email', '$random_pass', 'Team')";
            mysqli_query($connect, $query_account);
        }

        mysqli_query($connect, "DELETE FROM `tb_biodata` WHERE nama=''");
        mysqli_query($connect, "DELETE FROM `tb_account` WHERE email=''");
    }else{}
}else{
    $sql_check_biodata = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE email='$email'");
    if(mysqli_num_rows($sql_check_biodata) < 1) {
        $query_biodata = "INSERT INTO tb_biodata (id_nama , email, password, nama, flip_id, start_kerja, gender, tempat_lahir, tanggal_lahir, domisili_malang, alamat_lain, telpon, telpon_2, ibu, ayah, telpon_lain, status, agama, pendidikan, institusi, jurusan, riwayat_penyakit, divisi, role) 
        values 
        ( NULL, '$email', '$random_pass', '$nama', '$flip_id', '$start_kerja', '$gender', '$tempat_lahir','$tanggal_lahir','$domisili_malang','$alamat_lain','$telpon','$telpon_2','$ibu','$ayah','$telpon_lain','$status','$agama','$pendidikan','$institusi','$jurusan','$riwayat_penyakit', '', '')";
        mysqli_query($connect, $query_biodata);

        $check_id  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE email='$email'");
        while($row = mysqli_fetch_array($check_id)){
            $param_id = $row['id_nama'];
            $query_account = "INSERT INTO tb_account (id_account, id_nama , email, pass, role) 
            values 
            ( NULL, '$param_id', '$email', '$random_pass', 'Team')";
            mysqli_query($connect, $query_account);
        }

        mysqli_query($connect, "DELETE FROM `tb_biodata` WHERE nama=''");
        mysqli_query($connect, "DELETE FROM `tb_account` WHERE email=''");
    }else{}
}

header("location: ../../../../Dashboard Fee/material/add_team/");    