
<header>
    <div class="option-select-page">
        <a class="header-link-active" href="#">
            Information
        </a>
    </div>
</header>

<div class="main-content flex">
    <div class="main-left-breakpoint">
        <div class="header-content personalia information">
            <h1 class="title-content" id="introduction">
                Introduction
            </h1>
        </div>

        <div class="content">
            <p>Dashboard Fee is one of RRGRAPH's dashboards with functions to simplify the recording of payroll data, transparency of employee payrolls, and other features.</p>
        </div>

        <div class="header-content">
            <h1 class="title-content ft-information" id="quick_start">
                Quick Start
            </h1>
        </div>

        <div class="content">
            <p>Collect your bio to your admin. Then he will immediately register your account. And you only have to log in at rrgenkz.cyou.</p>
        </div>

        <div class="header-content">
            <h1 class="title-content ft-information" id="materials">
                Materials and Language Used
            </h1>
        </div>

        <div class="content">
            <div class="section-separator">
                <p>&#10004; PHP v7.4.16</p>
                <p>&#10004; MYSQL v5.1.0</p>
                <p>&#10004; JavaScript</p>
            </div>

            <div class="section-separator">
                <p>&#10004; jQuery v3.1.0</p>
                <p>&#10004; dataTables v.1.10.23</p>
                <p>&#10004; Google Font</p>
            </div>
        </div>

        <div class="header-content">
            <h1 class="title-content ft-information" id="level">
                Level in it
            </h1>
        </div>

        <div class="content">
            <div class="section-separator" style="margin-left: 1%;">
                <?php include '../../../../src/connection/connection.php';
                $sql_value_exist = mysqli_query($connect, "SELECT * FROM tb_level");

                $query_level  = mysqli_query($connect, "SELECT * FROM tb_level"); ?>
                <p>There are <strong><?=mysqli_num_rows($sql_value_exist)?></strong> levels provided on this dashboard, namely:</p>

                <?php while($row = mysqli_fetch_array($query_level)){ 
                $name_level = $row['level_name'];
                $sql_num_level = mysqli_query($connect, "SELECT * FROM tb_account WHERE role='$name_level'"); ?>
                    <p class="mt-info"><strong><?= $row['id_level'].'.'.$row['level_name']?></strong></p>
                    <p>A total of <?=mysqli_num_rows($sql_num_level)?> people as <?=$row['level_name']?>.</p>
                <?php } ?>
            </div>
        </div>

        <div class="header-content">
            <h1 class="title-content ft-information" id="division">
                Division in it
            </h1>
        </div>

        <div class="content">
            <div class="section-separator">
                <style>
                    td {
                        width: 20%;
                    }
                </style>
                <?php include '../../../../src/connection/connection.php';
                $sql_value_division = mysqli_query($connect, "SELECT * FROM tb_division");

                $query_division  = mysqli_query($connect, "SELECT * FROM tb_division"); ?>
                <p>There are <strong><?=mysqli_num_rows($sql_value_division)?></strong> divisions provided on this dashboard, namely:</p>

                <?php
                while($row = mysqli_fetch_array($query_division)){ 
                $id_division = $row['id_division'];
                $sql_num_role_division = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division'"); 

                $query_role  = mysqli_query($connect, "SELECT * FROM tb_role WHERE id_division='$id_division'"); ?>
                    <p style="margin-left: 1%;" class="mt-info"><strong><?= $row['id_division'].'.'.$row['division_name']?></strong></p>
                    <p style="margin-left: 1%;">There are <strong><?=mysqli_num_rows($sql_num_role_division);?></strong> roles:</p>
                    <table style="width: 70vw !important; margin-left: 2%;">
                        <tr>
                            <?php $no = 1;
                            $abj = 'a';  
                            while($data = mysqli_fetch_array($query_role)){ 
                            $division_name = $row['division_name'];
                            $role_name = $data['role_name'];
                            $query_num_role  = mysqli_query($connect, "SELECT * FROM tb_biodata WHERE divisi='$division_name' && role='$role_name'"); ?>
                                <td>
                                    <p><strong><?=$abj.'. '.$role_name?></strong></p>
                                    <p>Consists of <strong><?=mysqli_num_rows($query_num_role);?></strong> members.</p>
                                </td>
                            <?php if ($no % 5 == 0) { ?>
                                </tr>
                            <?php } 
                            $abj++;
                            $no++; 
                            } ?>
                    </table>
                <?php } ?>
            </div>
        </div>

        <div class="header-content">
            <h1 class="title-content ft-information" id="format_csv">
                Format Upload CSV
            </h1>
        </div>

        <div class="content">
            <div class="section-separator">
                <p>The provisions of the CSV format that are uploaded on each page.</p>
                <p class="mt-info"><strong>1. Format CSV (Add Team)</strong></p>
                <button onclick="csvAddTeam()" class="csv-download"> 
                    csv template
                </button>
                <div class="place-table-format" align="center">
                    <img src="../../assets/image/Format-AddTeam-Table.svg" alt="">
                </div>

                <p class="mt-info"><strong>2. Format CSV (Send Money)</strong></p>
                <button onclick="csvSendMoney()" class="csv-download"> 
                    csv template
                </button>
                <div class="place-table-format" align="center">
                    <img src="../../assets/image/Format-SendMoney-Table.svg" alt="">
                </div>
            </div>
        </div>

        <div class="content">
            <table class="table-team hidden" id="format_csv_add_team" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password Default</th>
                        <th scope="col">Domisili Malang</th>
                        <th scope="col">Alamat Asal</th>
                        <th scope="col">No. Handphone 1</th>
                        <th scope="col">No. Handphone 2</th>
                        <th scope="col">Nama Ibu</th>
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">No. Handphone Keluarga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Institusi</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Riwayat Penyakit</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>

            <table class="table-team hidden" id="format_csv_send_money" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th scope="col">flip_id</th>
                        <th scope="col">date</th>
                        <th scope="col">total</th>
                        <th scope="col">basic_fee</th>
                        <th scope="col">transport</th>
                        <th scope="col">absent</th>
                        <th scope="col">overtime</th>
                        <th scope="col">bounty</th>
                        <th scope="col">tip</th>
                        <th scope="col">more</th>
                        <th scope="col">cashbon</th>
                        <th scope="col">warranty</th>
                        <th scope="col">note</th>
                        <th scope="col">thr</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>

    </div>

    <div class="main-right-breakpoint">
        <a class="menu-breakpoint" href="#introduction">Introduction</a></br>
        <a class="menu-breakpoint" href="#quick_start">Quick Start</a></br>
        <a class="menu-breakpoint" href="#materials">Materials</a></br>
        <a class="menu-breakpoint" href="#materials">Language</a></br>
        <a class="menu-breakpoint" href="#level">Level in it</a></br>
        <a class="menu-breakpoint" href="#division">Division in it</a></br>
        <a class="menu-breakpoint" href="#format_csv">Format CSV</a></br>
        <a class="sub-menu-breakpoint" href="#csv_add_team">CSV Add Team</a></br>
        <a class="sub-menu-breakpoint" href="#css_send_money">CSV Send Money</a>
    </div>

</div>