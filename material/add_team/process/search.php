<?php
include '../../../src/connection/connection.php';
$search = $_POST['search'];
$param  = $_POST['param'];

if($param == 'list-team'){
    $query="SELECT * FROM tb_biodata WHERE nama LIKE '%$search%' ORDER BY nama ASC";

    $result = mysqli_query($connect, $query);
    while($row =mysqli_fetch_array($result)) {
    ?>
        <tr class="sub-title-table">
            <td>
                <?php
                $id = $row['id_nama'];
                $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                if(mysqli_num_rows($sql_check_img) < 1) {
                ?>

                    <?php
                    if($row['gender'] == 'm'){
                    ?>
                    <img src="../../src/image/MAN-IC.svg">
                    <?php
                    }elseif($row['gender'] == 'w'){
                    ?>
                    <img src="../../src/image/WOMAN-IC.svg">
                    <?php
                    }elseif($row['gender'] == 'Pria'){
                    ?>
                    <img src="../../src/image/Man-IC.svg">
                    <?php
                    }elseif($row['gender'] == 'Perempuan'){
                    ?>
                    <img src="../../src/image/WOMAN-IC.svg">
                    <?php
                    }

                }else{
                    $query_img  = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                    while($img = mysqli_fetch_array($query_img)){
                    ?>

                        <img src="<?=$img['image']?>">
                    <?php
                    }
                }
                ?>

                <a class="nama-tb" href="?id=<?=$row['id_nama']?>"><?=$row['nama']?></a>
            </td>
            <td><?=$row['divisi']?></td>
            <td><?=$row['role']?></td>
            <td>
                <?php
                if(isset($_GET['id'])){
                    if($_GET['id'] == $row['id_nama']){
                    ?>
                        <a href="?id=<?=$row['id_nama']?>"><canvas class="btn-user-arrow-active float-right"></canvas></a>
                    <?php
                    }else{
                    ?>
                        <a href="?id=<?=$row['id_nama']?>"><canvas class="btn-user-arrow float-right"></canvas></a>
                    <?php
                    }
                }else{
                ?>
                    <a href="?id=<?=$row['id_nama']?>"><canvas class="btn-user-arrow float-right"></canvas></a>
                <?php
                }
                ?>
            </td>
        </tr> 
        <?php
    }
}else{}


