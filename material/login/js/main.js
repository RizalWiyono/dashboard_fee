var parts = window.location.search.substr(1).split("&");
var $_GET = {};
for (var i = 0; i < parts.length; i++) {
    var temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}


var param = $_GET['wait'];

const interval = setInterval(function() {
    $.ajax({
        url:"fetch/check.php",
        method:"GET",
        data:{param:param},
        dataType:"JSON",
        success:function(data)
        {
            var role = data['0']['ROLE'];
            if(role == 'Admin'){
                location.href = "login.php";
            }else{}
        }
        
    });
}, 1000);