<header>
    <div class="option-select-page">
        <a 
        onclick="pageSalaryReport()"
        href="#">
            Salary and allowances
        </a>

        <a
        id="btn_send_money"
        onclick="pageSendMoney()"
        class="header-link-active" 
        href="#">
            Send Money
        </a>
    </div>

    <div class="right-option-select">
        <div class="main-select-date">
            <div class="date-value" >
                <p id="date-fee" class="title-date">Date</p>
                <input type="text" readonly id="date-fee-input" value="" class="hidden">
            </div>
            <button id="btn_select_date">Select Date</button>
        </div>
    </div>
</header>

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
            onclick="saveSetFee()"
            style="padding: 10.2% 10px;"
            class="btn-black-blue">Save
            </button>
        </div>
    </div>

    <div 
    style="margin-top: 1%;"
    class="content">
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

                $sql_check_row = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                if(mysqli_num_rows($sql_check_row) < 1) {
                    $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date=''");
                }else{
                    $query_biodata  = mysqli_query($connect, "SELECT tb_fee.status, tb_fee.thr, tb_fee.date, tb_role.basic_fee, tb_fee.id_role, (tb_fee.basic_fee) AS basic_fee_new, (tb_fee.transport_fee) AS transport_new, tb_fee.id_nama, tb_fee.id_fee, flip_id, tb_fee.absent, tb_role.transport, overtime, bounty, tip, min_cashbon, min_jaminan, more, note, total FROM tb_fee INNER JOIN tb_biodata ON tb_fee.id_nama=tb_biodata.id_nama INNER JOIN tb_role ON tb_fee.id_role=tb_role.id_role WHERE tb_fee.date='$param_date' && tb_fee.status='Save'");
                }
                while($row = mysqli_fetch_array($query_biodata)){ ?>
                <tr>
                    <td><?=$row['flip_id']?></td>
                    <td>
                        <?php $query_code = "SELECT MAX(cast(SUBSTR(code, 1) as UNSIGNED )) as maxCode FROM tb_fee";
                        $result_code = mysqli_query($connect, $query_code);
                        while($row_code =mysqli_fetch_array($result_code)) {
                        $maxCode = $row_code['maxCode'];
                            if($maxCode == NULL){
                                $no = 0;
                                $no++;
                                ?>
                                <input readonly class="hidden" id="code_fee" type="text" name="" value="<?=$no?>" />
                                <?php
                            }else{
                                $no = (int) $maxCode;
                                $no++;
                                ?>
                                <input readonly class="hidden" id="code_fee" type="text" name="" value="<?=$no?>" />
                                <?php
                            }
                        }

                        // Calc Total
                        if($row['transport_new'] == 0) { 
                            $transport = $row['transport'];
                        }else{
                            $transport = $row['transport_new'];
                        }

                        $total_fee = $row['basic_fee'] + $transport + $row['overtime'] + $row['bounty'] + $row['tip'] - $row['min_cashbon'] - $row['min_jaminan'] + $row['more'] + $row['thr'];
                        ?>
                        <input  type="text" class="form-input-normal hidden" name="" id="param_id_role" value="<?=$row['id_role']?>">
                        <input  type="text" class="form-input-normal hidden" name="" id="param_id_fee" value="<?=$row['id_fee']?>">
                        <input  type="text" class="form-input-normal hidden" name="" id="param_id" value="<?=$row['id_nama']?>">
                        <input readonly type="text" class="form-input-readonly total" name="" id="total" value="<?=$total_fee?>">
                    </td>
                    <td>
                        <?php
                        if($row['basic_fee_new'] == 0){
                        ?>
                        <input onclick="basic()" type="text" class="form-input-normal basic" name="" id="basic" value="<?=$row['basic_fee']?>">
                        <?php
                        }else{
                        ?>
                        <input onclick="basic()" type="text" class="form-input-normal basic" name="" id="basic" value="<?=$row['basic_fee_new']?>">
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <input onclick="absent()" type="text" class="form-input-normal absent" name="" id="absent" value="<?=$row['absent']?>">
                    </td>
                    <td>
                        
                        <input type="text" class="form-input-normal transport_v hidden" name="" value="<?=$row['transport']?>">
                        <?php if($row['transport_new'] == 0) { ?>
                        <input onclick="transport()" type="text" class="form-input-normal transport" name="" id="transport" value="<?=$row['transport']?>">
                        <?php }else{ ?>
                        <input onclick="transport()" type="text" class="form-input-normal transport" name="" id="transport" value="<?=$row['transport_new']?>">
                        <?php } ?>
                    </td>
                    <td>
                        <input onclick="overtime()" type="text" class="form-input-normal overtime" name="" id="overtime" value="<?=$row['overtime']?>">
                    </td>
                    <td>
                        <input onclick="bounty()" type="text" class="form-input-normal bounty" name="" id="bounty" value="<?=$row['bounty']?>">
                    </td>
                    <td>
                        <input onclick="tip()" type="text" class="form-input-normal tip" name="" id="tip" value="<?=$row['tip']?>">
                    </td>
                    <td class="bg-red-opacity">
                        <input onclick="cashbon()" type="text" class="form-input-normal cashbon" name="" id="cashbon" value="<?=$row['min_cashbon']?>">
                    </td>
                    <td class="bg-red-opacity">
                        <input onclick="warranty()" type="text" class="form-input-normal warranty" name="" id="warranty" value="<?=$row['min_jaminan']?>">
                    </td>
                    <td>
                        <input onclick="more()" type="text" class="form-input-normal more" name="" id="more" value="<?=$row['more']?>">
                    </td>
                    <td>
                        <input onclick="thr()" type="text" class="form-input-normal thr" name="" id="thr" value="<?=$row['thr']?>">
                    </td>
                    <td>
                        <textarea onclick="note()" name="note" id="note" cols="12" rows="3" class="form-input-normal note"></textarea>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>