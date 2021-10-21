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
    <title>Fee RRGraph - Send Money</title> 
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="../../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../src/css/sweetalert2.min.css">
	<link rel="stylesheet" href="../../src/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../src/css/animate.min.css">

    <style>
        .dataTables_wrapper {
            display: none !important;
        }
    </style>
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
                            <canvas class="logo-salary-active"></canvas>
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

                    <div class="main-header-salary" align="right">

                        <?php
                        $query_date  = mysqli_query($connect, "SELECT MAX(date) as date FROM tb_fee WHERE status='Save'");
                        while($data = mysqli_fetch_array($query_date)){
                            if($data['date'] !== NULL){
                                $param_date = $data['date'];
                            }else{
                                date_default_timezone_set('Asia/Jakarta');
                                $param_date= date("Y-m-d");
                            }
                        }
                        ?>

                        <a class="linked-salary" href="../salary/?elements=report">
                            Salary and allowances
                        </a>
                        <a class="linked-salary-active ml-2" href="../send_money/index.php?date=<?=$param_date?>">
                            Send Money
                        </a>
                        
                        <!-- <strong class="date-publish">Date</strong> -->
                        <div class="place-picker">
                            <?php
                            error_reporting(0);
                            if($_GET['action'] == 'edit'){
                            ?>
                            <input readonly class="date-publish" id="param_date" type="text" name="date_range" value="<?=$_GET['date']?>" />
                            <button class="btn-picker" id="range_picker">Select Date</button>
                            <?php
                            }else{
                            ?>
                            <input readonly class="date-publish" type="text" name="date_range" value="<?=$_GET['date']?>" />
                            <?php
                            }
                            ?>
                        </div>

                    </div>

                    <?php
                    $query="SELECT MAX(cast(SUBSTR(code, 1) as UNSIGNED )) as maxCode FROM tb_fee";
                    $result = mysqli_query($connect, $query);
                    while($row =mysqli_fetch_array($result)) {
                    $maxCode = $row['maxCode'];
                        if($maxCode == NULL){
                            $no = 0;
                            $no++;
                            ?>
                            <input readonly class="d-none" id="code_fee" type="text" name="" value="<?=$no?>" />
                            <?php
                        }else{
                            $no = (int) $maxCode;
                            $no++;
                            ?>
                            <input readonly class="d-none" id="code_fee" type="text" name="" value="<?=$no?>" />
                            <?php
                        }
                    }
                    ?>

                    <div class="main-sales-sub mt-5" align="left">
                        <div class="distance-content">

                            <div class="content">
                                <div class="element">
                                    <div class="header">
                                        <div class="sub-header-right">
                                            <strong class="range-report">Sort by.</strong>
                                            <a class="sort-link" href="">Division</a>
                                            <a class="sort-link" href="">Role</a>
                                            <a class="sort-link" href="">Name</a>
                                        </div>
                                        <div class="sub-header-right" align="right" >
                                            <?php
                                            error_reporting(0);
                                            if($_GET['action'] == 'edit'){
                                            ?>
                                            <button onclick="edit_data()" class="edit-publish-data ml-3" >Save</button>
                                            <?php
                                            }elseif($_GET['action'] == 'publish'){
                                            ?>
                                            <button class="range-data" onclick="click_btn_csv()">Export Flip</button>
                                            <?php
                                            }else{
                                            ?>
                                            <button class="publish-data" data-toggle="modal" data-target="#upload">Upload CSV</button>

                                            <button class="publish-data ml-3" onclick="publish_data()">Publish</button>
                                            
                                            <button class="edit-publish-data ml-3" onclick="window.location.href='?action=edit&&date=<?=$_GET['date']?>'">Edit</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <table class="table-elements table">
                                        <thead>
                                            <tr class="title-table">
                                                <th scope="col">Name</th>
                                                <th scope="col">Total (Rp)</th>
                                                <th scope="col">Basic</th>
                                                <th scope="col">Absent</th>
                                                <th scope="col">Transport</th>
                                                <th scope="col">Overtime</th>
                                                <th scope="col">Bounty</th>
                                                <th scope="col">Tip</th>
                                                <th class="td-alert" scope="col">Cashbon</th>
                                                <th class="td-alert" scope="col">Warranty</th>
                                                <th scope="col">More</th>
                                                <th scope="col">THR</th>
                                                <th scope="col">Note</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            error_reporting(0);
                                            if($_GET['action'] == 'edit'){
                                                $query="SELECT MAX(cast(SUBSTR(code, 1) as UNSIGNED )) as maxCode FROM tb_fee";
                                                $result = mysqli_query($connect, $query);
                                                while($row =mysqli_fetch_array($result)) {
                                                $maxCode = $row['maxCode'];
                                                ?>
                                                <input readonly class="d-none" id="code_fee" type="text" name="" value="<?=$no?>" />
                                                <?php
                                                }

                                                $param_date = $_GET['date'];

                                                // $sql_check_row = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                                                // if(mysqli_num_rows($sql_check_row) < 1) {
                                                //     $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='0000-00-00'");
                                                // }else{
                                                //     $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                                                // }

                                                $sql_check_row = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                                                if(mysqli_num_rows($sql_check_row) < 1) {
                                                    $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date=''");
                                                }else{
                                                    $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                                                }
                                                while($row = mysqli_fetch_array($query_biodata)){
                                            ?>
                                            <tr>
                                                <td><?=$row['flip_id']?></td>
                                                <td>
                                                    <input  type="text" class="form-control w-100  d-none" name="" id="param_id_role" value="<?=$row['id_role']?>">
                                                    <input  type="text" class="form-control w-100  d-none" name="" id="param_id_fee" value="<?=$row['id_fee']?>">
                                                    <input  type="text" class="form-control w-100  d-none" name="" id="param_id" value="<?=$row['id_nama']?>">
                                                    <input readonly type="text" class="form-control font-weight-bold text-body w-100 total" name="" id="total" value="<?=$row['total']?>">
                                                </td>
                                                <td>
                                                    <?php
                                                    if($row['basic_fee_new'] == 0){
                                                    ?>
                                                    <input onclick="basic()" type="text" class="form-control w-100 basic" name="" id="basic" value="<?=$row['basic_fee']?>">
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <input onclick="basic()" type="text" class="form-control w-100 basic" name="" id="basic" value="<?=$row['basic_fee_new']?>">
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <input onclick="absent()" type="text" class="form-control w-100 absent" name="" id="absent" value="<?=$row['absent']?>">
                                                </td>
                                                <td>
                                                    
                                                    <input type="text" class="form-control w-100 transport_v d-none" name="" value="<?=$row['transport']?>">
                                                    <input onclick="transport()" type="text" class="form-control w-100 transport" name="" id="transport" value="<?=$row['transport_new']?>">
                                                    
                                                </td>
                                                <td>
                                                    <input onclick="overtime()" type="text" class="form-control w-100 overtime" name="" id="overtime" value="<?=$row['overtime']?>">
                                                </td>
                                                <td>
                                                    <input onclick="bounty()" type="text" class="form-control w-100 bounty" name="" id="bounty" value="<?=$row['bounty']?>">
                                                </td>
                                                <td>
                                                    <input onclick="tip()" type="text" class="form-control w-100 tip" name="" id="tip" value="<?=$row['tip']?>">
                                                </td>
                                                <td class="td-alert">
                                                    <input onclick="cashbon()" type="text" class="form-control w-100 cashbon" name="" id="cashbon" value="<?=$row['min_cashbon']?>">
                                                </td>
                                                <td class="td-alert">
                                                    <input onclick="warranty()" type="text" class="form-control w-100 warranty" name="" id="warranty" value="<?=$row['min_jaminan']?>">
                                                </td>
                                                <td>
                                                    <input onclick="more()" type="text" class="form-control w-100 more" name="" id="more" value="<?=$row['more']?>">
                                                </td>
                                                <td>
                                                    <input onclick="thr()" type="text" class="form-control w-100 thr" name="" id="thr" value="<?=$row['thr']?>">
                                                </td>
                                                <td>
                                                    <textarea onclick="note()" name="note" id="note" cols="12" rows="3" class="w-100 note"></textarea>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }elseif($_GET['action'] == 'publish'){

                                                $param_date = $_GET['date'];
                                            
                                                $sql_check_row = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Publish'");
                                                if(mysqli_num_rows($sql_check_row) < 1) {
                                                    $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date=''");
                                                }else{
                                                    $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Publish'");
                                                }
                                                
                                                while($row = mysqli_fetch_array($query_biodata)){
                                            ?>
                                            <tr>
                                                <td><?=$row['flip_id']?></td>
                                                <td>
                                                    <p class="font-weight-bold text-body"><?=number_format($row['total'], 0, ".", ".")?></p>
                                                </td>
                                                <td><?=number_format($row['basic_fee'], 0, ".", ".")?></td>
                                                <td><?=$row['absent']?></td>
                                                <td><?=number_format($row['transport_fee'], 0, ".", ".")?></td>
                                                <td><?=number_format($row['overtime'], 0, ".", ".")?></td>
                                                <td><?=number_format($row['bounty'], 0, ".", ".")?></td>
                                                <td><?=number_format($row['tip'], 0, ".", ".")?></td>
                                                <td class="td-alert"><?=number_format($row['min_cashbon'], 0, ".", ".")?></td>
                                                <td class="td-alert"><?=number_format($row['min_jaminan'], 0, ".", ".")?></td>
                                                <td><?=number_format($row['more'], 0, ".", ".")?></td>
                                                <td><?=number_format($row['thr'], 0, ".", ".")?></td>
                                                <td><?=$row['note']?></td>
                                            </tr>
                                            <?php
                                        }
                                            }else{
                                                $param_date = $_GET['date'];

                                                $sql_check_row = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                                                if(mysqli_num_rows($sql_check_row) < 1) {
                                                    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date=''");
                                                }else{
                                                    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                                                }
                                                
                                                while($row = mysqli_fetch_array($query_biodata)){
                                            ?>
                                            <tr>
                                                <td><?=$row['flip_id']?></td>
                                                <td>
                                                    <input  type="text" class="form-control w-100  d-none" name="" id="param_id_role_sub" value="<?=$row['id_role']?>">
                                                    <input  type="text" class="form-control w-100  d-none" name="" id="param_id_fee_sub" value="<?=$row['id_fee']?>">
                                                    <input  type="text" class="form-control w-100  d-none" name="" id="param_id_sub" value="<?=$row['id_nama']?>">
                                                    <input  type="text" class="form-control w-100  d-none" name="" id="param_code_sub" value="<?=$row['code']?>">
                                                    <p class="font-weight-bold text-body">Rp. <?=number_format($row['total'])?></p>
                                                </td>
                                                <td>Rp. <?=number_format($row['basic_fee'])?></td>
                                                <td><?=$row['absent']?></td>
                                                <td>Rp. <?=number_format($row['transport_fee'])?></td>
                                                <td>Rp. <?=number_format($row['overtime'])?></td>
                                                <td>Rp. <?=number_format($row['bounty'])?></td>
                                                <td>Rp. <?=number_format($row['tip'])?></td>
                                                <td class="td-alert">Rp. <?=number_format($row['min_cashbon'])?></td>
                                                <td class="td-alert">Rp. <?=number_format($row['min_jaminan'])?></td>
                                                <td>Rp. <?=number_format($row['more'])?></td>
                                                <td>Rp. <?=number_format($row['thr'], 0, ".", ".")?></td>
                                                <td><?=$row['note']?></td>
                                            </tr>
                                            <?php
                                                }
                                            }   
                                            ?>
                                            
                                        </tbody>
                                    </table>

                                    <table id="example" class="display nowrap" style="width:100%; display: none;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Penerima</th>
                                                <th>Nominal</th>
                                                <th>Berita Transfer (Opsional)</th>
                                                <th>Nama Penerima (Opsional)</th>
                                                <th>ID Unik Transaksi (Opsional)</th>
                                                <th>Berita Transfer Tambahan (Opsional)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $param_date = $_GET['date'];

                                            $sql_check_row = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date='$param_date' && tb_fee.status='Publish'");
                                            if(mysqli_num_rows($sql_check_row) < 1) {
                                                $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date=''");
                                            }else{
                                                $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date='$param_date' && tb_fee.status='Publish'");
                                            }
                                            
                                            $no = 1;
                                            while($row = mysqli_fetch_array($query_biodata)){
                                            ?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$row['flip_id']?></td>
                                                <td><?=$row['total']?></td>
                                                <td></td>
                                                <td><?=$row['nama']?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $no++;
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

    <div align="center" class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-body-success">
                        
                    <form action="process/upload_csv.php" method="post" enctype="multipart/form-data">
                        <h1 class="title-market mt-5">Upload your CSV here</h1>
                        <input type="text" style="display: none;" name="param" value="<?=$_GET['date']?>">
                        <div class="drop-zone mt-5" style="border: 2px dashed #CACCCF; margin: 0;" align="center">
                            <span class="drop-zone__prompt">Drop the CSV file here</span>
                            <input type="file" name="file" class="drop-zone__input" multiple="multiple">
                        </div>
                        <input type="submit" id="submit" name="submit" style="margin: 0;" class="upl-inp mt-5 mb-5" value="Yes, Upload it!"/>
                    </form>
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
    <!-- Datepicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="js/datepicker.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script>
        function click_btn_csv(){
            $('.buttons-csv').trigger('click');
        }

        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

</body>
</html>

