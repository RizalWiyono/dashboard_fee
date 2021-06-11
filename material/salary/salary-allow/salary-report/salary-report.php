<header>
    <div class="option-select-page">
        <a 
        onclick="pageSalaryReport()"
        class="header-link-active" 
        href="#">
            Salary and allowances
        </a>

        <a 
        onclick="pageSendMoney()"
        href="#" >
            Send Money
        </a>
    </div>
</header>

<div class="sub-main-content">
<div 
    onclick="pageSalaryReport()"
    class="sub-content sub-content-active">
        Salary Report
    </div>
    <div 
    onclick="pageCashbon()"
    class="sub-content">
        Cashbon
    </div>
    <div 
    onclick="pageSetSalary()"
    class="sub-content">
        Set Salary
    </div>
</div>

<div class="main-content sub-main-border">
    <div class="content">
        <input class="param-page" id="param-page" type="text" value="home-page" readonly>

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

        <table class="table-elements" id="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th scope="col">Salary Date</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Receipents</th>
                    <th scope="col">Total (Rp)</th>
                    <th scope="col" style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody id="team">
                <?php include '../../../../../src/connection/connection.php';
                $query_activity  = mysqli_query($connect, "SELECT * FROM tb_activity");
                while($row = mysqli_fetch_array($query_activity)){
                    $code = $row['id_activity']; 

                    $query_date  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE code='$code' && status='Publish' && date!='0000-00-00' LIMIT 1");
                    while($data = mysqli_fetch_array($query_date)){
                        $orgDate = $data['date'];  
                        $date = date("d M Y", strtotime($orgDate));  
                    ?>
                    <tr>
                        <td><?=$date?></td>
                        <td><?=$row['username']?></td>

                        <?php $sql_sum = mysqli_query($connect, "SELECT * FROM tb_fee WHERE code='$code'"); ?>

                        <td><?=mysqli_num_rows($sql_sum)?></td>

                        <?php $query_sums  = mysqli_query($connect, "SELECT SUM(total) AS jumlah FROM tb_fee WHERE code='$code'");
                        while($datas = mysqli_fetch_array($query_sums)){ ?>

                        <td><?=number_format($datas['jumlah'])?></td>

                        <?php } ?>
                        <td style="text-align: right;">
                            <button 
                            onclick="linkPageSendMoneyDetail('<?=$data['date']?>')"
                            style="padding: 2% 10px;"
                            class="btn-black">
                                Details
                            </button>
                        </td>
                    </tr>
                    <?php } 
                } ?>
            </tbody>
        </table>
    </div>
</div>