<?php $param_id = $_POST['param']; ?>

<div class="distance-content-right" align="center">
    <?php include '../../../../src/connection/connection.php';
    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE id_nama='$param_id'");
    while($row = mysqli_fetch_array($query_biodata)){
        $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$param_id' ORDER BY id_image DESC LIMIT 1");
        if(mysqli_num_rows($sql_check_img) < 1) { 
            if($row['gender'] == 'm'){ ?>
                <img class="img-biodata-section" src="../../assets/image/Man-Image.svg">
                <?php }elseif($row['gender'] == 'w'){ ?>
                <img class="img-biodata-section" src="../../assets/image/Woman-Image.svg">
                <?php }elseif($row['gender'] == 'Pria'){ ?> 
                <img class="img-biodata-section" src="../../assets/image/Man-Image.svg">
                <?php }elseif($row['gender'] == 'Perempuan'){ ?>
                <img class="img-biodata-section" src="../../assets/image/Woman-Image.svg">
                <?php } 
        }else{
            $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$param_id' ORDER BY id_image DESC LIMIT 1");
            while($img = mysqli_fetch_array($query_img)){ ?>
                <img class="img-biodata-section" src="<?=$img['image']?>">
        <?php }
        } ?>

        <h1 class="title-content"><?=$row['nama']?></h1>
        <h2 class="position-title">
            <strong><?=$row['divisi']?></strong> - 
            <?=$row['role']?>
        </h2>

        <div class="container-biodata">
            <div class="biodata-value-section">
                <h1>Email : &nbsp;</h1>
                <h2><?=$row['email']?></h2>
            </div>
            <div class="biodata-value-section">
                <h1>Id Flip : &nbsp;</h1>
                <h2><?=$row['flip_id']?></h2>
            </div>
            <div class="biodata-value-section">
                <h1>Phone Number : &nbsp;</h1>
                <h2><?=$row['telpon']?></h2>
            </div>
            <div class="biodata-value-section">
                <h1>Length of Work : &nbsp;</h1>
                <h2>
                    <?php if($row['start_kerja'] == ''){ ?>
                        -
                        <?php }else{
                        $dates = str_replace('/', '-', $row['start_kerja']);

                        $orgDate = $dates;  
                        $newDate = date("Y-m-d", strtotime($orgDate));  

                        date_default_timezone_set('Asia/Jakarta');
                        $date_ac= date("Y-m-d");

                        $diff = abs(strtotime($newDate) - strtotime($date_ac));

                        $years = floor($diff / (365*60*60*24));
                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

                        if($years == 0){ 
                            echo $months.' Months';
                        }elseif($months == 0){
                            echo $years.' Years';
                        }else{
                            echo $years.' Years '.$months.' Months';
                        }
                    } ?>    
                </h2>
            </div>
            <div class="biodata-value-section">
                <h1>Birthday : &nbsp;</h1>
                <h2><?=$row['tanggal_lahir']?></h2>
            </div>
            <div class="biodata-value-section">
                <h1>Malang Adress : &nbsp;</h1>
            </div>
            <div class="biodata-value-section">
                <h2><?=$row['domisili_malang']?></h2>
            </div>

            <button class="btn-black" style="padding: 2% 4% !important; margin-top: 10%;">Details ></button>
        </div>

    <?php } ?>
</div>