<?php
header ("Content-type: image/png");

/////////////
//VARIABLES//
/////////////
//
//IMAGE SIZE
$width=900; //image width in px
$height=900; //image height in px
//
//BACKGROUND GRID
$columns = 9; //numbers of columns
$rows = 9; //numbers of rows
$colwidth = $width/$columns; //column width
$rowheight = $height/$rows; //row height
//
//BACKGROUND COLOR IN RGB (MIN : 0 / MAX : 255)
$bgr=rand(0, 255); //red
$bgg=rand(0, 255); //green
$bgb=rand(0, 255); //blue
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=rand(0, 255); //red
$g=rand(0, 255); //green
$b=rand(0, 255); //blue
//
//COLOR MODIFICATION
////AMOUNT
//////CHOOSE BETWEEN MODE 1 AND MODE 2
$mode=rand(1,2);
//////MODE 1
if ($mode == 1){
	$rmod=rand(0, 5); //red modification amount (no negative value, 0 allowed)
	$gmod=rand(0, 5); //green modification amount (no negative value, 0 allowed)
	$bmod=rand(0, 5); //blue modification amount (no negative value, 0 allowed)
	}
//////MODE 2
elseif ($mode == 2){
	$rmod=rand(0, 255); //red modification amount (no negative value, 0 allowed)
	$gmod=rand(0, 255); //green modification amount (no negative value, 0 allowed)
	$bmod=rand(0, 255); //blue modification amount (no negative value, 0 allowed)
	}
////SENS
$incrr=1; // red modification sens (1 = increase, 0 = decrease)
$incrg=1; // green modification sens (1 = increase, 0 = decrease)
$incrb=1; // blue modification sens (1 = increase, 0 = decrease)
//
//STARTING POINT OF FIRST LINE
$x2 = $width/2; //X axis center
$y2 = $height/2; //Y axis center
//
//NUMBER OF LINES
$linenum = 256;
//
//LINE STYLE
$linethickness = 2; //line thickness in  px
$linespacing = rand(8,12); //line spacing in px


////////////////
//IMAGE CREATE//
////////////////
//
$image = imagecreatetruecolor($width,$height); //image create
$bgcolor = imagecolorallocate($image, $bgr, $bgg, $bgb); //set background color
ImagefilledRectangle ($image, 0, 0, $width, $height, $bgcolor); //create background
imagesetthickness($image, $linethickness); //set line thickness


////////////
//MARQUERS//
////////////
//
$count = 0; //counter for the main loop
$c4 = 1; //counter for the inner loop
$lineincr = $linespacing; //line space incrementation

////////////
//THE LOOP//
////////////
//
//LOOP TO DRAW LINES
while ($count <= $linenum)
	{
		//CREATING LINES
		$color = imagecolorallocate($image, $r, $g, $b); //set line color
		
		//SPIRAL SCRIPT
		if ($c4 == 1){
			$x1 = $x2; $y1 = $y2; $x2 = $x1; $y2 = $y1-$linespacing;
			$c4++;
			imageline ($image, $x1, $y1, $x2, $y2, $color);
			}
		elseif ($c4 == 2){
			$x1 = $x2; $y1 = $y2; $x2 = $x1+$linespacing; $y2 = $y1;
			$c4++;
			imageline ($image, $x1, $y1, $x2, $y2, $color);
			$linespacing+=$lineincr;
			}
		elseif ($c4 == 3){
			$x1 = $x2; $y1 = $y2; $x2 = $x1; $y2 = $y1+$linespacing;
			$c4++;
			imageline ($image, $x1, $y1, $x2, $y2, $color);
			}
		elseif ($c4 == 4){
			$x1 = $x2; $y1 = $y2; $x2 = $x1-$linespacing; $y2 = $y1;
			$c4=1;
			imageline ($image, $x1, $y1, $x2, $y2, $color);
			$linespacing+=$lineincr;
			}

		
		//MODIFY COLOR OF THE NEXT LINE
			//COLOR UNBREAK SCRIPT PING PONG (Check that rgb values dont go beyond 255 or below 0)
				//RED
				if ($incrr == 1){
					if ($r+$rmod <= 255){$r+=$rmod;}
					else {$incrr = 0;$r-=$rmod;}
					}		
				elseif ($incrr == 0){
					if ($r-$rmod >= 0){$r-=$rmod;}
					else {$incrr = 1;$r+=$rmod;}
					}
				//GREEN
				if ($incrg == 1){
					if ($g+$gmod <= 255){$g+=$gmod;}
					else {$incrg = 0;$g-=$gmod;}
					}		
				elseif ($incrg == 0){
					if ($g-$gmod >= 0){$g-=$gmod;}
					else {$incrg = 1;$g+=$gmod;}
					}
				//BLUE
				if ($incrb == 1){
					if ($b+$bmod <= 255){$b+=$bmod;}
					else {$incrb = 0;$b-=$bmod;}
					}		
				elseif ($incrb == 0){
					if ($b-$bmod >= 0){$b-=$bmod;}
					else {$incrb = 1;$b+=$bmod;}
					}
		$count++;
		}


////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)
?>