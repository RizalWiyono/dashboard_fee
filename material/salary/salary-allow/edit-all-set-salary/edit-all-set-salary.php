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
    class="sub-content">
        Salary Report
    </div>
    <div 
    onclick="pageCashbon()"
    class="sub-content">
        Cashbon
    </div>
    <div 
    onclick="pageSetSalary()"
    class="sub-content sub-content-active">
        Set Salary
    </div>
</div>

<div class="main-content sub-main-border">
    <div class="header-content personalia">
        <h1 class="title-content">
        </h1>

        <div class="action-personalia">
            <a id="btn_editrole" onclick="pageSetSalary()" class="link-section-title" href="#">Cancel</a>
        </div>
    </div>

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
                    <th scope="col">Division</th>
                    <th scope="col">Role</th>
                    <th scope="col">Basic Fee</th>
                    <th scope="col">Transport</th>
                    <th scope="col">
                        <button class="btn-black" style="width: 6vw; padding: 1%; float: right;" onclick="saveAllNewSalary()">Save</button>
                    </th>
                </tr>
            </thead>
            <tbody id="team">
                <?php include '../../../../../src/connection/connection.php';
                $query_division  = mysqli_query($connect, "SELECT * FROM `tb_role` INNER JOIN tb_division ON tb_division.id_division=tb_role.id_division WHERE tb_role.status!='Hide'");
                while($row = mysqli_fetch_array($query_division)){ ?>
                <tr>
                    <td>
                        <input id="id" type="text" readonly class="hidden role-id" value="<?=$row['id_role']?>">
                        <strong class="text-300"><?=$row['division_name']?></strong>
                    </td>   
                    <td>
                        <strong class="text-300"><?=$row['role_name']?></strong>
                    </td>
                    <td>
                        <input class='form-input-normal' type='text' autocomplete='off' value='<?=$row['basic_fee']?>' id='basic_fee' />
                    </td>
                    <td>
                        <input class='form-input-normal' type='text' autocomplete='off' value='<?=$row['transport']?>' id='transport' />
                    </td>
                    <td style="text-align: right;"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>