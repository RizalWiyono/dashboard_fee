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
    <title>Fee RRGraph - Salary</title> 
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

                    <div class="main-header-salary" align="left">

                        <?php
                        $query_date  = mysqli_query($connect, "SELECT MAX(date) as date FROM tb_fee WHERE status='Save'");
                        while($data = mysqli_fetch_array($query_date)){
                            if($data['date'] !== NULL){
                                $param_date = $data['date'];
                            }else{
                                date_default_timezone_set('Asia/Jakarta');
                                $param_date = date("Y-m-d");
                            }
                        }
                        ?>

                        <a class="linked-salary-active" href="../salary/?elements=report">
                            Salary and allowances
                        </a>
                        <a class="linked-salary ml-2" href="../send_money/index.php?date=<?=$param_date?>">
                            Send Money
                        </a>

                    </div>

                        <div class="sub-main">
                        <?php
                        if($_GET['elements'] == "report"){
                        ?>
                            <a class="sub-content-active" href="?elements=report">
                        <?php
                        }else{
                        ?>
                            <a class="sub-content" href="?elements=report">
                        <?php
                        }
                        ?>
                                Salary Report
                            </a>

                        <?php
                        if($_GET['elements'] == "cashbon"){
                        ?>
                            <a class="sub-content-active ml-1" href="?elements=cashbon">
                        <?php
                        }else{
                        ?>
                            <a class="sub-content ml-1" href="?elements=cashbon">
                        <?php
                        }
                        ?>
                                Cashbon
                            </a>

                            <?php
                        if($_GET['elements'] == "set"){
                        ?>
                            <a class="sub-content-active ml-1" href="?elements=set">
                        <?php
                        }else{
                        ?>
                            <a class="sub-content ml-1" href="?elements=set">
                        <?php
                        }
                        ?>
                                Set Salary
                            </a>
                        </div>

                        <div class="main-sales-sub" align="left">
                            <div class="distance-content">
                                <div class="content">
                                    <?php
                                    if($_GET['elements'] == 'report'){
                                    ?>
                                    <div class="content">
                                        <div class="element">
                                            <div class="header">
                                                <!-- <div class="sub-header-right" align="right" >
                                                    <strong class="range-report">Range Date</strong>
                                                    <button class="range-data">One Year</button>
                                                    <button class="range-costum ml-2">Costum</button>
                                                </div> -->
                                            </div>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">Salary Date</th>
                                                        <th scope="col">Publisher</th>
                                                        <th scope="col">Receipents</th>
                                                        <th scope="col">Total (Rp)</th>
                                                        <th class="text-right" scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $query_activity  = mysqli_query($connect, "SELECT * FROM tb_activity");
                                                    while($row = mysqli_fetch_array($query_activity)){
                                                        $code = $row['id_activity'];
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        $query_activitys  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE code='$code' LIMIT 1");
                                                        while($data = mysqli_fetch_array($query_activitys)){
                                                            $orgDate = $data['date'];  
                                                            $date = date("d M Y", strtotime($orgDate));  
                                                        ?>
                                                        <td><?=$date?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?=$row['username']?></td>
                                                        <?php
                                                        $sql_sum = mysqli_query($connect, "SELECT * FROM tb_fee WHERE code='$code'");
                                                        ?>
                                                        <td><?=mysqli_num_rows($sql_sum)?></td>
                                                        <?php
                                                        $query_sums  = mysqli_query($connect, "SELECT SUM(total) AS jumlah FROM tb_fee WHERE code='$code'");
                                                        while($datas = mysqli_fetch_array($query_sums)){
                                                        ?>
                                                        <td><?=number_format($datas['jumlah'])?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        $query_activityss  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE code='$code' LIMIT 1");
                                                        while($datas = mysqli_fetch_array($query_activityss)){
                                                            $orgDates = $datas['date'];  
                                                        ?>
                                                         <td>
                                                            <a class="btn-addteam float-right p-1" href="../send_money/index.php?action=publish&&date=<?=$orgDates?>">Details</a>
                                                        </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                    }

                                                    $query_role_hide  = mysqli_query($connect, "SELECT * FROM tb_division WHERE status='Hide'");
                                                    while($row = mysqli_fetch_array($query_role_hide)){
                                                    ?>
                                                    <tr class="tr-hide">
                                                        <td><?=$row['division_name']?></td>
                                                            <?php
                                                            $id_division = $row['id_division'];
                                                            $sql_check_role = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division'");
                                                            ?>
                                                            <td><?=mysqli_num_rows($sql_check_role)?></td>
                                                        <td>
                                                            <form class="float-right" action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="show_division">
                                                                <input class="d-none" type="text" name="id" value="<?=$row['id_division']?>">

                                                                <button class="btn-user-show"></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                    }elseif($_GET['elements'] == 'cashbon'){
                                    ?>

                                    <?php
                                    }elseif($_GET['elements'] == 'set'){
                                    ?>
                                    <div class="content">
                                        <div class="element">
                                            <?php
                                            if(isset($_GET['edit'])){
                                            ?>
                                            <a class="edit-role mb-2 float-right" href="?elements=set">Cancel</a>
                                            <?php
                                            }else{
                                            ?>
                                            <a class="edit-role mb-2 float-right" href="?elements=set&&edit=all">Edit All</a>
                                            <?php
                                            }
                                            ?>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">Division</th>
                                                        <th scope="col">Role</th>
                                                        <th scope="col">Basic Fee</th>
                                                        <th scope="col">Transport</th>
                                                        <th class="text-right" scope="col">
                                                        <?php
                                                        error_reporting(0);
                                                        if($_GET['edit'] == 'all'){
                                                        ?>
                                                        <input class="btn-save" type="submit" value="Save"  onclick="edit_data()">
                                                        <?php
                                                        }else{
                                                        ?>
                                                        Action
                                                        <?php
                                                        }
                                                        ?>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                if(isset($_GET['edit'])){
                                                ?>
                                                <tbody>
                                                    <?php
                                                    $query_division  = mysqli_query($connect, "SELECT * FROM `tb_role` INNER JOIN tb_division ON tb_division.id_division=tb_role.id_division WHERE tb_role.status!='Hide'");
                                                    while($row = mysqli_fetch_array($query_division)){
                                                    ?>
                                                    <tr>
                                                        <td><?=$row['division_name']?></td>
                                                        <td><?=$row['role_name']?></td>
                                                        <td>
                                                                <input class="d-none" type="text" name="param" id="param" value="set_all_salary">
                                                                <input class="d-none" type="text" name="id" id="id_role" value="<?=$row['id_role']?>">
                                                                <input autofocus type="text" class="form-control inp-set" name="basic_fee" id="basic_fee" value="<?=$row['basic_fee']?>">
                                                        </td>
                                                        <td>
                                                                <input autofocus type="text" class="form-control inp-set" name="transport" id="transport" value="<?=$row['transport']?>">
                                                        </td>
                                                        <td class="text-right">
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <?php
                                                }else{
                                                ?>
                                                <tbody>
                                                    <?php
                                                    $query_division  = mysqli_query($connect, "SELECT * FROM `tb_role` INNER JOIN tb_division ON tb_division.id_division=tb_role.id_division WHERE tb_role.status!='Hide'");
                                                    while($row = mysqli_fetch_array($query_division)){
                                                    ?>
                                                    <tr>
                                                    <?php
                                                        error_reporting(0);
                                                        if($row['id_role'] == $_GET['edit_role']){
                                                        ?>
                                                            <td><?=$row['division_name']?></td>
                                                            <td><?=$row['role_name']?></td>
                                                            <td>
                                                                <form class="float-left" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="set_salary">
                                                                    <input class="d-none" type="text" name="id" value="<?=$_GET['edit_role']?>">
                                                                    <input autofocus type="text" class="form-control inp-set" name="basic_fee" id="" value="<?=$row['basic_fee']?>">
                                                            </td>
                                                            <td>
                                                                    <input autofocus type="text" class="form-control inp-set" name="transport" id="" value="<?=$row['transport']?>">
                                                            </td>
                                                            <td class="text-right">
                                                                    <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <td><?=$row['division_name']?></td>
                                                            <td><?=$row['role_name']?></td>
                                                            <td>Rp. <?=number_format($row['basic_fee'], 0, ".", ".")?></td>
                                                            <td>Rp. <?=number_format($row['transport'], 0, ".", ".")?></td>
                                                            <td>
                                                                <form class="float-right" action="?elements=set&&edit_role=<?=$row['id_role']?>" method="POST">
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
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../src/js/tooltip.js"></script> 
    <script type="text/javascript" src="../../src/js/main.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" src="../../src/js/datatables.js"></script> 

</body>
</html>

