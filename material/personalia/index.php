<!DOCTYPE html>
<html lang="en">
<head>
    <title>Personalia</title> 
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../assets/image/Circle-Logo-RRGraph.svg">

    <!-- No Cache -->
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&family=Poppins:wght@100;300;600&display=swap" rel="stylesheet">
    
    <!-- View -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Stylesheet DataTables -->
    <link rel="stylesheet" href="../../assets/css/datatables.min.css">
    
    <!-- Stylesheet jQuery Tooltip -->
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css">

    <!-- Stylesheet jQuery Tooltip -->
    <link rel="stylesheet" href="../../assets/css/sweetalert2.css">

</head>
<body style="overflow-y: hidden;">
    <canvas class="loader"></canvas>    
    
    <main>
        <div class="side-bar">
            <ul>
                <li>
                    <a href="/dashboard_option/index.php">
                        <img src="../../assets/image/Logo-RRGraph.svg"/>
                    </a>
                </li>

                <li>
                    <a href="#" class="tooltip_right" style="cursor: pointer;" title="Dashboard">
                        <img class="logo-dashboard" src="../../assets/image/SideBar-Dashboard-Icon.svg"/>
                    </a>
                </li>

                <li>
                    <a href="../personalia/" class="tooltip_right" style="cursor: pointer;" title="Personalia">
                        <img class="logo-personalia logo-side-bar-active" src="../../assets/image/SideBar-Personalia-Icon.svg"/>
                    </a>
                </li>

                <li>
                    <a href="../salary/" class="tooltip_right" style="cursor: pointer;" title="Salary">
                        <img class="logo-salary" src="../../assets/image/SideBar-Salary-Icon.svg"/>
                    </a>
                </li>

                <li>
                    <a href="../user_permission/" class="tooltip_right" style="cursor: pointer;" title="User Permission">
                        <img class="logo-user" src="../../assets/image/SideBar-User-Icon.svg"/>
                    </a>
                </li>

                <li>
                    <a href="../info/" class="tooltip_right" style="cursor: pointer;" title="Information">
                        <img class="logo-user" src="../../assets/image/Info-Icon.svg"/>
                    </a>
                </li>
                
                <li>
                    <a href="../initialization_setup/" class="tooltip_right" style="cursor: pointer;" title="Initialization Setup">
                        <img class="logo-setting" src="../../assets/image/SideBar-Setting-Icon.svg"/>
                    </a>
                </li>

                <li>
                    <a href="../../../src/auth/logout.php" class="tooltip_right" style="cursor: pointer;" title="Logout">
                        <img class="logo-logout" src="../../assets/image/SideBar-Logout-Icon.svg"/>
                    </a>
                </li>

            </ul>
        </div>

        <div class="container-information" align="center">
            <a href="#">
                <img src="../../assets/image/About-Icon.svg" alt="" onmouseover="hover_out_information()" onmouseout="hover_in_information()">
            </a></br>
            <img id="double_chevron" src="../../assets/image/Double-Chevron-Icon.svg" alt="">
        </div>

        <div class="main-center" id="center_section">
            
        </div>

        <div class="main-right" id="right_section">
            
        </div>
    </main>

    <!-- Script jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Script DataTables -->
    <script src="../../assets/js/datatables.min.js"></script>

    <!-- Script Tooltip -->
    <script src="../../assets/js/jquery-ui.js"></script>

    <!-- Script Sweetalert2 -->
    <script src="../../assets/js/sweetalert2.js"></script>

    <!-- Script -->
    <script src="../../assets/js/loader.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $.ajax({
            url: 'home/home.php',
            type: "POST",
            cache: false,
            success: function(data){
                $('#center_section').html(data); 

                $('#table').DataTable( {
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "aaSorting": [[ 0, "asc" ]],
                    "bInfo": false,
                    "bAutoWidth": false,
                    sDom: 'lrtip'
                } );
            }
        });

        $.ajax({
            url: 'default-right-section/default-right-section.php',
            type: "POST",
            cache: false,
            success: function(data){
                $('#right_section').html(data); 
            }
        });

        $( function() {
            $(".tooltip_right").tooltip({
                position: { my: "left+15 center", at: "right center" },
                tooltipClass: "custom-tooltip"
            });
        } );

    </script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>