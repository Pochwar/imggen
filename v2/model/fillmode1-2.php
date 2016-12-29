<?php
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


while ($counta <= $reacha)
	{
	//LOOP TO FILL LINE SQUARE BY SQUARE
	while ($countb <= $reachb)
		{
		//CREATING SQUARES
		include('../create-squares.php');		
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
?>