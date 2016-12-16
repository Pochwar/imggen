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
$rlimits = explode (",",$_SESSION['rlimits_gal'][$ver]);
$rmin = $rlimits[0];
$rmax = $rlimits[1];
////GREEN LIMITS (gmin must be inferior to gmax)
$glimits = explode (",",$_SESSION['glimits_gal'][$ver]);
$gmin = $glimits[0];
$gmax = $glimits[1];
////BLUE LIMITS (bmin must be inferior to bmax)
$blimits = explode (",",$_SESSION['blimits_gal'][$ver]);
$bmin = $blimits[0];
$bmax = $blimits[1];

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
//
//FILL MODE
    $counta=1;
    $countb=1;
    $sens=1;
////ROW BY ROW
if ($fillmode == 1 || $fillmode == 1.2){
    $reacha=$rows;
    $reachb=$columns;
    }
////COLUMN BY COLUMN
elseif ($fillmode == 2 || $fillmode == 2.2){
    $reacha=$columns;
    $reachb=$rows;
    }


////////////
//THE LOOP//
////////////
//
//LOOP TO FILL IMAGE LINE BY LINE
while ($counta <= $reacha)
	{
	//LOOP TO FILL LINE SQUARE BY SQUARE
	while ($countb <= $reachb)
		{
		//CREATING SQUARES
		$color = imagecolorallocate($image, $r, $g, $b); //set square color
		ImagefilledRectangle ($image, $x1, $y1, $x2, $y2, $color); //create square
		
		//MODIFY COLOR OF THE NEXT SQUARE
        include('../color-unbreak.php');
		//GO TO NEXT SQUARE
        //FILL MODE
        if (($fillmode == 1) || (($fillmode == 1.2) && ($sens == 1))){
            $x1+=$colwidth; //applying column width to left coord
            $x2+=$colwidth; //applying column width to right coord
            }
        elseif (($fillmode == 1.2) && ($sens == 0)){
                $x1-=$colwidth; //applying column width to left coord
                $x2-=$colwidth; //applying column width to right coord
            }
        elseif (($fillmode == 2) || (($fillmode == 2.2) && ($sens == 1))){
            $y1+=$rowheight; //applying column width to left coord
            $y2+=$rowheight; //applying column width to right coord
            }
        elseif (($fillmode == 2.2) && ($sens == 0)){
                $y1-=$rowheight; //applying column width to left coord
                $y2-=$rowheight; //applying column width to right coord
            }
        $countb++; //increase countb
		}
		
        //GO TO NEXT LINE
        //FILL MODE
        ////1
        if(($fillmode == 1) || ($fillmode == 1.2)){
            if (($fillmode == 1) || (($fillmode == 1.2) && ($sens == 0))){
                $x1=0; //initialise left coord to 0
                $x2=$colwidth; //initialise right coord to column width
                if ($sens == 0){$sens = 1;} //change sens
                }
            ////1.2   
            elseif (($fillmode == 1.2) && ($sens == 1)){
                $x1=$width; //initialise left coord to 0
                $x2=$width-$colwidth; //initialise right coord to column width
                $sens = 0; //change sens
                }
            $y1+=$rowheight; //add row heith to top coord
            $y2+=$rowheight; //add row heith to bottom coord
            }
        ////2
        if(($fillmode == 2) || ($fillmode == 2.2)){    
            if (($fillmode == 2) || (($fillmode == 2.2) && ($sens == 0))){
                $y1=0; //initialise left coord to 0
                $y2=$rowheight; //initialise right coord to column width
                if ($sens == 0){$sens = 1;} //change sens
                }
            ////2.2    
            elseif (($fillmode == 2.2) && ($sens == 1)){
                    $y1=$height; //initialise left coord to 0
                    $y2=$height-$rowheight; //initialise right coord to column width
                    $sens = 0; //change sens
                    }
        $x1+=$colwidth; //add row heith to top coord
        $x2+=$colwidth; //add row heith to bottom coord           
        }
        $counta++; //increase counta
        $countb=1; //reinitiate countb
	}

////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)


?>