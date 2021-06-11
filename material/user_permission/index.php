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
                        <img class="logo-personalia" src="../../assets/image/SideBar-Personalia-Icon.svg"/>
                    </a>
                </li>

                <li>
                    <a href="../salary/" class="tooltip_right" style="cursor: pointer;" title="Salary">
                        <img class="logo-salary" src="../../assets/image/SideBar-Salary-Icon.svg"/>
                    </a>
                </li>

                <li>
                    <a href="../user_permission/" class="tooltip_right" style="cursor: pointer;" title="User Permission">
                        <img class="logo-user logo-side-bar-active" src="../../assets/image/SideBar-User-Icon.svg"/>
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
                    "aaSorting": [[ 1, "asc" ]],
                    "bInfo": false,
                    "bAutoWidth": false,
                    sDom: 'lrtip'
                } );

                $('.btnDeleteUser').click(function(){
                    $(".form-input-normal").remove();
                    $(".save-one").remove();
                    $(".level").remove();
                    $("#save-user").remove();
                    $("strong").css("display", "block");
                    $("button").css("display", "");
                    $(".btn-action-edit").css("display", "");
                    var valueFlip   = $(this).parent().parent().children("td:eq(4)").children("#paramFlip").val();

                    Swal.fire({
                        title: valueFlip,
                        text: 'Are you sure you want to delete the login data for this account?',
                        imageUrl: '../../assets/image/Alarm-Icon.svg',
                        imageHeight: 80,
                        imageAlt: 'Custom image',
                        customClass: "delete-data-sweet",
                        confirmButtonText: 'Delete Now!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var valueId     = $(this).parent().parent().children("td:eq(4)").children("#paramId").val();

                                $.ajax({
                                    url:"assets/fetch/fetch_delete.php",
                                    method:"POST",
                                    data:{param_id:valueId},
                                    dataType:"text",
                                    success:function(data)
                                    {
                                        window.top.location = window.top.location
                                    },
                                });
                            }
                        })
                });

                $('.btnEditUser').click(function(){
                    $(".form-input-normal").remove();
                    $(".save-one").remove();
                    $(".level").remove();
                    $("#save-user").remove();
                    $("strong").css("display", "block");
                    $("button").css("display", "");
                    $(".btn-action-edit").css("display", "");

                    var valueParam = $(this).parent().parent().children("td:eq(4)").children("input").val();

                    var innerFirst = $(this).parent().parent().children("td:eq(0)").children("strong").html();
                    var htmlEmail = "<input class='form-input-normal' type='text' autocomplete='off' value='"+innerFirst+"' id='division' />";  
                    var innerSecond = $(this).parent().parent().children("td:eq(1)").children("strong").html();
                    var htmlFlip = "<input class='form-input-normal' type='text' autocomplete='off' value='"+innerSecond+"' id='role' />"; 
                    var valuePassword = $(this).parent().parent().children("td:eq(2)").children("#pass_old").val();
                    var htmlPassword = "<input class='form-input-normal' type='text' id='password' value='"+valuePassword+"' />";
                    var htmlLevel = "<select  name='level[]' id='level' class='level'><option>Admin</option><option>Analythic</option><option>User</option></select>";
                    var htmlActionButton = "<button id='save-user' class='btn-black saveUserPermission'>Save</button>";

                    $(this).parent().parent().children("td:eq(0)").children("strong").css("display", "none");
                    $(this).parent().parent().children("td:eq(0)").append(htmlEmail);
                    $(this).parent().parent().children("td:eq(1)").children("strong").css("display", "none");
                    $(this).parent().parent().children("td:eq(1)").append(htmlFlip);
                    $(this).parent().parent().children("td:eq(2)").children("input").css("display", "none");
                    $(this).parent().parent().children("td:eq(2)").append(htmlPassword);
                    $(this).parent().parent().children("td:eq(3)").children("strong").css("display", "none");
                    $(this).parent().parent().children("td:eq(3)").append(htmlLevel);
                    $(this).parent().parent().children("td:eq(4)").children("canvas").css("display", "none");
                    $(this).parent().parent().children("td:eq(4)").append(htmlActionButton);

                    $('.saveUserPermission').click(function(){
                        var param_id            = $(this).parent().parent().children("td:eq(4)").children("input").val();
                        var param_email         = $(this).parent().parent().children("td:eq(0)").children("input").val();
                        var param_flip          = $(this).parent().parent().children("td:eq(1)").children("input").val();
                        var param_password      = $(this).parent().parent().children("td:eq(2)").children("#password").val();
                        var param_level         = $(this).parent().parent().children("td:eq(3)").children("select").val();

                        $.ajax({
                            url:"assets/fetch/fetch_edit.php",
                            method:"POST",
                            data:{param_id:param_id, param_email:param_email, param_flip:param_flip, param_password:param_password, param_level:param_level},
                            dataType:"text",
                            success:function(data)
                            {
                                window.top.location = window.top.location
                            },
                        });

                        
                    });
                });
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