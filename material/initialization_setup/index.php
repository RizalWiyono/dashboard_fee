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
    <title>Fee RRGraph - Initialization Setup</title> 
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
                            <canvas class="logo-setting-active"></canvas>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="main-middler-full">
            <div class="main-container">
                <div class="main-content-middler" align="center">
                    <div class="content-middler" >

                        <div class="main-header" align="left">

                            <h1 class="title-headline">
                                Initialization Setup
                            </h1>

                            <div class="main-search" align="right">
                                <a class="btn-addteam1" href="../add_team/">
                                    + Add Team
                                </a>
                            </div>
                            
                        </div>

                        <div class="sub-main">
                        <?php
                        error_reporting(0);
                        if($_GET['elements'] == "role"){
                        ?>
                            <a class="sub-content-active" href="?elements=role">
                        <?php
                        }else{
                        ?>
                            <a class="sub-content" href="?elements=role">
                        <?php
                        }
                        ?>
                                Role Elements
                            </a>

                        <?php
                        if($_GET['elements'] == "salary"){
                        ?>
                            <a class="sub-content-active ml-1" href="?elements=salary">
                        <?php
                        }else{
                        ?>
                            <a class="sub-content ml-1" href="?elements=salary">
                        <?php
                        }
                        ?>
                            Salary Elements
                        </a>
                        <?php
                        if($_GET['elements'] == "pj"){
                        ?>
                            <a class="sub-content-active ml-1" href="?elements=pj">
                        <?php
                        }else{
                        ?>
                            <a class="sub-content ml-1" href="?elements=pj">
                        <?php
                        }
                        ?>
                            Person In Charge
                        </a>

                        <?php
                        if($_GET['elements'] == "member"){
                        ?>
                            <a class="sub-content-active ml-1" href="?elements=member">
                        <?php
                        }else{
                        ?>
                            <a class="sub-content ml-1" href="?elements=member">
                        <?php
                        }
                        ?>
                            Member
                        </a>
                        </div>

                        <div class="main-sales-sub" align="left">
                            <div class="distance-content">
                                <div class="content">
                                    <?php
                                    if($_GET['elements'] == 'role'){
                                    ?>
                                    <div class="content-in-sub">
                                        <div class="element-in">
                                            <h1 class="title-elements">Division</h1>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Role</th>
                                                        <th class="text-right" scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $query_division  = mysqli_query($connect, "SELECT * FROM tb_division WHERE status!='Hide'");
                                                    while($row = mysqli_fetch_array($query_division)){
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        error_reporting(0);
                                                        if($row['id_division'] == $_GET['edit']){
                                                        ?>
                                                            <td>
                                                                <form class="float-left" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="edit_division">
                                                                    <input class="d-none" type="text" name="id" value="<?=$_GET['id']?>">
                                                                    <input autofocus type="text" class="form-control inp-role" name="title" id="" value="<?=$row['division_name']?>">
                                                            </td>
                                                            <td></td>
                                                            <td class="text-right">
                                                                    <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <td><?=$row['division_name']?></td>
                                                            <?php
                                                            $id_division = $row['id_division'];
                                                            $sql_check_role = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division'");
                                                            ?>
                                                            <td><?=mysqli_num_rows($sql_check_role)?></td>
                                                            <td>
                                                                    <!-- <form class="float-right ml-2" action="process/input_data.php" method="POST">
                                                                        <input class="d-none" type="text" name="param" value="hide_division">
                                                                        <input class="d-none" type="text" name="id" value="<?=$row['id_division']?>">

                                                                        <button class="btn-user-hide"></button>
                                                                    </form> -->

                                                                <?php
                                                                if($_GET['id'] == $row['id_division']){
                                                                ?>
                                                                    <form class="float-right ml-2" action="?elements=role&&id=<?=$row['id_division']?>" method="POST">
                                                                        <button class="btn-user-sub-active"></button>
                                                                    </form>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <form class="float-right ml-2" action="?elements=role&&id=<?=$row['id_division']?>" method="POST">
                                                                        <button class="btn-user-sub"></button>
                                                                    </form>
                                                                <?php
                                                                }
                                                                ?>
                                                                    <form class="float-right" action="?elements=role&&edit=<?=$row['id_division']?>&&id=<?=$row['id_division']?>" method="POST">
                                                                        <button class="btn-user-edit"></button>
                                                                    </form>
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

                                                    <tr>
                                                        <td colspan="3">
                                                            <form action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="division">
                                                                <input type="text" name="value" class="inp-cate" placeholder="add new here ....">
                                                                <input class="sbm-cat float-right" type="submit" value="+ Add Div">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="element-in">
                                            <h1 class="title-elements">Role</h1>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">Title</th>
                                                        <th class="text-right" scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $id_division = $_GET['id'];
                                                    $query_role  = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division' && status!='Hide'");
                                                    while($row = mysqli_fetch_array($query_role)){
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        error_reporting(0);
                                                        if($row['id_role'] == $_GET['edit_role']){
                                                        ?>
                                                            <td>
                                                                <form class="float-left" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="edit_role">
                                                                    <input class="d-none" type="text" name="id" value="<?=$row['id_role']?>">
                                                                    <input class="d-none" type="text" name="id_division" value="<?=$_GET['id']?>">

                                                                    <input autofocus type="text" class="form-control inp-role" name="title" id="" value="<?=$row['role_name']?>">
                                                            </td>
                                                            <td class="text-right">
                                                                    <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <td><?=$row['role_name']?></td>
                                                            <td>
                                                                <!-- <form class="float-right ml-2" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="hide_role">
                                                                    <input class="d-none" type="text" name="id" value="<?=$row['id_role']?>">
                                                                    <input class="d-none" type="text" name="id_division" value="<?=$_GET['id']?>"> -->

                                                                    <button class="float-right ml-2 btn-user-hide" data-toggle="modal" data-target="#editModal<?=$row['id_role']?>"></button>
                                                                <!-- </form> -->
                                                                
                                                                <form class="float-right ml-2" action="?elements=role&&edit_role=<?=$row['id_role']?>&&id=<?=$_GET['id']?>" method="POST">
                                                                    <button class="btn-user-edit"></button>
                                                                </form>

                                                                <?php
                                                                if($row['basic_fee'] == '0' || $row['transport'] == '0'){
                                                                ?>
                                                                <form class="float-right" action="?elements=salary&&edit_role=<?=$row['id_role']?>&&id=<?=$_GET['id']?>" method="POST">
                                                                    <button class="btn-user-alert"></button>
                                                                </form>
                                                                <?php
                                                                }else{}
                                                                ?>
                                                            </td>

                                                            <?php
                                                                $param_role =  $row['role_name'];
                                                                $check_hide = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE role='$param_role'");
                                                                if(mysqli_num_rows($check_hide) < 1){
                                                            ?>

                                                            <div align="center" class="modal fade" id="editModal<?=$row['id_role']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <form action="process/input_data.php" method="POST">
                                                                                <input class="d-none" type="text" name="param" value="hide_role">
                                                                                <input class="d-none" type="text" name="id" value="<?=$row['id_role']?>">
                                                                                <input class="d-none" type="text" name="id_division" value="<?=$_GET['id']?>">

                                                                                <img src="../../src/image/ALARM-IC.svg" alt="">

                                                                                <p>Are you sure to hide this role?</p>
                                                                                <h1><?=$row['role_name']?></h1>
                                                                                <p>there is no active team in this role</p>

                                                                                <button>Hide This Role!</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                }else{
                                                            ?>
                                                            <div align="center" class="modal fade" id="editModal<?=$row['id_role']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <form action="../role_team/index.php?role=<?=$row['role_name']?>" method="POST">
                                                                                <img src="../../src/image/ALARM-IC.svg" alt="">

                                                                                <p>Are you sure to hide this role?</p>
                                                                                <h1><?=$row['role_name']?></h1>
                                                                                <p>please change this team role first</p>

                                                                                <?php
                                                                            $param_role = $row['role_name'];
                                                                            $query_list_name  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE role='$param_role'");
                                                                            while($data = mysqli_fetch_array($query_list_name)){
                                                                            ?>
                                                                                <p><?=$data['nama']?></p>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                                <button>Fix First!</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                    }

                                                    $id_division = $_GET['id'];
                                                    $query_role_hide  = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division' && status='Hide'");
                                                    while($row = mysqli_fetch_array($query_role_hide)){
                                                    ?>
                                                    <tr class="tr-hide">
                                                        <td><?=$row['role_name']?></td>
                                                        <td>
                                                            <form class="float-right" action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="show_role">
                                                                <input class="d-none" type="text" name="id" value="<?=$row['id_role']?>">
                                                                <input class="d-none" type="text" name="id_division" value="<?=$_GET['id']?>">

                                                                <button class="btn-user-show"></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }

                                                    if(isset($_GET['id'])){
                                                    ?>
                                                    <tr>
                                                        <td colspan="2">
                                                            <form action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="role">
                                                                <input class="d-none" type="text" name="id" value="<?=$_GET['id']?>">
                                                                <input type="text" name="value" class="inp-cate" placeholder="add new here ....">
                                                                <input class="sbm-cat float-right" type="submit" value="+ Add Div">
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
                                    }elseif($_GET['elements'] == 'salary'){
                                    ?>
                                    <div class="content-in-sub">
                                        <div class="element-in">
                                            <h1 class="title-elements">Core Elements</h1>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">Elements</th>
                                                        <th class="text-right" scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                    $query_division  = mysqli_query($connect, "SELECT * FROM tb_core WHERE status!='Hide'");
                                                    while($row = mysqli_fetch_array($query_division)){
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        error_reporting(0);
                                                        if($row['id_core'] == $_GET['edit_core']){
                                                        ?>
                                                            <td>
                                                                <form class="float-left" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="edit_core_elements">
                                                                    <input class="d-none" type="text" name="id" value="<?=$_GET['id_core']?>">
                                                                    <input autofocus type="text" class="form-control inp-role" name="title" id="" value="<?=$row['core_name']?>">
                                                            </td>
                                                            <td class="text-right">
                                                                    <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <td><?=$row['core_name']?></td>
                                                            <td>
                                                                <form class="float-right ml-2" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="hide_core_elements">
                                                                    <input class="d-none" type="text" name="id" value="<?=$row['id_core']?>">

                                                                    <button class="btn-user-hide"></button>
                                                                </form>

                                                                <form class="float-right ml-2" action="?elements=salary&&edit_core=<?=$row['id_core']?>&&id_core=<?=$row['id_core']?>" method="POST">
                                                                    <button class="btn-user-edit"></button>
                                                                </form>

                                                                <?php
                                                                $id_division = $_GET['id'];
                                                                $id_role     = $_GET['edit_role'];
                                                                if($row['id_core'] == '1'){
                                                                    $query_role_detect  = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division' && status!='Hide' && id_role ='$id_role'");
                                                                    while($data = mysqli_fetch_array($query_role_detect)){
                                                                        if($data['basic_fee'] == 0){
                                                                        ?>
                                                                        <form class="float-right" action="../salary/index.php?elements=set&&edit_role=<?=$_GET['edit_role']?>" method="POST">
                                                                            <button class="btn-user-alert"></button>
                                                                        </form>
                                                                        <?php
                                                                        }
                                                                    }
                                                                }elseif($row['id_core'] == '2'){
                                                                    $query_role_detect  = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division' && status!='Hide' && id_role ='$id_role'");
                                                                    while($data = mysqli_fetch_array($query_role_detect)){
                                                                        if($data['transport'] == 0){
                                                                        ?>
                                                                        <form class="float-right" action="../salary/index.php?elements=set&&edit_role=<?=$_GET['edit_role']?>" method="POST">
                                                                            <button class="btn-user-alert"></button>
                                                                        </form>
                                                                        <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                    }

                                                    $query_role_hide  = mysqli_query($connect, "SELECT * FROM tb_core WHERE status='Hide'");
                                                    while($row = mysqli_fetch_array($query_role_hide)){
                                                    ?>
                                                    <tr class="tr-hide">
                                                        <td><?=$row['core_name']?></td>
                                                        <td>
                                                            <form class="float-right" action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="show_core_elements">
                                                                <input class="d-none" type="text" name="id" value="<?=$row['id_core']?>">

                                                                <button class="btn-user-show"></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                    <!-- <tr>
                                                        <td colspan="2">
                                                            <form action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="core_elements">
                                                                <input type="text" name="value" class="inp-cate" placeholder="add new here ....">
                                                                <input class="sbm-cat float-right" type="submit" value="+ Add Elements">
                                                            </form>
                                                        </td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="content-in-sub">
                                        <div class="element-in">
                                            <h1 class="title-elements">Additional Element</h1>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">Elements</th>
                                                        <th class="text-right" scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                    $query_division  = mysqli_query($connect, "SELECT * FROM tb_additional WHERE status!='Hide'");
                                                    while($row = mysqli_fetch_array($query_division)){
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        error_reporting(0);
                                                        if($row['id_additional'] == $_GET['edit_additional']){
                                                        ?>
                                                            <td>
                                                                <form class="float-left" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="edit_additional_elements">
                                                                    <input class="d-none" type="text" name="id" value="<?=$_GET['id_additional']?>">
                                                                    <input autofocus type="text" class="form-control inp-role" name="title" id="" value="<?=$row['additional_name']?>">
                                                            </td>
                                                            <td class="text-right">
                                                                    <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <td><?=$row['additional_name']?></td>
                                                            <td>
                                                                <form class="float-right ml-2" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="hide_additional_elements">
                                                                    <input class="d-none" type="text" name="id" value="<?=$row['id_additional']?>">

                                                                    <button class="btn-user-hide"></button>
                                                                </form>

                                                                <form class="float-right" action="?elements=salary&&edit_additional=<?=$row['id_additional']?>&&id_additional=<?=$row['id_additional']?>" method="POST">
                                                                    <button class="btn-user-edit"></button>
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                    }

                                                    $query_role_hide  = mysqli_query($connect, "SELECT * FROM tb_additional WHERE status='Hide'");
                                                    while($row = mysqli_fetch_array($query_role_hide)){
                                                    ?>
                                                    <tr class="tr-hide">
                                                        <td><?=$row['additional_name']?></td>
                                                        <td>
                                                            <form class="float-right" action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="show_additional_elements">
                                                                <input class="d-none" type="text" name="id" value="<?=$row['id_additional']?>">

                                                                <button class="btn-user-show"></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                    <!-- <tr>
                                                        <td colspan="2">
                                                            <form action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="additional_elements">
                                                                <input type="text" name="value" class="inp-cate" placeholder="add new here ....">
                                                                <input class="sbm-cat float-right" type="submit" value="+ Add Elements">
                                                            </form>
                                                        </td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="element-in">
                                            <h1 class="title-elements">Deductions</h1>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">Elements</th>
                                                        <th class="text-right" scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                    $query_division  = mysqli_query($connect, "SELECT * FROM tb_deductions WHERE status!='Hide'");
                                                    while($row = mysqli_fetch_array($query_division)){
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        error_reporting(0);
                                                        if($row['id_deductions'] == $_GET['edit_deductions']){
                                                        ?>
                                                            <td>
                                                                <form class="float-left" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="edit_deductions_elements">
                                                                    <input class="d-none" type="text" name="id" value="<?=$_GET['id_deductions']?>">
                                                                    <input autofocus type="text" class="form-control inp-role" name="title" id="" value="<?=$row['deductions_name']?>">
                                                            </td>
                                                            <td class="text-right">
                                                                    <input type="submit" class="btn-save-user" name="" id="" value="Save">
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <td><?=$row['deductions_name']?></td>
                                                            <td>
                                                                <form class="float-right ml-2" action="process/input_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="hide_deductions_elements">
                                                                    <input class="d-none" type="text" name="id" value="<?=$row['id_deductions']?>">

                                                                    <button class="btn-user-hide"></button>
                                                                </form>

                                                                <form class="float-right" action="?elements=salary&&edit_deductions=<?=$row['id_deductions']?>&&id_deductions=<?=$row['id_deductions']?>" method="POST">
                                                                    <button class="btn-user-edit"></button>
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                    }

                                                    $query_role_hide  = mysqli_query($connect, "SELECT * FROM tb_deductions WHERE status='Hide'");
                                                    while($row = mysqli_fetch_array($query_role_hide)){
                                                    ?>
                                                    <tr class="tr-hide">
                                                        <td><?=$row['deductions_name']?></td>
                                                        <td>
                                                            <form class="float-right" action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="show_deductions_elements">
                                                                <input class="d-none" type="text" name="id" value="<?=$row['id_deductions']?>">

                                                                <button class="btn-user-show"></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                    <!-- <tr>
                                                        <td colspan="2">
                                                            <form action="process/input_data.php" method="POST">
                                                                <input class="d-none" type="text" name="param" value="deductions_elements">
                                                                <input type="text" name="value" class="inp-cate" placeholder="add new here ....">
                                                                <input class="sbm-cat float-right" type="submit" value="+ Add Elements">
                                                            </form>
                                                        </td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php }elseif($_GET['elements'] == 'pj'){ ?>
                                        <div class="content">
                                            <h1 class="title-elements">Person In Charge</h1>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col">No. </th>
                                                        <th scope="col">Name</th>
                                                        <th class="text-right" scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $query_tb_person_responsible = mysqli_query($connect, "SELECT * FROM tb_person_responsible");
                                                    while($row = mysqli_fetch_array($query_tb_person_responsible)){
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        error_reporting(0);
                                                        $code_pm = $row['id_nama'];
                                                        $query_name_pm  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE id_nama = '$code_pm'");
                                                        while($data = mysqli_fetch_array($query_name_pm)){ 
                                                            $nama_pm = $data['nama'];
                                                        } ?>
                                                            
                                                            <td><?=$no?></td>
                                                            <?php
                                                            $id_division = $row['id_pm'];
                                                            ?>
                                                            <td><?=$nama_pm?></td>
                                                            <td>
                                                                <form class="float-right" action="process/delete_data.php" method="POST">
                                                                    <input class="d-none" type="text" name="param" value="<?=$row['id_responsible']?>">
                                                                    <button class="float-right ml-2 btn-user-delete"></button>
                                                                </form>
                                                            </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                    } 
                                                    if(!isset($_GET['id'])){ ?>
                                                    <tr>
                                                        <td colspan="3">
                                                            <form action="process/input_name.php" style="display: flex; justify-content: space-between;" method="POST">
                                                                <select style="font-size: 8px;" class="form-control name" name="name" id="pm">
                                                                    <?php $query_pm  = mysqli_query($connect, "SELECT * FROM tb_biodata");
                                                                    while($data = mysqli_fetch_array($query_pm)){ ?>
                                                                        <option style="font-size: 15px;" value="<?=$data['id_nama']?>"><?=$data['nama']?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <input class="sbm-cat float-right" type="submit" name="add" value="+ Add Name">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }elseif($_GET['elements'] == 'member'){ ?>
                                        <div class="content">
                                            <h1 class="title-elements">Member</h1>

                                            <table class="table-elements table" id="table">
                                                <thead>
                                                    <tr class="title-table">
                                                        <th scope="col" style="width: 30px;">No. </th>
                                                        <th scope="col" style="width: 90px;">Id People</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Name Person In Charge</th>
                                                        <th class="text-right" scope="col">
                                                            <?php
                                                            error_reporting(0); 
                                                            ?>
                                                            <input class="btn-save" type="submit" value="Save"  onclick="edit_member()">
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $query_tb_bio = mysqli_query($connect, "SELECT * FROM tb_biodata");
                                                    while($row = mysqli_fetch_array($query_tb_bio)){
                                                    $param_name_member = $row['id_nama'];
                                                    ?>
                                                    <tr>
                                                            <input class="d-none" type="text" value="<?=$row['id_nama']?>" id="id">
                                                            <td><?=$no?></td>
                                                            <td><?=$row['name_division']?></td>
                                                            <td><?=$row['nama']?></td>
                                                            <td>
                                                                <select class="form-control person w-100" name="person[]" id="person">
                                                                    <?php $query_tb_person_responsible = mysqli_query($connect, "SELECT * FROM tb_person_responsible");
                                                                    while($data = mysqli_fetch_array($query_tb_person_responsible)){ 
                                                                        $param_name = $data['id_nama'];
                                                                        $query_tb = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE id_nama='$param_name'");
                                                                        while($bio = mysqli_fetch_array($query_tb)){
                                                                            $name = $bio['nama'];
                                                                        }
                                                                        ?>
                                                                        <option value="<?=$data['id_responsible']?>"><?=$name?></option>
                                                                    <?php } 
                                                                    // Check tb_member
                                                                    $query_option_value = mysqli_query($connect, "SELECT * FROM tb_member WHERE id_nama='$param_name_member'");
                                                                    while($data = mysqli_fetch_array($query_option_value)){ 
                                                                        $para_id_responsible = $data['id_responsible'];
                                                                        // Check tb_person_responsible
                                                                        if($para_id_responsible > 0){
                                                                            $query_tb_person_responsible = mysqli_query($connect, "SELECT * FROM tb_person_responsible WHERE id_responsible='$para_id_responsible'");
                                                                            while($person = mysqli_fetch_array($query_tb_person_responsible)){ 
                                                                            $param_id_name = $person['id_nama'];
                                                                                // Check tb_biodata
                                                                                $check_name = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE id_nama='$param_id_name'");
                                                                                while($v_check_name = mysqli_fetch_array($check_name)){ 
                                                                                    ?>
                                                                                        <option selected value="<?=$para_id_responsible?>"><?=$v_check_name['nama']?></option>
                                                                                <?php }
                                                                                
                                                                            }
                                                                        }else{ ?>
                                                                                <option selected value="0"></option>
                                                                        <?php } 
                                                                    } ?>
                                                                    <option value="0"></option>
                                                                </select>
                                                            </td>
                                                            <td></td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>
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
    <script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" src="../../src/js/datatables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>

