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

function edit_data() { 
  Swal.showLoading()

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
      var param_date          = document.getElementById("param_date").value;
      var param_code          = document.getElementById("code_fee").value;

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
    
    var date  = getUrlParameter('date');

      $.ajax({
          url:"process/input_data.php",
          method:"POST",
          data:{date:date, param_thr:param_thr, param_code:param_code, param_date:param_date, param_id:param_id, param_id_fee:param_id_fee, param_id_role:param_id_role, param_total:param_total, param_basic:param_basic, param_absent:param_absent, param_transport:param_transport, param_overtime:param_overtime, param_bounty:param_bounty, param_tip:param_tip, param_cashbon:param_cashbon, param_warranty:param_warranty, param_more:param_more, param_note:param_note},
          dataType:"JSON",
          success:function(data)
          {
            console.log(data);
          }
          
      });
    
});

  var delayInMilliseconds = 8000;

  setTimeout(function() {
    var param_date = document.getElementById("param_date").value;
    window.location.href='index.php?date='+param_date;
  }, delayInMilliseconds);
}

function publish_data() { 
  Swal.showLoading()

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
    
    var date  = getUrlParameter('date');

      $.ajax({
          url:"process/publish.php",
          method:"POST",
          data:{date:date, param_code:param_code, param_id:param_id, param_id_fee:param_id_fee, param_id_role:param_id_role, param_code:param_code},
          dataType:"JSON",
          success:function(data)
          {
            console.log(data);
          }
          
      });
    
});
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

  var delayInMilliseconds = 8000;

  setTimeout(function() {
    var date  = getUrlParameter('date');
    window.location.href='index.php?action=publish&&date='+date;
  }, delayInMilliseconds);

}