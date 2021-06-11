<header>
    <div class="option-select-page">
        <a 
        onclick="pageSalaryReport()"
        href="#">
            Salary and allowances
        </a>

        <a
        onclick="pageSendMoney()"
        class="header-link-active" 
        href="#">
            Send Money
        </a>
    </div>

    <div class="right-option-select">
        <strong id="date-fee">Date</strong>
    </div>
</header>

<div class="main-content">
    <div class="header-content personalia">
        <div class="main-sort">
            <strong>Sort by.</strong>
            <a href="#">Division</a>
            <a href="#">Role</a>
            <a href="#">Name</a>
        </div>
        <div class="action-personalia">
            <button 
            style="padding: 1.5% 10px;"
            id="btn_upload_csv" 
            onclick="modalUpload()" 
            class="btn-border">Upload CSV
            </button>

            <?php include '../../../../../src/connection/connection.php';
            $param_date = $_POST['date'];

            $sql_check_row = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
            if(mysqli_num_rows($sql_check_row) > 1) { ?>
                <button 
                style="padding: 1.5% 10px;"
                onclick="publishSetFee()"
                class="btn-border">Publish
                </button>
            <?php }else{} ?>

            <button 
            style="padding: 2.4% 10px;"
            onclick="pageSetFee()"
            class="btn-black-blue">Edit
            </button>
        </div>
    </div>

    <div 
    style="margin-top: 1%;"
    class="content">
    
        <!-- Param Date Send Money -->
        <?php include '../../../../../src/connection/connection.php';
        $query_date  = mysqli_query($connect, "SELECT MAX(date) as date FROM tb_fee WHERE status='Save'");
        while($data = mysqli_fetch_array($query_date)){
            if($data['date'] !== NULL){
                $date_sendmoney = $data['date'];
            }else{
                date_default_timezone_set('Asia/Jakarta');
                $date_sendmoney = date("Y-m-d");
            }
        } ?>
        <input readonly class="hidden" type="text" name="" id="date_sendmoney" value="<?=$date_sendmoney?>">

        <table class="table-elements-clear" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Total (Rp)</th>
                    <th scope="col">Basic</th>
                    <th scope="col">Absent</th>
                    <th scope="col">Transport</th>
                    <th scope="col">Overtime</th>
                    <th scope="col">Bounty</th>
                    <th scope="col">Tip</th>
                    <th class="bg-red-opacity" scope="col">Cashbon</th>
                    <th class="bg-red-opacity" scope="col">Warranty</th>
                    <th scope="col">More</th>
                    <th scope="col">THR</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody id="team">
                <?php include '../../../../../src/connection/connection.php';
                $param_date = $_POST['date'];

                $sql_check_row = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                if(mysqli_num_rows($sql_check_row) < 1) {
                    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date=''");
                }else{
                    $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                }
                
                while($row = mysqli_fetch_array($query_biodata)){ ?>
                <tr>
                    <td><?=$row['flip_id']?></td>
                    <td>
                        <input  type="text" class="form-control w-100 hidden" name="" id="param_id_role_sub" value="<?=$row['id_role']?>">
                        <input  type="text" class="form-control w-100 hidden" name="" id="param_id_fee_sub" value="<?=$row['id_fee']?>">
                        <input  type="text" class="form-control w-100 hidden" name="" id="param_id_sub" value="<?=$row['id_nama']?>">
                        <input  type="text" class="form-control w-100 hidden" name="" id="param_code_sub" value="<?=$row['code']?>">
                        <p class="text-600">Rp. <?=number_format($row['total'])?></p>
                    </td>
                    <td>Rp. <?=number_format($row['basic_fee'])?></td>
                    <td><?=$row['absent']?></td>
                    <td>Rp. <?=number_format($row['transport_fee'])?></td>
                    <td>Rp. <?=number_format($row['overtime'])?></td>
                    <td>Rp. <?=number_format($row['bounty'])?></td>
                    <td>Rp. <?=number_format($row['tip'])?></td>
                    <td class="bg-red-opacity">Rp. <?=number_format($row['min_cashbon'])?></td>
                    <td class="bg-red-opacity">Rp. <?=number_format($row['min_jaminan'])?></td>
                    <td>Rp. <?=number_format($row['more'])?></td>
                    <td>Rp. <?=number_format($row['thr'], 0, ".", ".")?></td>
                    <td><?=$row['note']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>