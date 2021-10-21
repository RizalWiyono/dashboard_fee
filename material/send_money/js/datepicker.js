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

var param = getUrlParameter('action');
var date  = getUrlParameter('date');

console.log(param);

$(function() {

    $('#range_picker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoUpdateInput: false,
        startDate: date,
        locale: {
            format: 'D MMM YYYY',
        }
    }, function(start, end, label) {
        document.getElementById("param_date").setAttribute('value', start.format('YYYY-MM-DD'));
    });
    
});