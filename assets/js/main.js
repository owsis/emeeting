
function baseUrl(param = null){
	return "http://localhost/kemendesa-layanan-kepegawaian/"+param;
}

$(document).ready(function() {

	// HANDLING MENU ACTIVE
	$('#'+localStorage.getItem("menuActive")).addClass('active');
    $('#'+localStorage.getItem("menuActive")).parents('.nav-item').last().addClass('active');
	if ($('#'+localStorage.getItem("menuActive")).parents('.sub-menu').length) {
		$('#'+localStorage.getItem("menuActive")).closest('.collapse').addClass('show');
		$('#'+localStorage.getItem("menuActive")).addClass('active');
	}	

	$('.select2').select2({
		width: '100%',		
		placeholder: 'Pilih',
	});


  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
  });

});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

function setMenuActive(id_menu){
	localStorage.setItem('menuActive', id_menu);
}

function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}

$( "#target" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});

