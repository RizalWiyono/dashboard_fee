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
    <title>Fee RRGraph - Input Employee</title> 
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
                    <img src="../../src/image/LOGO-1.svg"/>
                </div>
                
                <ul>
                    <li class="" data-toggle="tooltip" data-placement="right" title="Dashboard (coming soon)" id="tool-market">
                        <a data-toggle="modal" data-target="#progress" style="cursor: pointer;">
                            <canvas class="logo-dashboard"></canvas>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="Personalia" id="tool-freebies">
                        <a href="../add_team/">
                            <canvas class="logo-personalia"></canvas>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="Salary" id="tool-newsletter">
                        <a href="../salary/?elements=report">
                            <canvas class="logo-salary"></canvas>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="User Permission" id="tool-team">
                        <a href="../user_permission/">
                            <canvas class="logo-user-active"></canvas>
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

                            <a class="linked-biodata-active" href="../add_team">
                                Personalia
                            </a>
                            <a class="linked-biodata float-right" href="../user_permission">
                                < Back
                            </a>
                            
                        </div>

                                <form action="process/input_data.php" method="POST"  enctype="multipart/form-data">
                                <div class="main-biodata">
                                    <div class="left-place">
                                        <div class="place-image">
                                        
                                            <div class="profile-pic-div">
                                                <img src="../../src/image/MAN-IC.svg" id="photo">
                                                <input type="file" id="file" name="image" >
                                                <label for="file" id="uploadBtn"><img src="../../src/image/CAMERA.svg" alt=""></label>
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
                                                            <input name="id" type="text" class="form-input-biodata d-none">
                                                            <td><p class="font-weight-bold text-body">Name</p></td>
                                                            <td>: <input name="nama" type="text" class="form-input-biodata"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Email</p></td>
                                                            <td>: <input name="email" type="email" class="form-input-biodata"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Flip Id</p></td>
                                                            <td>: <input name="flip_id" type="text" class="form-input-biodata"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Join Date</p></td>
                                                            <td>: <input name="start_kerja" type="date" class="form-input-biodata"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Jenis Kelamin</p></td>
                                                            <td>:
                                                                <select name="gender" class="form-input-biodata" id="">
                                                                    <option value=""></option>
                                                                    <option value="Pria">Pria</option>
                                                                    <option value="Wanita">Wanita</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">NIK</p></td>
                                                            <td>: <input name="nik" type="text" class="form-input-biodata"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Tempat Lahir</p></td>
                                                            <td>: <input name="tempat_lahir" type="text" class="form-input-biodata"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p class="font-weight-bold text-body">Tanggal Lahir</p></td>
                                                            <td>: <input name="tanggal_lahir" type="date" class="form-input-biodata"></td>
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
                                                                <td>: <input name="telpon" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Phone number 2</p></td>
                                                                <td>: <input name="telpon_2" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Domiciled in Malang</p></td>
                                                                <td>: <textarea class="form-input-biodata" name="domisili_malang" id="" cols="19" rows="5"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Hometown</p></td>
                                                                <td>: <textarea class="form-input-biodata" name="alamat_lain" id="" cols="19" rows="5"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Mother Name</p></td>
                                                                <td>: <input name="ibu" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Father Name</p></td>
                                                                <td>: <input name="ayah" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Other Contacts</p></td>
                                                                <td>: <input name="telpon_lain" type="text" class="form-input-biodata"></td>
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
                                                                <td>: <input name="status" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Religion</p></td>
                                                                <td>: <input name="agama" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Last Education</p></td>
                                                                <td>: <input name="pendidikan" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Name of Institution</p></td>
                                                                <td>: <input name="institusi" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">Majors Courses</p></td>
                                                                <td>: <input name="jurusan" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="font-weight-bold text-body">History of Disease</p></td>
                                                                <td>: <input name="riwayat_penyakit" type="text" class="form-input-biodata"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>

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