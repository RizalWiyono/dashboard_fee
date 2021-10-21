function edit_data() { 

  var e_id        = document.querySelectorAll('#id');
//   var e_img       = document.querySelectorAll('#img');
  var e_division  = document.querySelectorAll('#division');
  var e_role      = document.querySelectorAll('#role');
  var array       = [];
  for (var i = 0; i < e_id.length; i++) {
      array.push({id: e_id[i].value, division: e_division[i].value, role: e_role[i].value});
  }

  $.each(array, function(i, array){
      var param_id            = array.id;
    //   var param_img           = array.img;
      var param_division      = array.division;
      var param_role          = array.role;

      $.ajax({
          url:"process/input_data.php",
          method:"POST",
          data:{param_id:param_id, param_division:param_division, param_role:param_role},
          dataType:"JSON",
          success:function(data)
          {
            window.location.href='../add_team/';
          }
          
      });
  });
}

let division = document.getElementsByClassName("division");
for(let i=0; i <= division.length; i++) {
    division[i].addEventListener("change", function(e) {
        let sub = document.getElementsByClassName("role")[i];
        let form  = new FormData();
        form.append("id", division[i].value);

            fetchAPI('process/select_sub.php', form , function(data){
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

