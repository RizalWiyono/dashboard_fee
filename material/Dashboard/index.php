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

    header("Location: ../../../Auth/material/menu-option/menu-option.php");
?>

<!doctype html>
<html lang="en">
<head>  
    <title>Dashboard</title> 
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../src/image/Group 38.png">
    <link rel="shortcut icon" href="http://192.168.1.242:5000/webman/resources/images/icon_dsm_96.png?v=4398">
    <link rel="stylesheet" href="../../src/css/dashboard.css">

    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;600&display=swap" rel="stylesheet"> 
    
    <!-- View -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     
</head>  
<body> 

    <img class="logo-rrg" src="../../src/image/vector.svg" alt="">
    <div class="cont" align="center">

        <div class="logo-section">
            <label for=""></label>
            <img class="logo" src="../../src/image/LOGO-RRG.svg" alt="">
        </div>
        <?php
		if($_SESSION['role'] == 'Admin'){
        ?>
        <div class="item-content"> 
            <?php
            $session = $_SESSION['role'];

            $query_division  = mysqli_query($connect, "SELECT * FROM tb_level WHERE level_name='$session'");
            while($check = mysqli_fetch_array($query_division)){
                $payrole_admin = $check['payroll_admin'];
                $payrole_view = $check['payroll_view'];
                $dashboard = $check['dashboard'];
            }

            if($payrole_view == 'Active'){
                $id_param_nama = $_SESSION['id_nama'];
                $sql_check_param_date = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id_param_nama' &&  date='0000-00-00'");
                if(mysqli_num_rows($sql_check_param_date) < 1) {
                    ?>
                        <a name="payroll_view" href="../team-viewer/?date=" class="right-section" style="margin-right: 5%;">
                    <?php
                }else{
                    $href_date  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id_param_nama' ORDER BY date DESC LIMIT 1");
                    while($date = mysqli_fetch_array($href_date)){
                        ?>
                            <a name="payroll_view" href="../team-viewer/?date=<?=$date['date']?>" class="right-section" style="margin-right: 5%;">
                        <?php
                    }
                }
                    
            ?>
                    <img class="ic-title"  src="../../src/image/Payroll.svg" alt="">
                    <h1 class="title">Payroll</h1>
                </a> 
            <?php
            }else{}
            ?> 
            <?php
            if($payrole_admin == 'Active'){
            ?>
                <a name="payroll_admin" href="../add_team/" class="right-section" style="margin-right: 5%;">
                    <img class="ic-title" src="../../src/image/admin.svg" alt="">
                    <h1 class="title">Admin</h1>
                </a>
            <?php
            }else{}
            ?>
            <?php
            if($dashboard == 'Active'){
            ?>
                <a name="dashboard" href="../../../Dashboard_Template/material/all marketplace/all-marketplace.php?market=All%20Marketplace" class="right-section">
                    <img class="ic-title" src="../../src/image/dash.svg" alt="">
                    <h1 class="title">Dashboard</h1>
                </a> 
            <?php
            }else{}
            ?>
        </div>
        <?php
		}elseif($_SESSION['role'] == 'Analytics'){
		?>
		<div class="item-content"> 
            <?php
            $session = $_SESSION['role'];

            $query_division  = mysqli_query($connect, "SELECT * FROM tb_level WHERE level_name='$session'");
            while($check = mysqli_fetch_array($query_division)){
                $payrole_admin = $check['payroll_admin'];
                $payrole_view = $check['payroll_view'];
                $dashboard = $check['dashboard'];
            }

            if($payrole_view == 'Active'){
                $id_param_nama = $_SESSION['id_nama'];
                $sql_check_param_date = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id_param_nama' &&  date='0000-00-00'");
                if(mysqli_num_rows($sql_check_param_date) < 1) {
                    ?>
                        <a name="payroll_view" href="../team-viewer/?date=" class="right-section" style="margin-right: 5%;">
                    <?php
                }else{
                    $href_date  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id_param_nama' ORDER BY date DESC LIMIT 1");
                    while($date = mysqli_fetch_array($href_date)){
                        ?>
                            <a name="payroll_view" href="../team-viewer/?date=<?=$date['date']?>" class="right-section" style="margin-right: 5%;">
                        <?php
                    }
                }
                    
            ?>
                    <img class="ic-title"  src="../../src/image/Payroll.svg" alt="">
                    <h1 class="title">Payroll</h1>
                </a> 
            <?php
            }else{}
            ?> 
            <?php
            if($payrole_admin == 'Active'){
            ?>
                <a name="payroll_admin" href="../add_team/" class="right-section" style="margin-right: 5%;">
                    <img class="ic-title" src="../../src/image/admin.svg" alt="">
                    <h1 class="title">Admin</h1>
                </a>
            <?php
            }else{}
            ?>
            <?php
            if($dashboard == 'Active'){
            ?>
                <a name="dashboard" href="../../../Dashboard_Template/material/all marketplace/all-marketplace.php?market=All%20Marketplace" class="right-section">
                    <img class="ic-title" src="../../src/image/dash.svg" alt="">
                    <h1 class="title">Dashboard</h1>
                </a> 
            <?php
            }else{}
            ?>
        </div>
		<?php
		}
        ?>
    </div>  
    <div class="desc-section" align="center">
        <h1 class="desc-title">&copy;2020 RRGRAPHDESIGN</h1>
    </div>
</body>    
</html>  
