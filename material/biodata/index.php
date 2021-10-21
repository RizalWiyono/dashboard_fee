<?php
    include '../../src/connection/connection.php';
    clearstatcache();

    session_start();
    
    if(!isset($_SESSION['email']) ) {
        header('location: ../login/login.php');
        exit;
    }else{
        if($_SESSION['role'] == 'Team'){
            header('location: ../team-viewer/');
        }
    }

?>

<html>
<head>
    <title>Fee RRGraph - Biodata</title> 
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../src/image/Group 38.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&family=Poppins:wght@100;300;600&display=swap" rel="stylesheet">
    
    <!-- View -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="../../src/css/bootstrap.min.css">

</head>
<body>
    <div class="grid-content">
        <nav align="center">
            <div class="item"  align="center">
                <div class="logo">
		    <a href="/Dashboard%20Fee/material/Dashboard">
                        <img src="../../src/image/LOGO-1.svg"/>
                    </a>
		</div>
                
                <ul>
                    <li class="" data-toggle="tooltip" data-placement="right" title="Dashboard (coming soon)" id="tool-market">
                        <a data-toggle="modal" data-target="#progress" style="cursor: pointer;">
                            <canvas class="logo-dashboard"></canvas>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="Personalia" id="tool-freebies">
                        <a href="../add_team/">
                            <canvas class="logo-personalia-active"></canvas>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="Salary" id="tool-newsletter">
                        <a href="../salary/?elements=report">
                            <canvas class="logo-salary"></canvas>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="User Permission" id="tool-team">
                        <a href="../user_permission/">
                            <canvas class="logo-user"></canvas>
                        </a>
                    </li>
                    
                    <div class="notif-team" id="notif-place"><p id="notif"></p></div>

                    <li class="sect-bottom" data-toggle="tooltip" data-placement="right" title="Initialization Setup" id="tool-sync">
                        <a href="../initialization_setup/index.php?elements=role">
                            <canvas class="logo-setting"></canvas>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <main class="main-middler-full">
            <div class="main-container">
                <div class="main-content-middler" align="center">
                    <div class="content-middler" >

                        <div class="main-header-biodata" align="left">

                            <a class="linked-biodata-active" href="../add_team/?id=<?=$_GET['id']?>">
                                Personalia
                            </a>
                            <a class="linked-biodata float-right" href="../add_team/?id=<?=$_GET['id']?>">
                                < Back
                            </a>
                            
                        </div>

                        <?php
                        $param = $_GET['id'];
                        $query_biodatapeople  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE tb_biodata.id_nama='$param'");
                        while($row = mysqli_fetch_array($query_biodatapeople)){
                            if(isset($_GET['edit'])){
                        ?>
                                <form action="process/input_data.php" method="POST"  enctype="multipart/form-data">
                                <div class="main-biodata">
                                    <div class="left-place">
                                        <div class="place-image">
                                        
                                        <?php
                                        $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$param' ORDER BY id_image DESC LIMIT 1");
                                        if(mysqli_num_rows($sql_check_img) < 1) {
                                        ?>
                                            <div class="profile-pic-div">
                                                <?php
                                                if($row['gender'] == 'm'){
                                                ?>
                                                <img src="../../src/image/MAN-IC.svg" id="photo">
                                                <?php
                                                }elseif($row['gender'] == 'w'){
                                                ?>
                                                <img src="../../src/image/WOMAN-IC.svg" id="photo">
                                                <?php
                                                }elseif($row['gender'] == 'Pria'){
                                                ?>
                                                <img src="../../src/image/Man-IC.svg" id="photo">
                                                <?php
                                                }elseif($row['gender'] == 'Perempuan'){
                                                ?>
                                                <img src="../../src/image/WOMAN-IC.svg" id="photo">
                                                <?php
                                                }
                                                ?>
                                                <input type="file" id="file" name="image" >
                                                <label for="file" id="uploadBtn"><img src="../../src/image/CAMERA.svg" alt=""></label>
                                            </div>

                                        <?php
                                        }else{
                                            $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$param' ORDER BY id_image DESC LIMIT 1");
                                            while($img = mysqli_fetch_array($query_img)){
                                        ?>

                                            <div class="profile-pic-div">
                                                <img src="<?=$img['image']?>" id="photo">
                                                <input type="file" id="file" name="image" >
                                                <label for="file" id="uploadBtn"><img src="../../src/image/CAMERA.svg" alt=""></label>
                                            </div>

                                        <?php
                                            }
                                        }
                                        ?>

                                            <div class="identity" align="left">
                                                <h1><?=$row['nama']?></h1>
                                                <?php
                                                if($row['start_kerja'] == ''){
                                                ?>
                                                <p>Length of work: <strong>-</strong></p>
                                                <?php
                                                }else{
                                                    $dates = str_replace('/', '-', $row['start_kerja']);

                                                    $orgDate = $dates;  
                                                    $newDate = date("Y-m-d", strtotime($orgDate));  
        
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    $date_ac= date("Y-m-d");
        
                                                    $diff = abs(strtotime($newDate) - strtotime($date_ac));
        
                                                    $years = floor($diff / (365*60*60*24));
                                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                                    if($years == 0){
                                                    ?>
                                                    <p>Length of work: <strong><?=$months?> Months</strong></p>
                                                    <?php
                                                    }elseif($months == 0){
                                                    ?>
                                                    <p>Length of work: <strong><?=$years?> Years</strong></p>
                                                    <?php 
                                                    }else{
                                                    ?>
                                                    <p>Length of work: <strong><?=$years?> Years <?=$months?> Months</strong></p>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                <div class="title-place" style="display: flex;">
                                                    <h2><?=$row['divisi']?></h2>
                                                    <h3><?=$row['role']?></h3>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="main-sales" align="center">
                                            <div class="distance-content">
                                                <table class="table-biodata table">
                                                    <thead>
                                                        <tr class="title-table">
                                                            <th colspan="2">Personal Information</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <input name="id" type="text" class="form-biodata d-none" value="<?=$_GET['id']?>">
                                                            <td><p class="font-weight-bold text-body">Name</p></td>
                                                            <td>: <input name="nama" type="text" class="form-biodata" value="<?=$row['nama']?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Email</p></td>
                                                            <td>: <input name="email" type="text" class="form-biodata" value="<?=$row['email']?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Flip Id</p></td>
                                                            <td>: <input name="flip_id" type="text" class="form-biodata" value="<?=$row['flip_id']?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Join Date</p></td>
                                                            <td>: <input name="start_kerja" type="date" class="form-biodata" value="<?=$row['start_kerja']?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Jenis Kelamin</p></td>
                                                            <?php
                                                            if($row['gender'] == 'm'){
                                                            ?>
                                                            <td>: <input name="gender" type="text" class="form-biodata" value="Pria"></td>
                                                            <?php
                                                            }elseif($row['gender'] == 'w'){
                                                            ?>
                                                            <td>: <input name="gender" type="text" class="form-biodata" value="Perempuan"></td>
                                                            <?php  
                                                            }elseif($row['gender'] == 'Pria'){
                                                            ?>
                                                            <td>: <input name="gender" type="text" class="form-biodata" value="Pria"></td>
                                                            <?php  
                                                            }elseif($row['gender'] == 'Perempuan'){
                                                            ?>
                                                            <td>: <input name="gender" type="text" class="form-biodata" value="Perempuan"></td>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Identitas Diri</p></td>
                                                            <td>: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Tempat Lahir</p></td>
                                                            <td>: <input name="tempat_lahir" type="text" class="form-biodata" value="<?=$row['tempat_lahir']?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Tanggal Lahir</p></td>
                                                            <td>: <input name="tanggal_lahir" type="date" class="form-biodata" value="<?=$row['tanggal_lahir']?>"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <input type="submit" class="btn-detail float-left" value="Save">

                                    </div>

                                    <div class="right-place">
                                        <div class="image-place">
                                            <div class="main-sales" style="margin-top: 0;" align="center">
                                                <div class="distance-content">
                                                    <table class="table-biodata table">
                                                        <thead>
                                                            <tr class="title-table">
                                                                <th colspan="2">Contact Information</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Phone number 1</p></td>
                                                                <td>: <input name="telpon" type="text" class="form-biodata" value="<?=$row['telpon']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Phone number 2</p></td>
                                                                <td>: <input name="telpon_2" type="text" class="form-biodata" value="<?=$row['telpon_2']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Domiciled in Malang</p></td>
                                                                <td>: <textarea class="form-biodata" name="domisili_malang" id="" cols="19" rows="5"><?=$row['domisili_malang']?></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Hometown</p></td>
                                                                <td>: <textarea class="form-biodata" name="alamat_lain" id="" cols="19" rows="5"><?=$row['alamat_lain']?></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Mother Name</p></td>
                                                                <td>: <input name="ibu" type="text" class="form-biodata" value="<?=$row['ibu']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Father Name</p></td>
                                                                <td>: <input name="ayah" type="text" class="form-biodata" value="<?=$row['ayah']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Other Contacts</p></td>
                                                                <td>: <input name="telpon_lain" type="text" class="form-biodata" value="<?=$row['telpon_lain']?>"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="main-sales" align="center">
                                                <div class="distance-content">
                                                    <table class="table-biodata table">
                                                        <thead>
                                                            <tr class="title-table">
                                                                <th colspan="2">Additional Information</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Status</p></td>
                                                                <td>: <input name="status" type="text" class="form-biodata" value="<?=$row['status']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Religion</p></td>
                                                                <td>: <input name="agama" type="text" class="form-biodata" value="<?=$row['agama']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Last Education</p></td>
                                                                <td>: <input name="pendidikan" type="text" class="form-biodata" value="<?=$row['pendidikan']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Name of Institution</p></td>
                                                                <td>: <input name="institusi" type="text" class="form-biodata" value="<?=$row['institusi']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Majors Courses</p></td>
                                                                <td>: <input name="jurusan" type="text" class="form-biodata" value="<?=$row['jurusan']?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">History of Disease</p></td>
                                                                <td>: <input name="riwayat_penyakit" type="text" class="form-biodata" value="<?=$row['riwayat_penyakit']?>"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                        <?php
                            }else{
                            ?>
                                <div class="main-biodata" style="display: flex; justify-content: space-between; margin-top: 3%;">
                                    <div class="left-place" style="width: 45%;">
                                        <div class="place-image" style="width: 100%; display: flex;">

                                        <?php
                                        $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$param' ORDER BY id_image DESC LIMIT 1");
                                        if(mysqli_num_rows($sql_check_img) < 1) {
                                        ?>

                                            <div class="profile-pic-div">
                                                <?php
                                                if($row['gender'] == 'm'){
                                                ?>
                                                <img src="../../src/image/MAN-IC.svg" id="photo">
                                                <?php
                                                }elseif($row['gender'] == 'w'){
                                                ?>
                                                <img src="../../src/image/WOMAN-IC.svg" id="photo">
                                                <?php
                                                }elseif($row['gender'] == 'Pria'){
                                                ?>
                                                <img src="../../src/image/Man-IC.svg" id="photo">
                                                <?php
                                                }elseif($row['gender'] == 'Perempuan'){
                                                ?>
                                                <img src="../../src/image/WOMAN-IC.svg" id="photo">
                                                <?php
                                                }
                                                ?>
                                            </div>

                                            <?php
                                            }else{
                                                $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$param' ORDER BY id_image DESC LIMIT 1");
                                                while($img = mysqli_fetch_array($query_img)){
                                            ?>

                                                <div class="profile-pic-div">
                                                    <img src="<?=$img['image']?>" id="photo">
                                                </div>

                                            <?php
                                                }
                                            }
                                            ?>

                                            <div class="identity" align="left" style="margin-left: 3%; margin-top: 2%;">
                                                <h1><?=$row['nama']?></h1>
                                                <?php
                                                if($row['start_kerja'] == ''){
                                                ?>
                                                <p>Length of work: <strong>-</strong></p>
                                                <?php
                                                }else{
                                                    $dates = str_replace('/', '-', $row['start_kerja']);

                                                    $orgDate = $dates;  
                                                    $newDate = date("Y-m-d", strtotime($orgDate));  
        
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    $date_ac= date("Y-m-d");
        
                                                    $diff = abs(strtotime($newDate) - strtotime($date_ac));
        
                                                    $years = floor($diff / (365*60*60*24));
                                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                                    if($years == 0){
                                                    ?>
                                                    <p>Length of work: <strong><?=$months?> Months</strong></p>
                                                    <?php
                                                    }elseif($months == 0){
                                                    ?>
                                                    <p>Length of work: <strong><?=$years?> Years</strong></p>
                                                    <?php 
                                                    }else{
                                                    ?>
                                                    <p>Length of work: <strong><?=$years?> Years <?=$months?> Months</strong></p>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                <div class="title-place" style="display: flex;">
                                                    <h2><?=$row['divisi']?></h2>
                                                    <h3><?=$row['role']?></h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="main-sales" align="center">
                                            <div class="distance-content">
                                                <table class="table-biodata table">
                                                    <thead>
                                                        <tr class="title-table">
                                                            <th colspan="2">Personal Information</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Name</p></td>
                                                            <td>: <?=$row['nama']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Email</p></td>
                                                            <td>: <?=$row['email']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Flip Id</p></td>
                                                            <td>: <?=$row['flip_id']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Join Date</p></td>
                                                            <td>: <?=$row['start_kerja']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Jenis Kelamin</p></td>
                                                            <?php
                                                            if($row['gender'] == 'm'){
                                                            ?>
                                                            <td>: Pria</td>
                                                            <?php
                                                            }elseif($row['gender'] == 'w'){
                                                            ?>
                                                            <td>: Perempuan</td>
                                                            <?php  
                                                            }elseif($row['gender'] == 'Pria'){
                                                            ?>
                                                            <td>: Pria</td>
                                                            <?php  
                                                            }elseif($row['gender'] == 'Perempuan'){
                                                            ?>
                                                            <td>: Perempuan</td>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Identitas Diri</p></td>
                                                            <td>: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Tempat Lahir</p></td>
                                                            <td>: <?=$row['tempat_lahir']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Tanggal Lahir</p></td>
                                                            <td>: <?=$row['tanggal_lahir']?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <a class="btn-detail float-left" href="?edit=biodata&&id=<?=$_GET['id']?>">
                                            Edit Data
                                        </a>
                                    </div>

                                    <div class="right-place" style="width: 53%;">
                                        <div class="image-place">
                                            <div class="main-sales" style="margin-top: 0;" align="center">
                                                <div class="distance-content">
                                                    <table class="table-biodata table">
                                                        <thead>
                                                            <tr class="title-table">
                                                                <th colspan="2">Contact Information</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Phone number 1</p></td>
                                                                <td>: <?=$row['telpon']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Phone number 2</p></td>
                                                                <td>: <?=$row['telpon_2']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Domiciled in Malang</p></td>
                                                                <td>: <?=$row['domisili_malang']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Hometown</p></td>
                                                                <td>: <?=$row['alamat_lain']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Mother Name</p></td>
                                                                <td>: <?=$row['ibu']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Father Name</p></td>
                                                                <td>: <?=$row['ayah']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Other Contacts</p></td>
                                                                <td>: <?=$row['telpon_lain']?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="main-sales" align="center">
                                                <div class="distance-content">
                                                    <table class="table-biodata table">
                                                        <thead>
                                                            <tr class="title-table">
                                                                <th colspan="2">Additional Information</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Status</p></td>
                                                                <td>: <?=$row['status']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Religion</p></td>
                                                                <td>: <?=$row['agama']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Last Education</p></td>
                                                                <td>: <?=$row['pendidikan']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Name of Institution</p></td>
                                                                <td>: <?=$row['institusi']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Majors Courses</p></td>
                                                                <td>: <?=$row['jurusan']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">History of Disease</p></td>
                                                                <td>: <?=$row['riwayat_penyakit']?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </main>

    <script type="text/javascript" src="js/app.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../src/js/tooltip.js"></script> 
</body>
</html>