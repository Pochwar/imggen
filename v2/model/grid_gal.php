<?php
session_start();

//this version of grid model is fro gallery display
$ver=$_GET[ver];

header ("Content-type: image/png");


/////////////
//VARIABLES//
/////////////
//
//IMAGE SIZE
$width=$_SESSION['width_gal'][$ver]; //image width in px
$height=$_SESSION['height_gal'][$ver]; //image height in px
//
//BACKGROUND GRID
$columns=$_SESSION['columns_gal'][$ver]; //numbers of columns
$rows=$_SESSION['rows_gal'][$ver]; //numbers of rows
$colwidth = $width/$columns; //column width
$rowheight = $height/$rows; //row height
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=$_SESSION['r_gal'][$ver]; //red
$g=$_SESSION['g_gal'][$ver]; //green
$b=$_SESSION['b_gal'][$ver]; //blue
//
//COLOR MODIFICATION
//AMOUNT
$rmod=$_SESSION['rmod_gal'][$ver]; //red modification amount (no negative value, 0 allowed)
$gmod=$_SESSION['gmod_gal'][$ver]; //green modification amount (no negative value, 0 allowed)
$bmod=$_SESSION['bmod_gal'][$ver]; //blue modification amount (no negative value, 0 allowed)
////apply glitch mode to color modification (= set value negative)
if ($_SESSION[r_glitch_gal][$ver] == 1){$rmod = "-".$rmod;}
if ($_SESSION[g_glitch_gal][$ver] == 1){$gmod = "-".$gmod;}  
if ($_SESSION[b_glitch_gal][$ver] == 1){$bmod = "-".$bmod;} 
//SENS
$incrr=$_SESSION['incrr_gal'][$ver]; // red modification sens (1 = increase, 0 = decrease)
$incrg=$_SESSION['incrg_gal'][$ver]; // green modification sens (1 = increase, 0 = decrease)
$incrb=$_SESSION['incrb_gal'][$ver]; // blue modification sens (1 = increase, 0 = decrease)
//AMPLITUDE
////RED LIMITS (rmin must be inferior to rmax)
$rmin = $_SESSION['rlimits_min_gal'][$ver];
$rmax = $_SESSION['rlimits_max_gal'][$ver];
////GREEN LIMITS (gmin must be inferior to gmax)
$gmin = $_SESSION['glimits_min_gal'][$ver];
$gmax = $_SESSION['glimits_max_gal'][$ver];
////BLUE LIMITS (bmin must be inferior to bmax)
$bmin = $_SESSION['blimits_min_gal'][$ver];
$bmax = $_SESSION['blimits_max_gal'][$ver];

////////////////
//IMAGE CREATE//
////////////////
//
$image = imagecreatetruecolor($width,$height);


/////////////
//FILL MODE//
/////////////
//
$fillmode = $_SESSION['fillmode_gal'][$ver];

////////////
//MARQUERS//
////////////
//
//LOCATION AND SIZE OF FIRST SQUARE
$x1 = 0; //left coord of square
$y1 = 0; //top coord of square
$x2 = $colwidth; //right coord of square
$y2 = $rowheight; //bottom coord of square


////////////
//THE LOOP//
////////////
//
if($fillmode == 1 || $fillmode == 1.2 || $fillmode == 2 || $fillmode == 2.2){
    include('fillmode1-2.php');
}
elseif($fillmode == 3){
    include('fillmode3.php');
}


////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)


?>