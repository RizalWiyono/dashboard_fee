<header>
    <div class="option-select-page">
        <a class="header-link-active" href="#">
            Personalia
        </a>
    </div>

    <div class="main-search">
        <form action="in/search.php?market=All Marketplace" method="POST">
            <input type="text" name="search" id="search" placeholder="Search name here" oninput="search_name()">
            <input type="submit" style="display: none;"> <img class="search-ic" src="../../assets/image/Search-Icon.svg" alt="">
        </form>
    </div>
</header>

<div class="main-content">
    <div class="header-content personalia">
        <h1 class="title-content">
            Personalia
        </h1>

        <div class="action-personalia">
            <button id="btn_addteam" onclick="pageAddTeam()" class="btn-black">+ Add Team</button>
            <a id="btn_editrole" onclick="pageEditRole()" class="link-section-title" href="#">Edit Role</a>
        </div>
    </div>

    <div class="content">
        <input class="param-page" id="param-page" type="text" value="home-page" readonly>

        <table class="table-team" id="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th scope="col">Team Name</th>
                    <th scope="col">Division</th>
                    <th scope="col">Role</th>
                    <th scope="col" style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody id="team">
                <?php include '../../../../src/connection/connection.php';
                $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata ORDER BY nama ASC");
                while($row = mysqli_fetch_array($query_biodata)){ ?>
                    <tr>
                        <td>
                            <?php $id = $row['id_nama'];
                            $sql_check_img = mysqli_query($connect, "SELECT * FROM tb_image WHERE id_nama='$id' ORDER BY id_image DESC LIMIT 1");
                            if(mysqli_num_rows($sql_check_img) < 1) {

                                if($row['gender'] == 'm'){ ?>
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
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>