<?php include '../../../../../src/connection/connection.php';

if($_FILES['file']['name'])
    {
        $filename = explode(".", $_FILES['file']['name']);
        if($filename[1] == 'csv')
        {

            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while($data = fgetcsv($handle))
            {
                $email                  = mysqli_real_escape_string($connect, $data[1]);  
                $pass_def               = mysqli_real_escape_string($connect, $data[2]);
                $nama_lengkap           = mysqli_real_escape_string($connect, $data[3]);
                $flip_id                = mysqli_real_escape_string($connect, $data[4]);  
                $start_kerja            = mysqli_real_escape_string($connect, $data[5]);  
                $gender                 = mysqli_real_escape_string($connect, $data[6]);  
                $tempat_lahir           = mysqli_real_escape_string($connect, $data[7]);
                $tgl_lahir              = mysqli_real_escape_string($connect, $data[8]);
                $domisi_malang          = mysqli_real_escape_string($connect, $data[9]);
                $alamat_malang          = mysqli_real_escape_string($connect, $data[10]);
                $no_hp1                 = mysqli_real_escape_string($connect, $data[11]);
                $no_hp2                 = mysqli_real_escape_string($connect, $data[12]);
                $nama_ibu               = mysqli_real_escape_string($connect, $data[13]);
                $nama_ayah              = mysqli_real_escape_string($connect, $data[14]);
                $no_hp_keluarga         = mysqli_real_escape_string($connect, $data[15]);
                $status                 = mysqli_real_escape_string($connect, $data[16]);
                $agama                  = mysqli_real_escape_string($connect, $data[17]);
                $pendidikan             = mysqli_real_escape_string($connect, $data[18]);
                $institusi              = mysqli_real_escape_string($connect, $data[19]);
                $jurusan                = mysqli_real_escape_string($connect, $data[20]);
                $riwayat_penyakit       = mysqli_real_escape_string($connect, $data[21]);
                $division               = mysqli_real_escape_string($connect, $data[22]);
                $role                   = mysqli_real_escape_string($connect, $data[23]);
                $pass_md = md5($pass_def);

                if($email !== 'Email' && $email !== ''){
                    $sql_check_biodata = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE email='$email'");
                    if(mysqli_num_rows($sql_check_biodata) < 1) {
                    $query_biodata = "INSERT INTO tb_biodata (id_nama , email, password, nama, flip_id, start_kerja, gender, tempat_lahir, tanggal_lahir, domisili_malang, alamat_lain, telpon, telpon_2, ibu, ayah, telpon_lain, status, agama, pendidikan, institusi, jurusan, riwayat_penyakit, divisi, role) 
                    values 
                    ( NULL, '$email', '$pass_md', '$nama_lengkap', '$flip_id', '$start_kerja', '$gender', '$tempat_lahir','$tgl_lahir','$domisi_malang','$alamat_malang','$no_hp1','$no_hp2','$nama_ibu','$nama_ayah','$no_hp_keluarga','$status','$agama','$pendidikan','$institusi','$jurusan','$riwayat_penyakit', '$division', '$role')";
                    mysqli_query($connect, $query_biodata);
                    }else{}
                }


                if($email !== 'Email' && $email !== ''){
                    $sql_check_biodata = mysqli_query($connect, "SELECT * FROM account WHERE email='$email'");
                    if(mysqli_num_rows($sql_check_biodata) < 1) {
                        $check_id  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE email='$email'");
                        while($row = mysqli_fetch_array($check_id)){
                            $param_id = $row['id_nama'];
                            $query_account = "INSERT INTO tb_account (id_account, id_nama , email, pass, role) 
                            values 
                            ( NULL, '$param_id', '$email', '$pass_md', 'User')";
                            mysqli_query($connect, $query_account);
                        }
                    }
                }

                mysqli_query($connect, "DELETE FROM `tb_biodata` WHERE nama=''");
                mysqli_query($connect, "DELETE FROM `tb_account` WHERE email=''");
                
            }
        }
    }