$.ajax({
  url:"../team/process/notif.php",
  method:"GET",
  data:{},
  dataType:"JSON",
  success:function(data)
  {
    document.getElementById("notif").innerHTML = data['0']['count'];
    if(data['0']['count'] > 0){
      document.getElementById('notif-place').style.display = 'block';
    }else{
      document.getElementById('notif-place').style.display = 'none';
    }
  }
  
});

const interval = setInterval(function() {
$.ajax({
  url:"../team/process/notif.php",
  method:"GET",
  data:{},
  dataType:"JSON",
  success:function(data)
  {
    document.getElementById("notif").innerHTML = data['0']['count'];
    if(data['0']['count'] > 0){
      document.getElementById('notif-place').style.display = 'block';
    }else{
      document.getElementById('notif-place').style.display = 'none';
    }
  }
  
});
}, 1000);

var mySelect = new BVSelect({
    selector: "#selectbox",
    offset: true
});


// Auto Click

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


var param = getUrlParameter('date');
var param2 = getUrlParameter('todate');

window.onload = function(){
  setTimeout(function() {
  document.getElementById('one_year_date').click();
  if(param == 'One Month Last'){
    document.getElementById('this_date').click();
  }if(param == '30 Days'){
    document.getElementById('30_date').click();
  }else if(param == 'One Year'){
      document.getElementById('one_year_date').click();
  }else if(param == 'Last Month'){
      document.getElementById('last_month').click();
  }else if(param == 'This Year'){
      document.getElementById('this_year').click();
  }else if(param == 'Last Year'){
      document.getElementById('last_year').click();
  }else if(param == 'All Time'){
      document.getElementById('all_time').click();
  }else if(param2.length != 0){
    $('#report').html(param + ' to ' + param2);
      document.getElementById('date_todate').click();
  }else{
    document.getElementById('one_year_date').click();
  }
  
  
  },100);
      
      var scriptTag = document.createElement("script");
  //   scriptTag.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js";
      document.getElementsByTagName("head")[0].appendChild(scriptTag);
}

$.ajax({
  url:"process/mindate.php",
  method:"POST",
  dataType:"JSON",
  success:function(data)
  {

  $(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();
    var max = data['1']['month']+'/'+data['1']['day']+'/'+data['1']['year'];
    var min = data['0']['month']+'/'+data['0']['day']+'/'+data['0']['year'];

    function cb(start, end) {
        $('#report').html(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        
        $('#report_start').html(start.format('YYYY-MM-DD'));
        $('#report_end').html(end.format('YYYY-MM-DD'));
    }

    $ ( '#costum_date' ) . on ( 'apply.daterangepicker' ,  function ( ev ,  picker )  {
        $("#date_todate").click();
    });
    $('#costum_date').daterangepicker({
        startDate: start,
        endDate: end,
        maxDate: max,
        minDate: min,
        showDropdowns: true,
        // ranges: {
        // 'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        // 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        // 'This Month': [moment().startOf('month'), moment().endOf('month')],
        // 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            
        // }
    }, cb);


    cb(start, end);

  });

}
});

