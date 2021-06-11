<?php include '../../../../../src/connection/connection.php';

if($_FILES['file']['name'])
{
    $filename = explode(".", $_FILES['file']['name']);
    if($filename[1] == 'csv')
    {

        $handle = fopen($_FILES['file']['tmp_name'], "r");
        while($data = fgetcsv($handle))
        {
            $flip_id                = mysqli_real_escape_string($connect, $data[0]);  
            $date                   = mysqli_real_escape_string($connect, $data[1]);
            $total                  = mysqli_real_escape_string($connect, $data[2]);
            $basic_fee              = mysqli_real_escape_string($connect, $data[3]);
            $transport              = mysqli_real_escape_string($connect, $data[4]);  
            $absent                 = mysqli_real_escape_string($connect, $data[5]);  
            $overtime               = mysqli_real_escape_string($connect, $data[6]);  
            $bounty                 = mysqli_real_escape_string($connect, $data[7]);
            $tip                    = mysqli_real_escape_string($connect, $data[8]);
            $more                   = mysqli_real_escape_string($connect, $data[9]);
            $cashbon                = mysqli_real_escape_string($connect, $data[10]);
            $warranty               = mysqli_real_escape_string($connect, $data[11]);
            $note                   = mysqli_real_escape_string($connect, $data[12]);
            $thr                    = mysqli_real_escape_string($connect, $data[13]);

            if($date !== 'date'){
                if($date !== ''){
                    
                    $orgDate = "$date";  
                    $newDate = date("Y-m-d", strtotime($orgDate));  

                    $cek_id_nama  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE flip_id LIKE '%$flip_id%'");
                    while($row = mysqli_fetch_array($cek_id_nama)){
                        $id_nama    = $row['id_nama'];
                        $division   = $row['divisi'];
                        $role       = $row['role'];
                    }

                    $cek_id_division  = mysqli_query($connect, "SELECT * FROM tb_division WHERE division_name LIKE '%$division%'");
                    while($row = mysqli_fetch_array($cek_id_division)){
                        $id_division    = $row['id_division'];
                    }

                    $cek_id_role  = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division' && role_name='$role'");
                    while($row = mysqli_fetch_array($cek_id_role)){
                        $id_role    = $row['id_role'];
                    }

                    $sql_check = mysqli_query($connect, "SELECT * FROM tb_fee WHERE date='$newDate'");
                    if(mysqli_num_rows($sql_check) < 1) {
                        $query="SELECT MAX(cast(SUBSTR(code, 1) as UNSIGNED )) as maxCode FROM tb_fee";
                        $result = mysqli_query($connect, $query);
                        while($row =mysqli_fetch_array($result)) {
                        $maxCode = $row['maxCode'];
                            if($maxCode == NULL){
                                $no = 0;
                                $no++;
                            }else{
                                $no = (int) $maxCode;
                                $no++;
                            }
                        }
                    }else{
                        $cek_id_code  = mysqli_query($connect, "SELECT * FROM tb_fee WHERE date='$newDate'");
                        while($code = mysqli_fetch_array($cek_id_code)){
                            $no    = $code['code'];
                        } 
                    }


                    $sql_check_fee = mysqli_query($connect, "SELECT * FROM tb_fee WHERE id_nama='$id_nama' && date='$newDate'");
                    if(mysqli_num_rows($sql_check_fee) < 1) {
                    $query_biodata = "INSERT INTO tb_fee (id_fee, id_role, id_nama, code, date, basic_fee, transport_fee, absent, overtime, bounty, min_jaminan, min_cashbon, tip, thr, total, more, note, status) 
                    values 
                    (NULL, $id_role, '$id_nama', '$no', '$newDate', '$basic_fee', '$transport', '$absent', '$overtime','$bounty','$warranty','$cashbon','$tip', '$thr', '$total', '$more', '$note', 'Publish')";
                    mysqli_query($connect, $query_biodata);
                        $sql_check_activity = mysqli_query($connect, "SELECT * FROM tb_activity WHERE id_activity='$no'");
                        if(mysqli_num_rows($sql_check_activity) < 1) {
                            $query_activity = "INSERT INTO tb_activity (activity_id, id_activity, username) 
                            values 
                            (NULL, '$no', 'Heki')";
                            mysqli_query($connect, $query_activity);
                        }else{}
                    }else{}
                    
                }
            }
            
        }
    }
}