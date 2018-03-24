$(function (){

    // hide placeholder in foucs

    $('[placeholder]').focus(function(){
        $(this).attr('data-text',$(this).attr('placeholder'));
        $(this).attr('placeholder','');

    }).blur(function(){
        $(this).attr('placeholder',$(this).attr('data-text'));
    });

});


$("#btn-Login").click(function(event) {

    //Fetch form to apply custom Bootstrap validation
    var form = $("#formLogin")

    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    
    form.addClass('was-validated');
  });

function alert(){
    
}
 
