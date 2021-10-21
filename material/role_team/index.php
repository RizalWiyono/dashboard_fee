<?php
session_start();
    
if(!isset($_SESSION['email']) ) {
    header('location: ../login/login.php');
    exit;
}else{
    if($_SESSION['role'] == 'Team'){
        header('location: ../team-viewer/');
    }
}

    include '../../src/connection/connection.php';
?>
<html>
<head>
    <title>Fee RRGraph - Role Team</title> 
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

        <main class="main-middler">
            <div class="main-container">
                <div class="main-content-middler" align="center">
                    <div class="content-middler" >

                        <div class="main-header" align="left">

                            <a class="linked" href="../add_team/">
                                Personalia
                            </a>
                            <a class="linked-active ml-2" href="../role_team/">
                                Role Team
                            </a>

                            <div class="main-search" align="right">
                                <div class="col-md-6 search">
                                    <form action="in/search.php?market=All Marketplace" method="POST" class="row">
                                        <input type="text" name="search" id="search" placeholder="Template name here" oninput="search_all_m()">
                                        <input type="submit" style="display: none;"> <img class="search-ic" src="../../src/image/SEARCH-IC.svg" alt="">
                                    </form>
                                </div>
                            </div>
                            
                        </div>

                        <div class="main-sales" align="left">
                            <div class="distance-content">
                                <!-- <form action="process/input_data.php" method="POST" enctype="multipart/form-data"> -->
                                <div class="content">
                                    <table class="table-team table">
                                        <thead>
                                            <tr class="title-table">
                                                <th scope="col">Team Name</th>
                                                <th scope="col">Division</th>
                                                <th scope="col">Role</th>
                                            </tr>
                                        </thead>

                                        <tbody>  
                                            <?php
                                            if(!isset($_GET['role'])){
                                                $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata");
                                            }else{
                                                $param_role = $_GET['role'];
                                                $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE role='$param_role'");
                                            }
                                            while($row = mysqli_fetch_array($query_biodata)){
                                            ?>
                                            <tr>
                                                <td>
                                                <style>
                                                    .drop-zone__thumb 
                                                    {
                                                        border-radius: 3px;
                                                        position: static;
                                                    }
                                                </style>
                                                <!-- <form action="process/update_team.php" method="post" enctype="multipart/form-data">
                                                    <div class="drop-zone" style="background-color: #C4C4C4; float: left; margin: 0; width: 10%; height: 2vw; padding: 0;" align="center">
                                                        <canvas class="drop-zone__prompt insert-image"></canvas>
                                                        <input type="file" name="image" id="img" class="drop-zone__input" Required>
                                                    </div>
                                                </form> -->
                                                    <?php
                                                    if($row['gender'] == 'm'){
                                                    ?>
                                                    <img style="background-color: #C4C4C4; float: left; margin: 0; border-radius: 4px; width: 10%; height: 2vw; padding: 0;" src="../../src/image/MAN-IC.svg" alt="">
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img style="background-color: #C4C4C4; float: left; margin: 0; border-radius: 4px; width: 10%; height: 2vw; padding: 0;" src="../../src/image/WOMAN-IC.svg" alt="">
                                                    <?php
                                                    }
                                                    ?>  
                                                    
                                                    <input type="text" class="d-none" id="id" value="<?=$row['id_nama']?>">
                                                    <h5 class="table-name"><?=$row['nama']?></h5>
                                                </td>
                                                <td>
                                                    <select class="form-control division" name="division[]" id="division">
                                                    <?php
                                                    $query_division  = mysqli_query($connect, "SELECT * FROM tb_division");
                                                    while($data = mysqli_fetch_array($query_division)){
                                                    ?>
                                                        <option value="<?=$data['id_division']?>"><?=$data['division_name']?></option>
                                                    <?php
                                                    }
                                                    $dvs = $row['divisi'];
                                                    $query_convert  = mysqli_query($connect, "SELECT * FROM tb_division WHERE division_name='$dvs'");
                                                    if(mysqli_num_rows($query_convert) < 1) {
                                                        ?>
                                                            <option selected value=""></option>
                                                        <?php
                                                    }else{
                                                        while($var = mysqli_fetch_array($query_convert)){
                                                        ?>
                                                            <option selected value="<?=$var['id_division']?>"><?=$row['divisi']?></option>
                                                        <?php   
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control role" name="role[]" id="role">
                                                    <?php
                                                    $query_role  = mysqli_query($connect, "SELECT * FROM tb_role");
                                                    while($data = mysqli_fetch_array($query_role)){
                                                    ?>
                                                    <?php
                                                    }
                                                    ?>
                                                    <option selected value="<?=$row['role']?>"><?=$row['role']?></option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <input class="btn-save" type="submit" value="Save"  onclick="edit_data()">
                                    <!-- </form> -->
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
                            <img src="../../src/image/1.jpg" alt="">
                            <h1 class="ctnt-h1"><?=$row['nama']?></h1>
                            <p class="ctnt-p"><?=$row['divisi']?>Divisi</p>

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

                                    <input class="btn-detail" type="submit" name="" id="" value="Details >">

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

                        <button style="margin-left: 15%; margin-top: 3%;">Coba</button>

                        <h2 class="desc-title2">and upload your file here</h2>
                        <form action="process/upload_csv.php" method="post" enctype="multipart/form-data">
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script> 
</body>
</html>

