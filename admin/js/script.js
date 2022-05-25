$(document).ready(function(){
    // $( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
    $( "#datepicker2" ).datepicker( "option", "dateFormat", $(this).val() );
//Datepicker Popups calender to Choose date
$(function(){
    $( "#datepicker,#datepicker2" ).datepicker();
	//Pass the user selected date format
    $( "#format" ).change(function() {
        $( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
         $( "#datepicker2" ).datepicker( "option", "dateFormat", $(this).val() );

    });
  });

});
