<?php include '../../../../../src/connection/connection.php';
$search = $_POST['search'];
$param  = $_POST['param'];

// Home Page
if($param == 'home-page' && $search !== NULL){
    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE nama LIKE '%$search%' ORDER BY nama ASC");
    while($row = mysqli_fetch_array($query_biodata)){ ?>
        <tr>
            <td>
                <?php $id = $row['id_nama'];
                $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                if(mysqli_num_rows($sql_check_img) < 1) { ?>

                    <?php if($row['gender'] == 'm'){ ?>
                    <img class="profile-image" src="../../assets/image/Man-Image.svg">
                    <?php }elseif($row['gender'] == 'w'){ ?>
                    <img class="profile-image" src="../../assets/image/Woman-Image.svg">
                    <?php }elseif($row['gender'] == 'Pria'){ ?>
                    <img class="profile-image" src="../../assets/image/Man-Image.svg">
                    <?php }elseif($row['gender'] == 'Perempuan'){ ?>
                    <img class="profile-image" src="../../assets/image/Woman-Image.svg">
                    <?php }

                }else{
                    $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                    while($img = mysqli_fetch_array($query_img)){
                    ?>

                        <img class="profile-image" src="<?=$img['image']?>">
                    <?php
                    }
                } ?>
                <h1 class="profile-name"><?=$row['nama']?></h1>
            </td>
            <td><?=$row['divisi']?></td>
            <td><?=$row['role']?></td> 
            <td style="text-align: right;">
                <canvas onclick="right_section_biodata('<?=$row['id_nama']?>')" class="arrow-section-right"></canvas>
            </td>
        </tr>
    <?php }
}elseif($param == 'home-page' && $search == NULL){
    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata ORDER BY nama ASC");
    while($row = mysqli_fetch_array($query_biodata)){ ?>
        <tr>
            <td>
                <?php $id = $row['id_nama'];
                $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                if(mysqli_num_rows($sql_check_img) < 1) { ?>

                    <?php if($row['gender'] == 'm'){ ?>
                    <img class="profile-image" src="../../assets/image/Man-Image.svg">
                    <?php }elseif($row['gender'] == 'w'){ ?>
                    <img class="profile-image" src="../../assets/image/Woman-Image.svg">
                    <?php }elseif($row['gender'] == 'Pria'){ ?>
                    <img class="profile-image" src="../../assets/image/Man-Image.svg">
                    <?php }elseif($row['gender'] == 'Perempuan'){ ?>
                    <img class="profile-image" src="../../assets/image/Woman-Image.svg">
                    <?php }

                }else{
                    $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                    while($img = mysqli_fetch_array($query_img)){
                    ?>

                        <img class="profile-image" src="<?=$img['image']?>">
                    <?php
                    }
                } ?>
                <h1 class="profile-name"><?=$row['nama']?></h1>
            </td>
            <td><?=$row['divisi']?></td>
            <td><?=$row['role']?></td> 
            <td style="text-align: right;">
                <canvas onclick="right_section_biodata('<?=$row['id_nama']?>')" class="arrow-section-right"></canvas>
            </td>
        </tr>
    <?php }
}elseif($param == 'edit-role' && $search !== NULL){
    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE nama LIKE '%$search%' ORDER BY nama ASC");
    while($row = mysqli_fetch_array($query_biodata)){ ?>
        <tr>
            <td>
                <input type="text" class="hidden" name="" id="param" value="edit-team">
                <input type="text" class="hidden id" id="id" value="<?=$row['id_nama']?>">
                <?php $id = $row['id_nama'];
                $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                if(mysqli_num_rows($sql_check_img) < 1) { ?>

                    <?php if($row['gender'] == 'm'){ ?>
                    <img class="profile-image" src="../../assets/image/Man-Image.svg">
                    <?php }elseif($row['gender'] == 'w'){ ?>
                    <img class="profile-image" src="../../assets/image/Woman-Image.svg">
                    <?php }elseif($row['gender'] == 'Pria'){ ?>
                    <img class="profile-image" src="../../assets/image/Man-Image.svg">
                    <?php }elseif($row['gender'] == 'Perempuan'){ ?>
                    <img class="profile-image" src="../../assets/image/Woman-Image.svg">
                    <?php }

                }else{
                    $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                    while($img = mysqli_fetch_array($query_img)){
                    ?>

                        <img class="profile-image" src="<?=$img['image']?>">
                    <?php
                    }
                } ?>
                <h1 class="profile-name"><?=$row['nama']?></h1>
            </td>
            <td>
                <select class="division" name="division[]" id="division">
                    <?php $query_division  = mysqli_query($connect, "SELECT * FROM tb_division");
                    while($data = mysqli_fetch_array($query_division)){ ?>
                        <option value="<?=$data['id_division']?>"><?=$data['division_name']?></option>
                    <?php }
                    $dvs = $row['divisi'];
                    $query_convert  = mysqli_query($connect, "SELECT * FROM tb_division WHERE division_name='$dvs'");
                    if(mysqli_num_rows($query_convert) < 1) { ?>
                            <option selected value=""></option>
                    <?php }else{
                        while($var = mysqli_fetch_array($query_convert)){ ?>
                            <option selected value="<?=$var['id_division']?>"><?=$row['divisi']?></option>
                        <?php  }
                    } ?>
                </select>
            </td>
            <td>
                <select class="form-control role w-100" name="role[]" id="role">
                    <?php $query_role  = mysqli_query($connect, "SELECT * FROM tb_role");
                    while($data = mysqli_fetch_array($query_role)){ ?>
                    <?php } ?>
                    <option selected value="<?=$row['role']?>"><?=$row['role']?></option>
                </select>    
            </td> 
            <td></td>
        </tr>
    <?php }
}elseif($param == 'edit-role' && $search == NULL){

}