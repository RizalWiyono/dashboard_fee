<?php
    session_start();

    include '../../../src/connection/connection_lo.php';
    $pass = md5($_POST['pass']);  
    $email = $_POST['user'];  

        $sql = $pdo->prepare("SELECT * FROM tb_account WHERE email=:a AND pass=:b");
        $sql->bindParam(':a', $email);
        $sql->bindParam(':b', $pass);
        $sql->execute(); 
        
        $data = $sql->fetch();

        if( !empty($data)){ 
            $_SESSION['pass'] = $data['pass']; 
            $_SESSION['email'] = $data['email']; 
            $_SESSION['role'] = $data['role']; 
            $_SESSION['id_nama'] = $data['id_nama']; 
            
            setcookie("message","delete",time()-1); 
            
            // $query_check_admin  = mysqli_query($connect, "SELECT * FROM tb_level WHERE id_level=1");
            // while($c_admin = mysqli_fetch_array($query_check_admin)){
            //     if($c_admin['payroll_admin'] == 'Active'){
            //         $_SESSION['check_admin'] = $c_admin['payroll_view']; 
            //     }else{

            //     }
            // }

            if($_SESSION['role'] == 'User'){
                include '../../../src/connection/connection.php';
                $id_param_nama = $_SESSION['id_nama'];
                $sql_check_param_date = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id_param_nama' &&  date='0000-00-00'");
                if(mysqli_num_rows($sql_check_param_date) < 1) {
                    header("location: ../../team-viewer/components/flip/index.php?date=");
                    
                }else{
                    $href_date  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id_param_nama' ORDER BY date DESC LIMIT 1");
                    while($date = mysqli_fetch_array($href_date)){
                        header("location: ../../team-viewer/components/flip/index.php?date=".$date['date']."");
                    }
                }
            }elseif($_SESSION['role'] == 'Admin'){
                header("location: ../../Dashboard/");
            }elseif($_SESSION['role'] == 'Analytics'){
                header("location: ../../Dashboard/");
            }
        }else{ 
            header("location: ../login.php?error=Login Failed");
        }
?>  

