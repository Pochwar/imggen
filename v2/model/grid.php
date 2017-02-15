<?php
session_start();

header ("Content-type: image/png");

/////////////
//VARIABLES//
/////////////
//
//IMAGE SIZE
$width= $_SESSION['width']; //image width in px
$height=$_SESSION['height']; //image height in px
//
//BACKGROUND GRID
$columns=$_SESSION['columns']; //numbers of columns
$rows=$_SESSION['rows']; //numbers of rows
$colwidth = $width/$columns; //column width
$rowheight = $height/$rows; //row height
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=$_SESSION['r']; //red
$g=$_SESSION['g']; //green
$b=$_SESSION['b']; //blue
//
//COLOR MODIFICATION
//AMOUNT
$rmod=$_SESSION['rmod']; //red modification amount (no negative value, 0 allowed)
$gmod=$_SESSION['gmod']; //green modification amount (no negative value, 0 allowed)
$bmod=$_SESSION['bmod']; //blue modification amount (no negative value, 0 allowed)
////apply glitch mode to color modification (= set value negative)
if ($_SESSION['r_glitch'] == 1){$rmod = "-".$rmod;}
if ($_SESSION['g_glitch'] == 1){$gmod = "-".$gmod;}
if ($_SESSION['b_glitch'] == 1){$bmod = "-".$bmod;}
//SENS
$incrr=$_SESSION['incrr']; // red modification sens (1 = increase, 0 = decrease)
$incrg=$_SESSION['incrg']; // green modification sens (1 = increase, 0 = decrease)
$incrb=$_SESSION['incrb']; // blue modification sens (1 = increase, 0 = decrease)
//AMPLITUDE
////RED LIMITS (rmin must be inferior to rmax)
$rmin = $_SESSION['rlimits_min'];
$rmax = $_SESSION['rlimits_max'];
////GREEN LIMITS (gmin must be inferior to gmax)
$gmin = $_SESSION['glimits_min'];
$gmax = $_SESSION['glimits_max'];
////BLUE LIMITS (bmin must be inferior to bmax)
$bmin = $_SESSION['blimits_min'];
$bmax = $_SESSION['blimits_max'];

////////////////
//IMAGE CREATE//
////////////////
//
$image = imagecreatetruecolor($width,$height);


/////////////
//FILL MODE//
/////////////
//
$fillmode = $_SESSION['fillmode'];


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
elseif($fillmode == 4){
    include('fillmode4.php');
}

////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)

?>
