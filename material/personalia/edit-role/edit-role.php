<header>
    <div class="option-select-page">
        <a class="header-link-active" href="#" onclick="add_team()">
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
            <a id="btn_editrole" onclick="pageHome()" class="link-section-title" href="#">Cancel</a>
        </div>
    </div>

    <div class="content">
        <input class="param-page" id="param-page" type="text" value="edit-role" readonly>
        
        <table class="table-team" id="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th scope="col">Team Name</th>
                    <th scope="col">Division</th>
                    <th scope="col">Role</th>
                    <th scope="col">
                        <button class="btn-black" style="width: 6vw; padding: 1%; float: right;" onclick="edit_data()">Save</button>
                    </th>
                </tr>
            </thead>
            <tbody id="team">
                <?php include '../../../../src/connection/connection.php';
                $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata ORDER BY nama ASC");
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
                            <select name="division[]" id="division" class="division">
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
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>