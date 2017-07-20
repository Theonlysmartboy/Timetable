 var year = new Date().getFullYear();
    document.getElementById("year").innerHTML = year;
    
   //function to add callender to the date field
$(document).ready(function () {
    var date_input = $('input[name="date"]');
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true
    });
});
$(document).ready(function () {
    var date_input = $('input[name="date1"]');
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true
    });
});
function passwordChecker(){
    var password = document.getElementById('pwd').value;
    var confirmPassword = document.getElementById('cpwd').value;
    if(password !== confirmPassword){
        document.getElementById('pwd').style.borderColor='#ff0000';
        document.getElementById('cpwd').style.borderColor='#ff0000';
        
    }
    else{
      document.getElementById('pwd').style.borderColor='#1ab188';
        document.getElementById('cpwd').style.borderColor='#1ab188';  
    }
}