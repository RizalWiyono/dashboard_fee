<header>
    <div class="option-select-page">
        <a class="header-link-active" href="#">
            User Permission
        </a>
    </div>

    <div 
    style="display: block;"
    class="right-option-select">
        <button 
        onclick="pageAddTeam()"
        style="padding: 1.4% 10px; float: right; margin-left: 2%;"
        class="btn-black">+Add Team</button>
        <button 
        style="padding: 1% 10px; float: right;"
        class="btn-border">Level</button>
    </div>
</header>

<div class="main-content">
    <div class="content">
        <input class="param-page" id="param-page" type="text" value="home-page" readonly>

        <table class="table-team" id="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Flip Id</th>
                    <th scope="col">Password</th>
                    <th scope="col">Level</th>
                    <th scope="col" style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody id="team">
                <?php include '../../../../src/connection/connection.php';
                $query_biodata  = mysqli_query($connect, "SELECT tb_biodata.nama, tb_account.id_account, tb_account.email, tb_account.pass, flip_id, tb_account.role, tb_account.id_nama FROM tb_account INNER JOIN tb_biodata ON tb_account.id_nama=tb_biodata.id_nama");
                while($row = mysqli_fetch_array($query_biodata)){ ?>
                    <tr>
                        <td>
                            <strong class="text-300"><?=$row['email']?></strong>
                        </td>
                        <td>
                            <strong class="text-300"><?=$row['flip_id']?></strong>
                        </td>
                        <td>
                            <input class="pass-view-user" disabled type="password" name="" id="">
                            <input class="hidden" readonly type="text" name="" id="pass_old" value="<?=$row['pass']?>">
                        </td>
                        <td>
                            <strong class="text-300"><?=$row['role']?></strong>
                        </td>
                        <td style="text-align: right;">
                            <input class="hidden" type="text" readonly name="" id="paramId" value="<?=$row['id_nama']?>">
                            <input class="hidden" type="text" readonly name="" id="paramFlip" value="<?=$row['flip_id']?>">
                            <canvas onclick="right_section_biodata('<?=$row['id_nama']?>')" class="edit-section-right btn-action-edit btnEditUser"></canvas>
                            <canvas onclick="right_section_biodata('<?=$row['id_nama']?>')" class="delete-section-right btn-action-edit btnDeleteUser"></canvas>
                            <canvas onclick="right_section_biodata('<?=$row['id_nama']?>')" class="arrow-section-right btn-action-edit"></canvas>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>