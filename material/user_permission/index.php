<?php
session_start();
    
if(!isset($_SESSION['email']) ) {
    header('location: ../login/login.php');
    exit;
}else{
    if($_SESSION['role'] == 'User'){
        header('location: ../team-viewer/');
    }
}

    include '../../src/connection/connection.php';
?>
<html>
<head>
    <title>Fee RRGraph - User Permission</title> 
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
                            <a href="../level/" class="btn-level mr-3">level</a>
                            <a href="../input_employee/" class="btn-level mr-3">Input Team</a>

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
                                                <th scope="col">Email</th>
                                                <th scope="col">Flip Id</th>
                                                <th scope="col">Password</th>
                                                <th scope="col" >Level</th>
                                                <th scope="col" class="text-right">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $query_biodata  = mysqli_query($connect, "SELECT tb_biodata.nama, tb_account.id_account, tb_account.email, tb_account.pass, flip_id, tb_account.role, tb_account.id_nama FROM tb_account INNER JOIN tb_biodata ON tb_account.id_nama=tb_biodata.id_nama");
                                            while($row = mysqli_fetch_array($query_biodata)){
                                            ?>
                                            <tr>
                                                <?php
                                                error_reporting(0);
                                                if($row['id_nama'] == $_GET['edit']){
                                                ?>
                                                <td>
                                                    <form class="float-right" action="process/input_data.php" method="POST">

                                                        <input class="d-none" type="text" name="param" value="edit">
                                                        <input class="d-none" type="text" name="id_n" value="<?=$row['id_nama']?>">
                                                        <input class="d-none" type="text" name="id_a" value="<?=$row['id_account']?>">

                                                        <input autofocus type="text" class="form-control inp-height" name="email" id="" value="<?=$row['email']?>">
                                                </td>
                                                <td>
                                                        <input type="text" class="form-control inp-height" name="flip_id" id="" value="<?=$row['flip_id']?>">
                                                </td>
                                                <td>
                                                        <input type="password" class="form-control inp-height" name="password" id="" value="<?=$row['pass']?>">
                                                </td>
                                                <td>
                                                        <select value="<?=$row['role']?>" name="role" class="form-control inp-height" id="" style="width:50%;">
                                                            <option selected ><?=$row['role']?></option>
                                                            <option >Admin</option>
                                                            <option >Analytics</option>
                                                            <option >User</option>
                                                        </select>
                                                </td>
                                                <td class="text-right">
                                                        <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                    </form>
                                                </td>
                                                <?php
                                                }else{
                                                ?>
                                                <td><?=$row['email']?></td>
                                                <td><?=$row['flip_id']?></td>
                                                <td>
                                                    <input class="pass-view-user" disabled type="password" name="" id="" value="<?=$row['pass']?>">
                                                </td>
                                                <td><?=$row['role']?> </td>
                                                      
                                                <td>
                                                    <form class="float-right ml-2" action="?id=<?=$row['id_nama']?>" method="POST">
                                                        <?php
                                                        if($row['id_nama'] == $_GET['id']){
                                                        ?>
                                                        <button class="btn-user-arrow-active"></button>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <button class="btn-user-arrow"></button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </form>

                                                    <!-- <form class="float-right ml-2" action="" method="POST"> -->
                                                        <button class="float-right ml-2 btn-user-delete" data-toggle="modal" data-target="#editModal<?=$row['id_nama']?>"></button>
                                                    <!-- </form> -->

                                                    <div align="center" class="modal fade" id="editModal<?=$row['id_nama']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                                    <form class="float-right" action="?edit=<?=$row['id_nama']?>&&id=<?=$row['id_nama']?>" method="POST">
                                                        <button class="btn-user-edit"></button>
                                                    </form>
                                                </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php
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
    <script type="text/javascript" src="../../src/js/datatables.js"></script> 

</body>
</html>

