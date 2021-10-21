function edit_member() { 

  var e_id        = document.querySelectorAll('#id');
  var e_person      = document.querySelectorAll('#person');
  var array       = [];
  for (var i = 0; i < e_id.length; i++) {
      array.push({id: e_id[i].value, person: e_person[i].value});
  }

  $.each(array, function(i, array){
      var param_id            = array.id;
      var param_person        = array.person;

      $.ajax({
          url:"process/input_member.php",
          method:"POST",
          data:{param_id:param_id, param_person:param_person},
          dataType:"JSON",
          success:function(data)
          {
          }
          
      });
  });
  setTimeout(function(){
    window.location.href='index.php?elements=member';
   }, 3000);	
}