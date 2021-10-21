<?php
session_start();
    
if(!isset($_SESSION['email']) ) {
    header('location: ../login/login.php');
    exit;
}else{
    if($_SESSION['role'] == 'User'){
        header('location: ../team-viewer/');
    }
    elseif($_SESSION['role'] == 'Analytics'){
        header('location: ../dashboard/');
    }
}

    include '../../src/connection/connection.php';
?>
<html>
<head>
    <title>Fee RRGraph - Level</title> 
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../src/image/Group 38.png">

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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    
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

        <main class="main-middler">
            <div class="main-container">
                <div class="main-content-middler" align="center">
                    <div class="content-middler" >

                        <div class="main-header" align="left">

                            <h1 class="title-headline" href="../add_team/">
                                User Permission
                            </h1>

                            <div class="main-search" align="right">
                                <a href="" class="btn-level mr-3">Level</a>
                                <?php
                                if(isset($_GET['id'])){
                                ?>
                                <a class="btn-addteam1" href="?add=team">+ Add Team</a>
                                <?php
                                }elseif(isset($_GET['add'])){
                                ?>
                                <a class="btn-addteam1-active" href="?add=team">+ Add Team</a>
                                <?php
                                }else{
                                ?>
                                <a class="btn-addteam1" href="?add=team">+ Add Team</a>
                                <?php
                                }
                                ?>
                            </div>
                            
                        </div>

                        <div class="main-sales" align="left">
                            <div class="distance-content">
                                <div class="content">
                                    <table class="table-team table" id="table">
                                        <thead>
                                            <tr class="title-table">
                                                <th scope="col">Title</th>
                                                <th scope="col">Capability</th>
                                                <th scope="col" class="text-right">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            error_reporting(0);
                                            $query_level  = mysqli_query($connect, "SELECT * FROM tb_level ORDER BY level_name ASC");
                                            while($row = mysqli_fetch_array($query_level)){
                                                if($_GET['edit'] == $row['id_level']){
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <form action="process/input_data.php" method="POST">
                                                            <input class="d-none" name="param_id" type="text" value="<?=$row['id_level']?>">
                                                            <input class="form-control" name="level_name" type="text" value="<?=$row['level_name']?>">
                                                        </td>
                                                        <td>
                                                            <div class="checkbox">   
                                                                <?php
                                                                if($row['payroll_view'] == 'Active'){
                                                                ?>
                                                                    <label class="container align-self-center">Payroll View<input type="checkbox" value="Active" name="payroll_view" checked ><span class="checkmark"></span></label>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <label class="container align-self-center">Payroll View<input type="checkbox" value="Active" name="payroll_view" ><span class="checkmark"></span></label>
                                                                <?php
                                                                }
                                                                ?>

                                                                <?php
                                                                if($row['payroll_admin'] == 'Active'){
                                                                ?>
                                                                    <label class="container align-self-center">Payroll Admin<input type="checkbox" value="Active" name="payroll_admin" checked ><span class="checkmark"></span></label>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <label class="container align-self-center">Payroll Admin<input type="checkbox" value="Active" name="payroll_admin" ><span class="checkmark"></span></label>
                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                                <?php
                                                                if($row['dashboard'] == 'Active'){
                                                                ?>
                                                                    <label class="container"><input type="checkbox" value="Active" name="dashboard" checked >Dashboard<span class="checkmark"></span></label>                                                            
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <label class="container"><input type="checkbox" value="Active" name="dashboard" >Dashboard<span class="checkmark"></span></label>                                                            
                                                                <?php
                                                                }
                                                                ?>                                                          
                                                            </div> 
                                                        </td>   

                                                        <td class="text-right">
                                                            <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }else{
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <label for=""><b><?=$row['level_name']?></b></label>

                                                        </td>
                                                        <td>
                                                            <div class="checkbox">   
                                                                <?php
                                                                if($row['payroll_view'] == 'Active'){
                                                                ?>
                                                                    <label class="container align-self-center">Payroll View<input type="checkbox" value="Active" name="payroll_view" checked disabled><span class="checkmark"></span></label>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <label class="container align-self-center">Payroll View<input type="checkbox" value="Active" name="payroll_view" disabled><span class="checkmark"></span></label>
                                                                <?php
                                                                }
                                                                ?>

                                                                <?php
                                                                if($row['payroll_admin'] == 'Active'){
                                                                ?>
                                                                    <label class="container align-self-center">Payroll Admin<input type="checkbox" value="Active" name="payroll_admin" checked disabled><span class="checkmark"></span></label>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <label class="container align-self-center">Payroll Admin<input type="checkbox" value="Active" name="payroll_admin" disabled><span class="checkmark"></span></label>
                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                                <?php
                                                                if($row['dashboard'] == 'Active'){
                                                                ?>
                                                                    <label class="container"><input type="checkbox" value="Active" name="dashboard" checked disabled>Dashboard<span class="checkmark"></span></label>                                                            
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <label class="container"><input type="checkbox" value="Active" name="dashboard" disabled>Dashboard<span class="checkmark"></span></label>                                                            
                                                                <?php
                                                                }
                                                                ?>                                                          
                                                            </div> 
                                                        </td>   

                                                        <td>
                                                            <!-- <form class="float-right ml-2" action="" method="POST"> -->
                                                                <button class="float-right ml-2 btn-user-delete" data-toggle="modal" data-target="#editModal<?=$row['id_level']?>"></button>
                                                            <!-- </form> -->

                                                            <div align="center" class="modal fade" id="editModal<?=$row['id_level']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <form action="process/input_data.php" method="POST">
                                                                                <input class="d-none" type="text" name="param" value="delete">
                                                                                <input class="d-none" type="text" name="id" value="<?=$row['id_account']?>">

                                                                                <img src="../../src/image/ALARM-IC.svg" alt="">

                                                                                <p>Are you sure you want to delete</br>the login data for this account?</p>
                                                                                <h1><?=$row['flip_id']?></h1>

                                                                                <button>Delete Now!</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <form class="float-right" action="?edit=<?=$row['id_level']?>" method="POST">
                                                                <button class="btn-user-edit"></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php 
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
        
        <main class="main-right">
            <div class="main-container">
                <div class="main-content-right" align="left">
                    <?php
                    if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $query_biodatapeople  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE id_nama='$id'");
                    while($row = mysqli_fetch_array($query_biodatapeople)){
                    ?>
                    <div class="right" align="center">
                        <div class="ctnt-right">
                            
                            <?php
                            $id = $_GET['id'];
                            $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                            if(mysqli_num_rows($sql_check_img) < 1) {
                            ?>

                                    <?php
                                    if($row['gender']== 'm'){
                                    ?>
                                    <img src="../../src/image/MAN-IC.svg">
                                    <?php
                                    }else{
                                    ?>
                                    <img src="../../src/image/WOMAN-IC.svg">
                                    <?php
                                    }
                                    ?>

                            <?php
                            }else{
                                $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                                while($img = mysqli_fetch_array($query_img)){
                            ?>

                                    <img src="<?=$img['image']?>">
                            <?php
                                }
                            }
                            ?>

                            <h1 class="ctnt-h1"><?=$row['nama']?></h1>
                            <p class="ctnt-p"><strong><?=$row['divisi']?></strong> - <?=$row['role']?></p>

                            <div class="biodata-content">
                                <div class="distance-biodata">
                                    <div class="email">
                                        <p class="email-title">Email:</p>
                                        <p class="email-desc"><?=$row['email']?></p>
                                    </div>

                                    <div class="email">
                                        <p class="email-title">Id Flip:</p>
                                        <p class="email-desc"><?=$row['flip_id']?></p>
                                    </div>

                                    <div class="email">
                                        <p class="email-title">Phone Number:</p>
                                        <p class="email-desc"><?=$row['telpon']?></p>
                                    </div>

                                    <div class="email">
                                        <p class="email-title">Length of Work:</p>
                                        <p class="email-desc"><?=$row['flip_id']?></p>
                                    </div>

                                    <div class="email">
                                        <p class="email-title">Birthday:</p>
                                        <p class="email-desc"><?=$row['tanggal_lahir']?></p>
                                    </div>

                                    <div class="email">
                                        <p class="email-title">Malang Adress:</p>
                                    </div>

                                    <div class="email" align="left">
                                        <p class="email-desc"><?=$row['domisili_malang']?></p>
                                    </div>

                                    <a class="btn-detail" href="../biodata/?id=<?=$_GET['id']?>">Details ></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }elseif(isset($_GET['add'])){
                    ?>
                    <div class="distance-content-right">
                        <img src="../../src/image/ADD-TEAM.svg" alt="">
                        
                        <h1>Add Team by csv</h1>
                        <h2 class="desc-title">please use this template for submit </br>new team via csv</h2>

                        <button data-toggle="modal" data-target="#progress" style="margin-left: 15%; margin-top: 3%; background-color: transparent; border: 2px solid #000; padding-right: 3%; font-weight: 500; padding-left: 3%; border-radius: 60px; font-size: 15px;">Download CSV</button>

                        <h2 class="desc-title2">and upload your file here</h2>
                        <form action="../add_team/process/upload_csv.php" method="post" enctype="multipart/form-data">
                            <div class="drop-zone" align="center">
                                <span class="drop-zone__prompt">Drop the Excel / CSV file here</span>
                                <input type="file" name="file" class="drop-zone__input" multiple="multiple">
                            </div>
                            <input type="submit" id="submit" name="submit" class="upl-inp" value="Yes, Upload it!"/>
                        </form>
                    </div>
                    <?php
                    }else{
                    ?>
                        <div class="right" align="center">
                            <img class="pp-ic" src="../../src/image/PEOPLE-IC.svg" alt="">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
    </div> 

    <div align="center" class="modal fade" id="progress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body-success">
                    <img src="../../src/image/SORRY-IC.svg" alt="">
        
                    <p>Feature still in development</p>
                    <h1 style="margin-top: 5%; margin-bottom: 20%;">Sorry..</h1>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../src/js/tooltip.js"></script> 
    <script type="text/javascript" src="../../src/js/main.js"></script> 
    <script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> 

</body>
</html>

