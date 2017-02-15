//INITIATE TOOLTIP
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


//AUTOSUBMIT

////on checkbox check/uncheck
$('.check').on('change', function () {
    $(this).closest('form').submit();
});
//
////on select 
$('select').on('change', function () {
    $(this).closest('form').submit();
});
//
////on slide
$('.slid').on('change', function () {
    $(this).closest('form').submit();
});


//SIDEBAR SLIDE
$(document).ready(function () {
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });
});


//PREVENT INSERTING UNWANTED CARACTERS IN SIGN IN
$("#sign").keypress( function(e) {
    var chr = String.fromCharCode(e.which);
    if ('%&~#[]`^=$*{}|<>_/\\\'"'.indexOf(chr) != -1)
        return false;
});