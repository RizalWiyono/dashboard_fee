<?php
session_start();
    
if(!isset($_SESSION['email']) ) {
    header('location: ../../login/login.php');
    exit;
}else{
    if($_SESSION['role'] == 'Team'){
        header('location: ../../team-viewer/');
    }
}

include '../../../src/connection/connection.php';

// Role Elements 
    // Division 

        if($_POST['param'] == 'division'){
            $name = $_POST['value'];

            $query_input = "INSERT INTO tb_division (id_division, division_name, status) 
            values 
            ( NULL, '$name', '')";
            mysqli_query($connect, $query_input);

            header("location: ../index.php?elements=role");   

        }elseif ($_POST['param'] == 'edit_division'){
            $name = $_POST['title'];
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_division SET division_name = '$name' WHERE id_division = '$id'");

            header("location: ../index.php?elements=role");    

        }elseif ($_POST['param'] == 'hide_division'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_division SET status = 'Hide' WHERE id_division = '$id'");

            header("location: ../index.php?elements=role");    

        }elseif ($_POST['param'] == 'show_division'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_division SET status = '' WHERE id_division = '$id'");

            header("location: ../index.php?elements=role");    

        }

    // Role 

        elseif ($_POST['param'] == 'role'){
            $name = $_POST['value'];
            $id = $_POST['id'];

            $query_input = "INSERT INTO tb_role (id_role, id_job, id_division, basic_fee, transport, role_name, status) 
            values 
            ( NULL, '$id', '$id', '', '', '$name' ,'')";
            mysqli_query($connect, $query_input);

            header("location: ../index.php?elements=role&&id=$id");    
        }elseif ($_POST['param'] == 'edit_role'){
            $name = $_POST['title'];
            $id = $_POST['id'];
            $id_link = $_POST['id_division'];

            mysqli_query($connect, "UPDATE tb_role SET role_name = '$name' WHERE id_role = '$id'");
            header("location: ../index.php?elements=role&&id=$id_link");    
        }elseif ($_POST['param'] == 'hide_role'){
            $id = $_POST['id'];
            $id_link = $_POST['id_division'];

            mysqli_query($connect, "UPDATE tb_role SET status = 'Hide' WHERE id_role = '$id'");
            header("location: ../index.php?elements=role&&id=$id_link");    
        }elseif ($_POST['param'] == 'show_role'){
            $id = $_POST['id'];
            $id_link = $_POST['id_division'];

            mysqli_query($connect, "UPDATE tb_role SET status = '' WHERE id_role = '$id'");
            header("location: ../index.php?elements=role&&id=$id_link");    
        }

// Salary Elements 
    // Core Elements 

        elseif ($_POST['param'] == 'core_elements'){
            $name = $_POST['value'];

            $query_input = "INSERT INTO tb_core (id_core, core_name, status) 
            values 
            ( NULL, '$name' ,'')";
            mysqli_query($connect, $query_input);

            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'edit_core_elements'){
            $name = $_POST['title'];
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_core SET core_name = '$name' WHERE id_core = '$id'");
            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'hide_core_elements'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_core SET status = 'Hide' WHERE id_core = '$id'");
            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'show_core_elements'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_core SET status = '' WHERE id_core = '$id'");
            header("location: ../index.php?elements=salary");    
        }

    // Additional Element

        elseif ($_POST['param'] == 'additional_elements'){
            $name = $_POST['value'];

            $query_input = "INSERT INTO tb_additional (id_additional, additional_name, status) 
            values 
            ( NULL, '$name' ,'')";
            mysqli_query($connect, $query_input);

            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'edit_additional_elements'){
            $name = $_POST['title'];
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_additional SET additional_name = '$name' WHERE id_additional = '$id'");
            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'hide_additional_elements'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_additional SET status = 'Hide' WHERE id_additional = '$id'");
            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'show_additional_elements'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_additional SET status = '' WHERE id_additional = '$id'");
            header("location: ../index.php?elements=salary");    
        }

    // Deductions Element

        elseif ($_POST['param'] == 'deductions_elements'){
            $name = $_POST['value'];

            $query_input = "INSERT INTO tb_deductions (id_deductions, deductions_name, status) 
            values 
            ( NULL, '$name' ,'')";
            mysqli_query($connect, $query_input);

            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'edit_deductions_elements'){
            $name = $_POST['title'];
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_deductions SET deductions_name = '$name' WHERE id_deductions = '$id'");
            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'hide_deductions_elements'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_deductions SET status = 'Hide' WHERE id_deductions = '$id'");
            header("location: ../index.php?elements=salary");    
        }elseif ($_POST['param'] == 'show_deductions_elements'){
            $id = $_POST['id'];

            mysqli_query($connect, "UPDATE tb_deductions SET status = '' WHERE id_deductions = '$id'");
            header("location: ../index.php?elements=salary");    
        }