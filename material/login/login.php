<!doctype html>
<html lang="en">
<head>  
    <title>Login</title> 
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../src/image/Group 38.png">

    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;600&display=swap" rel="stylesheet"> 
    
    <!-- View -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body>
<form name="f1" action = "process/auth_session.php" onsubmit = "return validation()" method = "POST" class="form-signin">

    <div class="col-md-5 left-sect" align="center">
        <img class="logo-mobile" src="../../src/image/LOGO-RRG.svg" alt="">

        <div class="col-md-9 in-left-sect" align="left">
            <h1 class="title-login">
                Welcome back!
            </h1>

            <p class="desc-title-login">
                We're so excited to see you again!
            </p>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" style="clear: both !important;" role="alert">
                    <?php echo 'Login failed, please input again' ?>
                </div>
            <?php } ?>

            <div class="form-group">
                <label class="title-form" for="exampleInputEmail1">Email</label>
                <input type="text" autofocus class="form-control form-inp" id="user" name="user" aria-describedby="emailHelp"  value="">
            </div>

            <div class="form-group">
                <label class="title-form" for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" value="">
            </div>

            <button id="btn" class="btn-login" align="center">
                Login
            </button>
        </div>
    </div>
</form>
<div class="col-md-7 right-sect" align="center">
    <img class="logo" src="../../src/image/LOGO-RRG.svg" alt=""> <br/>
    <img class="logo-rrg" src="../../src/image/RRG-BIG.svg" alt="">
</div>
</body>    
</html>  
