<div class="distance-content-right" style="padding: 10%;">
    <img class="img-addteam" src="../../assets/image/Add-Team-Icon.svg" alt="">
    
    <h1 class="title-content">Add Team by csv</h1>
    <h2 class="desc-title">please use this template for submit new team via csv</h2>

    <button class="btn-download-csv" id="downloadCSV" >Download CSV</button>

    <h2 class="desc-title">and upload your file here</h2>
    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
        <div class="drop-zone" align="center">
            <span class="drop-zone__prompt">Drop the Excel / CSV file here</span>
            <input id="csv" type="file" name="file" class="drop-zone__input" multiple="multiple">
        </div>
        <input onclick="form_submit()" type="submit" id="submit" name="submit" class="btn-black" value="Yes, Upload it!"/>
    <!-- </form> -->
</div>

<table class="table-team hidden" id="download_csv" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Email</th>
            <th scope="col">Password Default</th>
            <th scope="col">Full Name</th>
            <th scope="col">Flip Id</th>
            <th scope="col">Start Working (Month/Year)</th>
            <th scope="col">Gender (w/m)</th>
            <th scope="col">Place of Birth</th>
            <th scope="col">Date of Birth (m/d/yyyy)</th>
            <th scope="col">Domiciled in Malang</th>
            <th scope="col">Origin Address</th>
            <th scope="col">No Handphone 1</th>
            <th scope="col">No Handphone 2</th>
            <th scope="col">Mother's Name</th>
            <th scope="col">Father's Name</th>
            <th scope="col">Family No Handphone</th>
            <th scope="col">Status</th>
            <th scope="col">Religion</th>
            <th scope="col">Education</th>
            <th scope="col">institusi</th>
            <th scope="col">Majors</th>
            <th scope="col">History of Disease</th>
            <th scope="col">Division</th>
            <th scope="col">Role</th>
        </tr>
    </thead>
    <tbody>
        <?php include '../../../../src/connection/connection.php';
        $query_biodata  = mysqli_query($connect, "SELECT * FROM tb_biodata ORDER BY nama ASC");
        $no = 1;
        while($row = mysqli_fetch_array($query_biodata)){ ?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['password']?></td> 
                <td><?=$row['nama']?></td> 
                <td><?=$row['flip_id']?></td> 
                <td><?=$row['start_kerja']?></td> 
                <td><?=$row['gender']?></td> 
                <td><?=$row['tempat_lahir']?></td> 
                <td><?=$row['tanggal_lahir']?></td> 
                <td><?=$row['domisili_malang']?></td> 
                <td><?=$row['alamat_lain']?></td> 
                <td><?=$row['telpon']?></td> 
                <td><?=$row['telpon_2']?></td> 
                <td><?=$row['ibu']?></td> 
                <td><?=$row['ayah']?></td> 
                <td><?=$row['telpon_lain']?></td> 
                <td><?=$row['status']?></td> 
                <td><?=$row['agama']?></td> 
                <td><?=$row['pendidikan']?></td> 
                <td><?=$row['institusi']?></td> 
                <td><?=$row['jurusan']?></td> 
                <td><?=$row['riwayat_penyakit']?></td> 
                <td><?=$row['divisi']?></td> 
                <td><?=$row['role']?></td> 
            </tr>
            
        <?php $no++;
        } ?>
    </tbody>
</table>