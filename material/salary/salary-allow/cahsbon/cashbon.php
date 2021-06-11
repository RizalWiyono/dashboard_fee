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
    class="sub-content sub-content-active">
        Cashbon
    </div>
    <div 
    onclick="pageSetSalary()"
    class="sub-content">
        Set Salary
    </div>
</div>

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

<div class="main-content sub-main-border">
    <div class="content">
        
    </div>
</div>