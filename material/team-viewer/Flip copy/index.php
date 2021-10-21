<?php
    session_start();
    include '../../../src/connection/connection.php';
    
    if(!isset($_SESSION['email']) ) {
        header('location: ../../login/login.php');
        exit;
    }else{
        
    }

?>
<html>
<head>
    <title>Fee RRGraph - Team View</title> 
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../../src/image/Group 38.png">

    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&family=Poppins:wght@100;300;600&display=swap" rel="stylesheet">
    
    <!-- View -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../../src/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="../../src/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">

</head>
<body>

    <div class="grid-content">
        <input type="checkbox" class="check-sidebar" id="checkb">
        <nav align="center" id="btn-logo">
            <div class="logo">
		    <a href="/Dashboard%20Fee/material/Dashboard">
                        <img src="../../../src/image/LOGO-1.svg"/>
                    </a>
		</div>

            <div class="item" align="center ">
                <ul>
                    <li class="" data-toggle="tooltip" data-placement="right" title="Flip" id="tool-market">
                        <a data-toggle="modal" data-target="#progress" style="cursor: pointer;">
                            <canvas class="logo-icon"></canvas>
                            <h1 class="title-sidebar">Flip</h1>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="-" id="tool-freebies">
                        <a> 
                            <canvas class="logo-icon2"></canvas>
                            <h1 class="title-sidebar">-</h1>
                        </a>
                    </li>

                    <li class="" data-toggle="tooltip" data-placement="right" title="Change Password" id="tool-pass">
                        <a id="btn-change"> 
                            <canvas class="logo-pass"></canvas>
                            <h1 class="title-sidebar">Change Password</h1>
                        </a>
                    </li>

                    <li class="sect-bottom" data-toggle="tooltip" data-placement="right" title="-" id="tool-freebies">
                        <a href="../login/logout.php"> 
                            <canvas class="logo-logout"></canvas>
                            <h1 class="title-sidebar">Logout</h1>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="main-middler-full">
        <div class="top">
            <div class="wellcome">
                <?php
                $param_id_nama = $_SESSION['id_nama'];
                $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE id_nama='$param_id_nama'");
                while($row = mysqli_fetch_array($query_biodata)){
                ?>
                <h2><b>Welcome,<br></b><strong class="name"><?=$row['nama']?>!</strong></h2>
                <?php
                }
                ?>
                <select class="form-control select-date" name="date" id="date"  onchange="location = this.value;" style="background-color:transparent;">
                    <?php
                    $param_id_nama = $_SESSION['id_nama'];
                    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$param_id_nama' && date!='' && status='Publish'");
                    while($row = mysqli_fetch_array($query_biodata)){
                    ?>
                        <option value="?date=<?=$row['date']?>"><?=$row['date']?></option>
                        <option value="" disable selected hidden><?=$_GET['date']?></option>
                     <?php
                    }
                    ?>
                </select>
            </div>
            <button type="button" id="btn-pass" class="btn-change d-none"  data-toggle="modal" data-target="#myModal">Change Password</button>
            
            <div class="logout text-dark" align="right" title="Logout" >
                    <a  href="../login/logout.php">Logout</a>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="content bg-light">
                    <?php
                        $param_id_nama = $_SESSION['id_nama'];
                        $query_date  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$param_id_nama' && status='Publish' ORDER BY date DESC LIMIT 1");
                        while($dt = mysqli_fetch_array($query_date)){
                           $param_date = $dt['date'];
                        }   

                        if(isset($_GET['date'])){
                            $date = $_GET['date'];
                            $query_fee  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$param_id_nama' && date='$date' && status='Publish'");
                        }else{
                            $query_fee  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$param_id_nama' && date='$param_date' && status='Publish'");
                        }
                        while($data = mysqli_fetch_array($query_fee)){
                        ?>

                        <div class="salary">

                            <div class="total-salary">
                                <br><label>Total Salary</label>
                            </div>

                            <h2>Rp. <?=number_format($data['total'])?></h2>
                            <label><b>Payment Date</b> - <?=$data['date']?></label>
                        </div>

                        <div class="flexx">
                            <div class="content-top">
                                <div class="core">

                                    <table class="table">
                                        <divv class="flexx2">
                                            <canvas class="logo-core"></canvas>

                                            <div class="total-core">
                                                <label>Core Elements</label>
                                            </div>

                                            <thead>
                                                <tr></tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <th scope="row">Basic</th>
                                                    <td><?=number_format($data['basic_fee'])?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">Absent</th>
                                                    <td><?=$data['absent']?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">Transport</th>
                                                    <td><?=number_format($data['transport_fee'])?></td>
                                                </tr>
                                            </tbody>
                                        </div>
                                    </table>

                                </div>

                                <div class="core">
                                    <table class="table">
                                        <div class="flexx2">
                                            <canvas class="logo-add"></canvas>

                                            <div class="total-add">
                                                <label>Additional</label>
                                            </div>

                                            <thead>
                                                <tr></tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <th scope="row">Overtime</th>
                                                    <td><?=number_format($data['overtime'])?></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Bounty</th>
                                                    <td><?=number_format($data['bounty'])?></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Tip</th>
                                                    <td><?=number_format($data['tip'])?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">More</th>
                                                    <td><?=number_format($data['more'])?></td>
                                                </tr>
                                            </tbody>
                                        </div>
                                    </table>
                                </div>
                            </div>

                            <div class="content-right">
                                <div class="core-note">

                                    <table class="table note" >
                                        <div class="flexx2">
                                            
                                            <canvas class="logo-note"></canvas>

                                            <div class="total-note">
                                                <label>Note</label>
                                            </div>
                                            
                                            <img class="cores">
                                            
                                            <div class="total-note">
                                            </div>
                                            
                                            <thead>
                                                <tr>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                    <th scope="row"></th>
                                                    <td><?=$data['note']?></td>
                                                </tr>
                                                
                                               
                                            </tbody>
                                            
                                        </div>
                                    </table>

                                </div>

                                <div class="core">
                                    <table class="table">
                                        <div class="flexx2">
                                            <canvas class="logo-ded"></canvas>

                                            <div class="total-ded">
                                                <label>Deductions</label>
                                            </div>

                                            <thead>
                                                <tr>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <th scope="row">Cashbon</th>
                                                    <td><?=number_format($data['min_cashbon'])?></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Warranty</th>
                                                    <td><?=number_format($data['min_jaminan'])?></td>
                                                </tr>
                                            </tbody>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </main>
    </div> 
    <?php
    }
    ?>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body-success">
                        <div class="modal-header" align="left">
                            <h4 class="modal-title">Change Your Password </h4>
                            <button type="button" class="btn btn-default"  data-dismiss="modal">X</button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="process/update_password.php">
                                <input type="hidden" id="email" name="email" value="<?= $_SESSION['email']?>">
                                <input type="hidden" name="date" value="<?= $_GET['date']?>">
                                <div class="form-group">
                                    <label for="">Input New Password</label>
                                    <input type="password" class="form-control" name="pass" required>
                                </div>
                                <button type="submit" class="btn btn-primary" style="width:50%;">Change</button>		
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../src/js/tooltip.js"></script> 
    <script type="text/javascript" src="../../../src/js/main.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        // var param_email = document.getElementById('email').value;

        // $.ajax({
        //     url:"process/check_password.php",
        //     method:"POST",
        //     data:{param_email:param_email},
        //     dataType:"JSON",
        //     success:function(data)
        //     {
        //         if(data[0]['pass'] == 'c4ca4238a0b923820dcc509a6f75849b'){
        //             document.getElementById('btn-pass').click();
        //         }
        //     }
            
        // });

        var btn_change = document.getElementById('btn-change');

        btn_change.addEventListener('click', () => {
            document.getElementById('btn-pass').click();
            document.getElementById('checkb').click();
        });
    </script>
</body>
</html>

