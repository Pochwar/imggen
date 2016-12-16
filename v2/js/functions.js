//INITIATE TOOLTIP
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

//AUTOSUBMIT
////while sliding
//$('input').on('slide', function () {
//    $(this).closest('form').submit();
//});
//
////on stop slide
$('input').on('slideStop', function () {
    $(this).closest('form').submit();
});
//
////on checkbox check/uncheck
$('.check').on('change', function () {
    $(this).closest('form').submit();
});
//
////on select 
$('select').on('change', function () {
    $(this).closest('form').submit();
});

//SIDEBAR SLIDE
$(document).ready(function () {
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });
});


//FADERS PARAMETERS
$("#fader_width").slider({
	step: 1,
    ticks: [50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000],
    ticks_snap_bounds: 5,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_height").slider({
	step: 1,
    ticks: [50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000],
    ticks_snap_bounds: 5,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_columns").slider({
	step: 1,
    ticks: [1, 2, 3, 4, 5, 10, 15, 20, 25, 30, 35, 40, 50, 60, 70, 80, 90, 100, 150, 200, 250],
    ticks_snap_bounds: 5,
    scale: 'logarithmic',
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_rows").slider({
	step: 1,
    ticks: [1, 2, 3, 4, 5, 10, 15, 20, 25, 30, 35, 40, 50, 60, 70, 80, 90, 100, 150, 200, 250],
    ticks_snap_bounds: 5,
    scale: 'logarithmic',
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_r").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    orientation: 'vertical',
    reversed: true,
    tooltip: 'hide'
});

$("#fader_g").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    orientation: 'vertical',
    reversed: true,
    tooltip: 'hide'
});

$("#fader_b").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    orientation: 'vertical',
    reversed: true,
    tooltip: 'hide'
});

$("#fader_rmod").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_gmod").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_bmod").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_incrr").slider({
	min: 0,
	max: 1,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_incrg").slider({
	min: 0,
	max: 1,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_incrb").slider({
	min: 0,
	max: 1,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_rlimits").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_glimits").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});

$("#fader_blimits").slider({
	min: 0,
	max: 255,
	step: 1,
    handle: 'square',
    tooltip: 'hide'
});


//RGB DIV DISPLAY
var RGBChange = function() {
	$('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
};
var r = $('#fader_r').slider()
		.on('slide', RGBChange)
        .on('slideStop', RGBChange)
		.data('slider');
var g = $('#fader_g').slider()
		.on('slide', RGBChange)
        .on('slideStop', RGBChange)
		.data('slider');
var b = $('#fader_b').slider()
		.on('slide', RGBChange)
        .on('slideStop', RGBChange)
		.data('slider');

//FADERS VALUES DISPLAY ON SLIDE AND SLIDESTOP
$("#fader_width").on("slide", function(slideEvt){$("#fader_width_out").text(slideEvt.value);});
$("#fader_width").on("slideStop", function(slideEvt){$("#fader_width_out").text(slideEvt.value);});

$("#fader_height").on("slide", function(slideEvt){$("#fader_height_out").text(slideEvt.value);});
$("#fader_height").on("slideStop", function(slideEvt){$("#fader_height_out").text(slideEvt.value);});

$("#fader_columns").on("slide", function(slideEvt){$("#fader_columns_out").text(slideEvt.value);});
$("#fader_columns").on("slideStop", function(slideEvt){$("#fader_columns_out").text(slideEvt.value);});

$("#fader_rows").on("slide", function(slideEvt){$("#fader_rows_out").text(slideEvt.value);});
$("#fader_rows").on("slideStop", function(slideEvt){$("#fader_rows_out").text(slideEvt.value);});

$("#fader_r").on("slide", function(slideEvt){$("#fader_r_out").text(slideEvt.value);});
$("#fader_r").on("slideStop", function(slideEvt){$("#fader_r_out").text(slideEvt.value);});

$("#fader_g").on("slide", function(slideEvt){$("#fader_g_out").text(slideEvt.value);});
$("#fader_g").on("slideStop", function(slideEvt){$("#fader_g_out").text(slideEvt.value);});

$("#fader_b").on("slide", function(slideEvt){$("#fader_b_out").text(slideEvt.value);});
$("#fader_b").on("slideStop", function(slideEvt){$("#fader_b_out").text(slideEvt.value);});

$("#fader_rmod").on("slide", function(slideEvt){$("#fader_rmod_out").text(slideEvt.value);});
$("#fader_rmod").on("slideStop", function(slideEvt){$("#fader_rmod_out").text(slideEvt.value);});

$("#fader_gmod").on("slide", function(slideEvt){$("#fader_gmod_out").text(slideEvt.value);});
$("#fader_gmod").on("slideStop", function(slideEvt){$("#fader_gmod_out").text(slideEvt.value);});

$("#fader_bmod").on("slide", function(slideEvt){$("#fader_bmod_out").text(slideEvt.value);});
$("#fader_bmod").on("slideStop", function(slideEvt){$("#fader_bmod_out").text(slideEvt.value);});

$("#fader_incrr").on("slide", function(slideEvt){$("#fader_incrr_out").text(slideEvt.value);});
$("#fader_incrr").on("slideStop", function(slideEvt){$("#fader_incrr_out").text(slideEvt.value);});

$("#fader_incrg").on("slide", function(slideEvt){$("#fader_incrg_out").text(slideEvt.value);});
$("#fader_incrg").on("slideStop", function(slideEvt){$("#fader_incrg_out").text(slideEvt.value);});

$("#fader_incrb").on("slide", function(slideEvt){$("#fader_incrb_out").text(slideEvt.value);});
$("#fader_incrb").on("slideStop", function(slideEvt){$("#fader_incrb_out").text(slideEvt.value);});

$("#fader_rlimits").on("slide", function(slideEvt){$("#fader_rlimits_out").text(slideEvt.value);});
$("#fader_rlimits").on("slideStop", function(slideEvt){$("#fader_rlimits_out").text(slideEvt.value);});

$("#fader_glimits").on("slide", function(slideEvt){$("#fader_glimits_out").text(slideEvt.value);});
$("#fader_glimits").on("slideStop", function(slideEvt){$("#fader_glimits_out").text(slideEvt.value);});

$("#fader_blimits").on("slide", function(slideEvt){$("#fader_blimits_out").text(slideEvt.value);});
$("#fader_blimits").on("slideStop", function(slideEvt){$("#fader_blimits_out").text(slideEvt.value);});