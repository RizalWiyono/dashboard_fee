// Sweetalert

function uploadCsvSuccess() {
    Swal.fire({
        title: 'Thank You',
        text: 'CSV Successfully Uploaded',
        imageUrl: '../../assets/image/Upload-Csv-Icon.svg',
        imageHeight: 80,
        imageAlt: 'Custom image',
        confirmButtonText: 'See Details >',
        customClass: "success-csv"
    })
}

function loadingFile() {
    Swal.fire({
        allowOutsideClick: false,
        didOpen: () => {
        Swal.showLoading()
        },
        customClass: "loading-sweetalert",
    })
}

function successEdit() {
    Swal.fire({
        customClass: "success-edit",
        icon: 'success',
        title: 'Changes have been saved',
        showConfirmButton: false,
        timer: 1500
    })    
}

function successUpload() {
    Swal.fire({
        customClass: "success-edit",
        icon: 'success',
        title: 'Upload have been success',
        showConfirmButton: false,
        timer: 1500
    })    
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
  
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
  
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

function modalUpload() {
    $("#btn_upload_csv").addClass("btn-border-active");

    Swal.fire({
        title: '<strong>Upload your CSV here</strong>',
        customClass: "modal-upload",
        html:
        '<div class="drop-zone drop-zone-modal" align="center">' +
        '<span class="drop-zone__prompt">Drop the Excel / CSV file here</span>' +
        '<input id="csv" type="file" name="file" class="drop-zone__input">' +
        '</div>' +
        '<input style="padding: 1.5% 10px;" type="submit" onclick="uploadSendMoney()" class="btn-yellow" value="Yes, Upload it!">',
        showConfirmButton: false,
        showCancelButton: false,
        onClose: () => {
            $("#btn_upload_csv").removeClass("btn-border-active");
        }
    });

    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");
    
        dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
        });
    
        inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
        });
    
        dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
        });
    
        ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
        });
        });
    
        dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();
    
        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }
    
        dropZoneElement.classList.remove("drop-zone--over");
        });
    });
    
    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
    
        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }
    
        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
        }
    
        thumbnailElement.dataset.label = file.name;
        $(".drop-zone").css("height", "10vw").css("padding", "1vw");
    
        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
        const reader = new FileReader();
    
        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
        } else {
        thumbnailElement.style.backgroundImage = null;
        }
    }
}
  
var section = getUrlParameter('section');

// Param Page
if(section === 'edit-role'){
    $(document).ready(function(){
        $( "#btn_editrole" ).trigger( "click" );
    });
}
// Personalia Script
function pageAddTeam() {

    $('#btn_addteam').addClass("black-active"); 

    $.ajax({
        url: '../../material/personalia/add-data/add-data.php',
        type: "POST",
        cache: false,
        success: function(data){
            $('#right_section').html(data); 

            document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
                const dropZoneElement = inputElement.closest(".drop-zone");
            
                dropZoneElement.addEventListener("click", (e) => {
                inputElement.click();
                });
            
                inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
                });
            
                dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("drop-zone--over");
                });
            
                ["dragleave", "dragend"].forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    dropZoneElement.classList.remove("drop-zone--over");
                });
                });
            
                dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();
            
                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }
            
                dropZoneElement.classList.remove("drop-zone--over");
                });
            });
            
            /**
             * Updates the thumbnail on a drop zone element.
             *
             * @param {HTMLElement} dropZoneElement
             * @param {File} file
             */
            function updateThumbnail(dropZoneElement, file) {
                let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
            
                // First time - remove the prompt
                if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                dropZoneElement.querySelector(".drop-zone__prompt").remove();
                }
            
                // First time - there is no thumbnail element, so lets create it
                if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("drop-zone__thumb");
                dropZoneElement.appendChild(thumbnailElement);
                }
            
                thumbnailElement.dataset.label = file.name;
                $(".drop-zone").css("height", "10vw").css("padding", "1vw");
            
                // Show thumbnail for image files
                if (file.type.startsWith("image/")) {
                const reader = new FileReader();
            
                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
                } else {
                thumbnailElement.style.backgroundImage = null;
                }
            }
            
            $(document).ready(function() {
                $('#download_csv').DataTable( {
                    sDom: 'Brtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "aaSorting": [[ 0, "asc" ]],
                    "bInfo": false,
                    "bAutoWidth": false,
                } );
                $("#download_csv_wrapper").css("display", "none");
            } );

            $("#downloadCSV").click(function(){
                $('.buttons-csv').trigger('click');
            });
              
        }
    });
}

function pageEditRole() {
    window.history.pushState("http:/rrgenkz.cyou", "Edit Role", "?section=edit-role");

    $.ajax({
        url: '../../material/personalia/edit-role/edit-role.php',
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
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );

            let division = document.getElementsByClassName("division");
            for(let i=0; i <= division.length; i++) {
                division[i].addEventListener("change", function() {
                    let sub = document.getElementsByClassName("role")[i];
                    let form  = new FormData();
                    form.append("id", division[i].value);

                        fetchAPI('assets/fetch/fetch_sub.php', form , function(data){
                            let role = `<option value=""></option>`;
                            for(let y=0; y<data.data.length; y++) {
                                role += `<option value="${data.data[y].name}">${data.data[y].name}</option>`;
                            } 

                            sub.innerHTML = "";
                            sub.innerHTML += role;
                        });
                });
            }

            function fetchAPI(url, data, callback) {
                fetch(url, {
                    method: 'POST',
                    body: data,
                }).then((response) => {
                    if(response.status == 200) {
                        return response.json();
                    }
                }).then((res) => {
                    return callback(res)
                }).catch((err) => {
                    console.error(err)
                });


            }

            
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
}

function edit_data() { 
    loadingFile();

    var e_id        = document.querySelectorAll('#id');
    var e_division  = document.querySelectorAll('#division');
    var e_role      = document.querySelectorAll('#role');
    var array       = [];
    for (var i = 0; i < e_id.length; i++) {
        array.push({id: e_id[i].value, division: e_division[i].value, role: e_role[i].value});
    }

    array.forEach(function(array) {
        var param_id            = array.id;
        var param_division      = array.division;
        var param_role          = array.role;

        $.ajax({
            url:"assets/fetch/fetch_input.php",
            method:"POST",
            data:{param_id:param_id, param_division:param_division, param_role:param_role},
            dataType:"text",
            success:function(data)
            {
            },
        });
    });
  

    var delayInMilliseconds = 8000;
    setTimeout(function() {
        successEdit();
    }, delayInMilliseconds);
}

function pageHome() {
    window.history.pushState("http:/rrgenkz.cyou", "Home", "?");

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
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
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
}

function right_section_biodata(param) {
    window.history.pushState("http:/rrgenkz.cyou", "Biodata", "?section=biodata_"+param);
    
    $.ajax({
        url: 'biodata-section/biodata-section.php',
        type: "POST",
        cache: false,
        data: {param:param}, 
        success: function(data){
            $('#right_section').html(data); 
        }
    });

    $(".arrow-section-right").removeClass("arrow-section-right-active");
    $(event.target).addClass("arrow-section-right-active");
}

function hover_out_information() {
    $("#double_chevron").fadeOut("fast");
}

function hover_in_information() {
    $("#double_chevron").fadeIn("fast");
}

function search_name() {
    var param   = $("#param-page").val();
    var search  = $("#search").val();

    $.ajax({
        url: 'assets/fetch/fetch_table.php',
        type: "POST",
        cache: false,
        data: {param:param, search:search}, 
        success: function(data){
            $('#team').html(data); 

            let division = document.getElementsByClassName("division");
            for(let i=0; i <= division.length; i++) {
                division[i].addEventListener("change", function() {
                    let sub = document.getElementsByClassName("role")[i];
                    let form  = new FormData();
                    form.append("id", division[i].value);

                        fetchAPI('assets/fetch/fetch_sub.php', form , function(data){
                            let role = `<option value=""></option>`;
                            for(let y=0; y<data.data.length; y++) {
                                role += `<option value="${data.data[y].name}">${data.data[y].name}</option>`;
                            } 

                            sub.innerHTML = "";
                            sub.innerHTML += role;
                        });
                });
            }

            function fetchAPI(url, data, callback) {
                fetch(url, {
                    method: 'POST',
                    body: data,
                }).then((response) => {
                    if(response.status == 200) {
                        return response.json();
                    }
                }).then((res) => {
                    return callback(res)
                }).catch((err) => {
                    console.error(err)
                });


            }
        }
    });

    
}

function form_submit() {

    var fd = new FormData();
    var files = $('#csv')[0].files;

    // Check file selected or not
    if(files.length > 0 ){
        $("#submit").css("display", "none");
        loadingFile();
        fd.append('file',files[0]);

        $.ajax({
            url: 'assets/fetch/fetch_upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
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
                            sDom: 'lrtip',
                            'columnDefs': [ {
                                'targets': [1,3], // column index (start from 0)
                                'orderable': false, // set orderable false for selected columns
                             }]
                        } );

                        uploadCsvSuccess()
                    }
                });

                pageAddTeam();
            $('#team').html(data); 
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    }else{
    }
}

// Salary Script

function pageSalaryReport() {
    window.history.pushState("http:/rrgenkz.cyou", "Salary and Allowances", "?main=salary-report");

    $.ajax({
        url: 'salary-allow/salary-report/salary-report.php',
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
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );
        }
    });
}

function pageCashbon() {
    window.history.pushState("http:/rrgenkz.cyou", "Cashbon", "?section=cashbon");

    $.ajax({
        url: '../../material/salary/salary-allow/cahsbon/cashbon.php',
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
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );
        }
    });
}

function pageSetSalary() {
    window.history.pushState("http:/rrgenkz.cyou", "Set Salary", "?section=set-salary");

    $.ajax({
        url: '../../material/salary/salary-allow/set-salary/set-salary.php',
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
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );

            $('.btnEditSalary').click(function(){
                $(".form-input-normal").remove();
                $(".save-one").remove();
                $("strong").css("display", "block");
                $("button").css("display", "");
                // console.log($(this).parent().parent().children("td:eq(0)").children(".role-id").val());
                var innerFirst = $(this).parent().parent().children("td:eq(0)").children("strong").html();
                var htmlDivision = "<input class='form-input-normal' type='text' autocomplete='off' value='"+innerFirst+"' id='division' />";  
                var innerSecond = $(this).parent().parent().children("td:eq(1)").children("strong").html();
                var htmlRole = "<input class='form-input-normal' type='text' autocomplete='off' value='"+innerSecond+"' id='role' />";  
                var innerThird = $(this).parent().parent().children("td:eq(2)").children("strong").html();
                var substrBasicFee = innerThird.substring(4);
                var fixBasicFee = substrBasicFee.split('.').join("");
                var htmlBasicFee = "<input class='form-input-normal' type='text' autocomplete='off' value='"+fixBasicFee+"' id='basic_fee' />";
                var innerFour = $(this).parent().parent().children("td:eq(3)").children("strong").html();
                var substrTransport = innerFour.substring(4);
                var fixTransport = substrTransport.split('.').join("");
                var htmlTransport = "<input class='form-input-normal' type='text' autocomplete='off' value='"+fixTransport+"' id='transport' />";
                var htmlActionButton = "<button class='btn-black save-one btnSaveSalary' style='padding: 2% 10px;'>Save</button>";

                $(this).parent().parent().children("td:eq(2)").children("strong").css("display", "none");
                $(this).parent().parent().children("td:eq(2)").append(htmlBasicFee);
                $(this).parent().parent().children("td:eq(3)").children("strong").css("display", "none");
                $(this).parent().parent().children("td:eq(3)").append(htmlTransport);
                $(this).parent().parent().children("td:eq(4)").children("button").css("display", "none");
                $(this).parent().parent().children("td:eq(4)").append(htmlActionButton);

                $('.btnSaveSalary').click(function(){
                    var param_id            = $(this).parent().parent().children("td:eq(0)").children(".role-id").val();
                    // var param_division      = $(this).parent().parent().children("td:eq(0)").children("#division").val();
                    // var param_role          = $(this).parent().parent().children("td:eq(1)").children("#role").val();
                    var param_basic_fee     = $(this).parent().parent().children("td:eq(2)").children("#basic_fee").val();
                    var param_transport     = $(this).parent().parent().children("td:eq(3)").children("#transport").val();

                    $.ajax({
                        url:"assets/fetch/fetch_one_edit.php",
                        method:"POST",
                        data:{param_id:param_id, param_basic_fee:param_basic_fee, param_transport:param_transport},
                        dataType:"text",
                        success:function(data)
                        {
                            pageSetSalary()
                            successEdit()
                        },
                    });
                });
            });
            
        }
    });
}

function pageEditAllSetSalary() {
    window.history.pushState("http:/rrgenkz.cyou", "Set Salary", "?section=set-salary-all");

    $.ajax({
        url: '../../material/salary/salary-allow/edit-all-set-salary/edit-all-set-salary.php',
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
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );

        }
    });
}

function saveAllNewSalary(){
    loadingFile();
    
    var e_id        = document.querySelectorAll('#id');
    var e_basic_fee = document.querySelectorAll('#basic_fee');
    var e_transport = document.querySelectorAll('#transport');
    var array       = [];
    for (var i = 0; i < e_id.length; i++) {
        array.push({id: e_id[i].value, basic_fee: e_basic_fee[i].value, transport: e_transport[i].value});
    }

    array.forEach(function(array) {
        var param_id            = array.id;
        var param_basic_fee     = array.basic_fee;
        var param_transport     = array.transport;

        $.ajax({
            url:"assets/fetch/fetch_edit_all.php",
            method:"POST",
            data:{param_id:param_id, param_basic_fee:param_basic_fee, param_transport:param_transport},
            dataType:"text",
            success:function(data)
            {
            },
        });
    });

    var delayInMilliseconds = 8000;
    setTimeout(function() {
        successEdit();
        pageSetSalary()
    }, delayInMilliseconds);
}

function pageSendMoney() {
    var date_par = $("#date_sendmoney").val();
    window.history.pushState("http:/rrgenkz.cyou", "Send Money", "?date="+date_par+"&&main=send-money");
    var date = getUrlParameter('date');

    $.ajax({
        url: 'send-money/set-money/set-money.php',
        type: "POST",
        cache: false,
        data:{date:date},
        success: function(data){
            $('#center_section').html(data); 

            $('#table').DataTable( {
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "aaSorting": [[ 0, "asc" ]],
                "bInfo": false,
                "bAutoWidth": false,
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );

            $('#date-fee').html(date);
        }
    });
}

function uploadSendMoney() {
    var date_par = $("#date_sendmoney").val();
    window.history.pushState("http:/rrgenkz.cyou", "Send Money", "?date="+date_par+"&&main=send-money");
    var date = getUrlParameter('date');

    var fd = new FormData();
    var files = $('#csv')[0].files;

    // Check file selected or not
    if(files.length > 0 ){
        $("#submit").css("display", "none");
        loadingFile();
        fd.append('file',files[0]);

        $.ajax({
            url: 'assets/fetch/fetch_upload_csv.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){

                $.ajax({
                    url: 'send-money/set-money/set-money.php',
                    type: "POST",
                    cache: false,
                    data:{date:date},
                    success: function(data){
                        successUpload()

                        $('#center_section').html(data); 

                        $('#table').DataTable( {
                            "bPaginate": false,
                            "bLengthChange": false,
                            "bFilter": true,
                            "aaSorting": [[ 0, "asc" ]],
                            "bInfo": false,
                            "bAutoWidth": false,
                            sDom: 'lrtip',
                            'columnDefs': [ {
                                'targets': [1,3], // column index (start from 0)
                                'orderable': false, // set orderable false for selected columns
                            }]
                        } );

                        $('#date-fee').html(date);
                    }
                });
        },
        error: function(xhr, textStatus, error){
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        }
        });
    }else{}
}

function pageSetFee() {
    var date_par = $("#date_sendmoney").val();
    window.history.pushState("http:/rrgenkz.cyou", "Send Money", "?date="+date_par+"&&main=set-fee");
    var date = getUrlParameter('date');

    $.ajax({
        url: 'send-money/set-fee/set-fee.php',
        type: "POST",
        cache: false,
        data:{date:date},
        success: function(data){
            $('#center_section').html(data); 

            $('#table').DataTable( {
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "aaSorting": [[ 0, "asc" ]],
                "bInfo": false,
                "bAutoWidth": false,
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );

            $('#date-fee').html(date);
            $('#date-fee-input').val(date);

            $("#btn_select_date").click(function(){
                $("#btn_select_date").addClass("select-btn-active");
            });

            $('#btn_select_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10)
            }, function(start) {
                var date = start.format('YYYY-MM-DD');
                $(".title-date").html(date);
                window.history.pushState("http:/rrgenkz.cyou", "Send Money", "?date="+date+"&&main=set-fee");
            });
            
            $("#btn_select_date").on("blur", function(e) { 
                $("#btn_select_date").removeClass("select-btn-active");
            });

            
              
            
        }
    });
}

function pagePublish() {
    var date_par = $("#date_sendmoney").val();
    window.history.pushState("http:/rrgenkz.cyou", "Send Money", "?date="+date_par+"&&main=set-fee");
    var date = getUrlParameter('date');

    $.ajax({
        url: 'send-money/set-fee/set-fee.php',
        type: "POST",
        cache: false,
        data:{date:date},
        success: function(data){
            $('#center_section').html(data); 

            $('#table').DataTable( {
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "aaSorting": [[ 0, "asc" ]],
                "bInfo": false,
                "bAutoWidth": false,
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            } );

            $('#date-fee').html(date);
            $('#date-fee-input').val(date);

            $("#btn_select_date").click(function(){
                $("#btn_select_date").addClass("select-btn-active");
            });

            $('#btn_select_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10)
            }, function(start) {
                var date = start.format('YYYY-MM-DD');
                $(".title-date").html(date);
                window.history.pushState("http:/rrgenkz.cyou", "Send Money", "?date="+date+"&&main=set-fee");
            });
            
            $("#btn_select_date").on("blur", function(e) { 
                $("#btn_select_date").removeClass("select-btn-active");
            });

            
              
            
        }
    });
}

function linkPageSendMoneyDetail(date) {

    window.history.pushState("http:/rrgenkz.cyou", "Send Money", "?date="+date+"&&main=publish");

    $.ajax({
        url: 'send-money/publish-page/publish-page.php',
        type: "POST",
        cache: false,
        data:{date:date},
        success: function(data){
            $('#center_section').html(data); 
            $("#date-fee").html(date);

            $('#table').DataTable( {
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "aaSorting": [[ 0, "asc" ]],
                "bInfo": false,
                "bAutoWidth": false,
                sDom: 'lrtip',
                'columnDefs': [ {
                    'targets': [1,3], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                 }]
            });

            $(document).ready(function() {
                $('#export_flip').DataTable( {
                    sDom: 'Brtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "aaSorting": [[ 0, "asc" ]],
                    "bInfo": false,
                    "bAutoWidth": false,
                } );
                $("#export_flip_wrapper").css("display", "none");
            } );

            $("#export_flip_btn").click(function(){
                $('.buttons-csv').trigger('click');
            });
        }
    });
}

// Process Send Money
function saveSetFee() { 
    loadingFile()
  
    var e_id          = document.querySelectorAll('#param_id');
    var e_id_fee      = document.querySelectorAll('#param_id_fee');
    var e_id_role     = document.querySelectorAll('#param_id_role');
    var e_total       = document.querySelectorAll('#total');
    var e_basic       = document.querySelectorAll('#basic');
    var e_absent      = document.querySelectorAll('#absent');
    var e_transport   = document.querySelectorAll('#transport');
    var e_overtime    = document.querySelectorAll('#overtime');
    var e_bounty      = document.querySelectorAll('#bounty');
    var e_tip         = document.querySelectorAll('#tip');
    var e_cashbon     = document.querySelectorAll('#cashbon');
    var e_warranty    = document.querySelectorAll('#warranty');
    var e_more        = document.querySelectorAll('#more');
    var e_thr         = document.querySelectorAll('#thr');
    var e_note        = document.querySelectorAll('#note');
    var array         = [];
  
    for (var i = 0; i < e_id.length; i++) {
        array.push({id: e_id[i].value, thr: e_thr[i].value, id_fee: e_id_fee[i].value, id_role: e_id_role[i].value, total: e_total[i].value, basic: e_basic[i].value, absent: e_absent[i].value, transport: e_transport[i].value, overtime: e_overtime[i].value, bounty: e_bounty[i].value, tip: e_tip[i].value, cashbon: e_cashbon[i].value, warranty: e_warranty[i].value, more: e_more[i].value, note: e_note[i].value});
    }
  
    $.each(array, function(i, array){
        var param_id            = array.id;
        var param_id_fee        = array.id_fee;
        var param_id_role       = array.id_role;
        var param_total         = array.total;
        var param_basic         = array.basic;
        var param_absent        = array.absent; 
        var param_transport     = array.transport;
        var param_overtime      = array.overtime;
        var param_bounty        = array.bounty;
        var param_tip           = array.tip;
        var param_cashbon       = array.cashbon;
        var param_warranty      = array.warranty;
        var param_more          = array.more;
        var param_thr           = array.thr;
        var param_note          = array.note;
        var param_date          = $(".title-date").html()
        var param_code          = $("#code_fee").val();
        var date                = $("#date-fee-input").val();
  
        $.ajax({
            url:"assets/fetch/fetch_save_set_fee.php",
            method:"POST",
            data:{date:date, param_thr:param_thr, param_code:param_code, param_date:param_date, param_id:param_id, param_id_fee:param_id_fee, param_id_role:param_id_role, param_total:param_total, param_basic:param_basic, param_absent:param_absent, param_transport:param_transport, param_overtime:param_overtime, param_bounty:param_bounty, param_tip:param_tip, param_cashbon:param_cashbon, param_warranty:param_warranty, param_more:param_more, param_note:param_note},
            dataType:"JSON",
            success:function(data)
            {
            },error: function(xhr, status, error) {
                console.log(err.Message);
              }
            
        });
      
  });
  
    var delayInMilliseconds = 10000;
  
    setTimeout(function() {
        pageSetFee();

        var delayInMillisecondsPage = 2000;
        setTimeout(function() {
            successEdit();
            pageSendMoney();
        }, delayInMillisecondsPage);
    }, delayInMilliseconds);
}

function publishSetFee() { 
    loadingFile()
  
    var e_id          = document.querySelectorAll('#param_id_sub');
    var e_id_fee      = document.querySelectorAll('#param_id_fee_sub');
    var e_id_role     = document.querySelectorAll('#param_id_role_sub');
    var e_code       = document.querySelectorAll('#param_code_sub');
    var array         = [];
  
    for (var i = 0; i < e_id.length; i++) {
        array.push({id: e_id[i].value, id_fee: e_id_fee[i].value, id_role: e_id_role[i].value, code: e_code[i].value});
    }
  
    $.each(array, function(i, array){
        var param_id            = array.id;
        var param_id_fee        = array.id_fee;
        var param_id_role       = array.id_role;
        var param_code          = array.code;
  
        var date                = $("#date-fee").html();
  
        $.ajax({
            url:"assets/fetch/fetch_publish.php",
            method:"POST",
            data:{date:date, param_code:param_code, param_id:param_id, param_id_fee:param_id_fee, param_id_role:param_id_role, param_code:param_code},
            dataType:"JSON",
            success:function(data)
            {
            }
            
        });
      
    });
    
    var delayInMilliseconds = 10000;
  
    setTimeout(function() {
        var delayInMillisecondsPage = 2000;
        setTimeout(function() {
            var date            = $("#date-fee").html();

            linkPageSendMoneyDetail(date);
            successEdit();
        }, delayInMillisecondsPage);
    }, delayInMilliseconds);
  
}

function basic(){
  let bsc = document.getElementsByClassName("basic");
  for(let i=0; i <= bsc.length; i++) {
      bsc[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value = eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  
  }
}

function absent(){
  let division = document.getElementsByClassName("absent");
  for(let i=0; i <= division.length; i++) {
      division[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          transport.value = transport_v-(division_v*20000);
          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function overtime(){
  let otm = document.getElementsByClassName("overtime");
  for(let i=0; i <= otm.length; i++) {
    otm[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function transport(){
  let trn = document.getElementsByClassName("transport");
  for(let i=0; i <= trn.length; i++) {
    trn[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function bounty(){
  let bnt = document.getElementsByClassName("bounty");
  for(let i=0; i <= bnt.length; i++) {
    bnt[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function tip(){
  let tp = document.getElementsByClassName("tip");
  for(let i=0; i <= tp.length; i++) {
      tp[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function cashbon(){
  let csb = document.getElementsByClassName("cashbon");
  for(let i=0; i <= csb.length; i++) {
      csb[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function warranty(){
  let wrn = document.getElementsByClassName("warranty");
  for(let i=0; i <= wrn.length; i++) {
      wrn[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function more(){
  let mr = document.getElementsByClassName("more");
  for(let i=0; i <= mr.length; i++) {
      mr[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let thr = document.getElementsByClassName("thr")[i];
          let total = document.getElementsByClassName("total")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

function thr(){
    let thr = document.getElementsByClassName("thr");
    for(let i=0; i <= thr.length; i++) {
        thr[i].addEventListener("input", function(e) {
            let division_v = document.getElementsByClassName("absent")[i].value;
            let transport = document.getElementsByClassName("transport")[i];
            let transport_v = document.getElementsByClassName("transport_v")[i].value;
            let basic = document.getElementsByClassName("basic")[i];
            let overtime = document.getElementsByClassName("overtime")[i];
            let bounty = document.getElementsByClassName("bounty")[i];
            let thr = document.getElementsByClassName("thr")[i];
            let tip = document.getElementsByClassName("tip")[i];
            let cashbon = document.getElementsByClassName("cashbon")[i];
            let warranty = document.getElementsByClassName("warranty")[i];
            let more = document.getElementsByClassName("more")[i];
            let total = document.getElementsByClassName("total")[i];
  
            total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
        });
    }
  }

function note(){
  let nt = document.getElementById("note");
  for(let i=0; i <= nt.length; i++) {
      nt[i].addEventListener("input", function(e) {
          let division_v = document.getElementsByClassName("absent")[i].value;
          let transport = document.getElementsByClassName("transport")[i];
          let transport_v = document.getElementsByClassName("transport_v")[i].value;
          let basic = document.getElementsByClassName("basic")[i];
          let overtime = document.getElementsByClassName("overtime")[i];
          let bounty = document.getElementsByClassName("bounty")[i];
          let tip = document.getElementsByClassName("tip")[i];
          let cashbon = document.getElementsByClassName("cashbon")[i];
          let warranty = document.getElementsByClassName("warranty")[i];
          let more = document.getElementsByClassName("more")[i];
          let total = document.getElementsByClassName("total")[i];
          let thr = document.getElementsByClassName("thr")[i];

          total.value =  eval(thr.value) + eval(transport.value) + eval(basic.value) + eval(overtime.value) + eval(bounty.value) + eval(tip.value) - eval(cashbon.value) - eval(warranty.value) + eval(more.value);
      });
  }
}

// Script User Permission
function csvAddTeam(){
    $('.csvAddTeam').trigger('click');
}

function csvSendMoney(){
    $('.csvSendMoney').trigger('click');
}