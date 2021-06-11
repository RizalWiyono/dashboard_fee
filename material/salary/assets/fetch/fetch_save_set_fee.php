<?php include '../../../../../src/connection/connection.php';

    $id         = $_POST['param_id'];
    $id_fee     = $_POST['param_id_fee'];
    $id_role    = $_POST['param_id_role'];
    $total      = $_POST['param_total'];
    $basic      = $_POST['param_basic'];
    $absent     = $_POST['param_absent'];
    $transport  = $_POST['param_transport'];
    $overtime  = $_POST['param_overtime'];
    $bounty  = $_POST['param_bounty'];
    $tip  = $_POST['param_tip'];
    $cashbon  = $_POST['param_cashbon'];
    $warranty  = $_POST['param_warranty'];
    $more  = $_POST['param_more'];
    $thr  = $_POST['param_thr'];
    $note  = $_POST['param_note'];
    $date  = $_POST['param_date'];
    $code  = $_POST['param_code'];
    $param_date  = $_POST['date'];

    date_default_timezone_set('Asia/Jakarta');
    $date_ac= date("Y-m-d");
    $hour= date("H:i:s", strtotime('now +24 hours'));
    
    $sql_check = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id' && date='$param_date'");
    if(mysqli_num_rows($sql_check) < 1) {
        $query = "INSERT INTO tb_fee (id_fee, id_role, id_nama, code, date, basic_fee, transport_fee, absent, overtime, bounty, min_jaminan, min_cashbon, tip, thr, total, more, note, status) 
        values 
        ( NULL, $id_role, '$id', '$code', '$date', '$basic', '$transport', '$absent', '$overtime','$bounty','$warranty','$cashbon','$tip', '$thr', '$total', '$more', '$note', 'Save')";
        mysqli_query($connect, $query);
    }else{
        mysqli_query($connect, "UPDATE tb_fee SET status='Save', date='$date', basic_fee='$basic', transport_fee='$transport', absent='$absent', overtime='$overtime', bounty='$bounty', min_jaminan='$warranty', min_cashbon='$cashbon', tip='$tip', thr='$thr', total='$total', more='$more', note='$note' WHERE id_fee='$id_fee' && id_nama='$id'");
    }
