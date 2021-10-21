function edit_data() { 

  var e_param     = document.querySelectorAll('#param');
  var e_id        = document.querySelectorAll('#id_role');
  var e_basic     = document.querySelectorAll('#basic_fee');
  var e_transport = document.querySelectorAll('#transport');
  var array       = [];

  for (var i = 0; i < e_id.length; i++) {
      array.push({param: e_param[i].value, id: e_id[i].value, basic: e_basic[i].value, transport: e_transport[i].value});
  }

  $.each(array, function(i, array){
      var param_param         = array.param;
      var param_id            = array.id;
      var param_basic         = array.basic; 
      var param_transport     = array.transport;

      $.ajax({
          url:"process/input_data.php",
          method:"POST",
          data:{param_param:param_param, param_id:param_id, param_basic:param_basic, param_transport:param_transport},
          dataType:"JSON",
          success:function(data)
          {
          }
          
      });
  });

  var delayInMilliseconds = 8000;

  setTimeout(function() {
    window.location.href='../salary/?elements=set';
  }, delayInMilliseconds);
}