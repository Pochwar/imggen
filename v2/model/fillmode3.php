<?php 
//FILL MODE
    $counta=1;
    $countb=1;
    $sens=1;
    $reachmod1=0;
    $reachmod2=1;
    $markr2=1;
    $totalsquares = $columns*$rows;
    $reacha=$rows;
    $reachb=$columns;



while ($markr2 <= $totalsquares){
        if($sens == 1){
            while ($countb <= ($reachb-$reachmod1) && ($markr2 <= $totalsquares)){
            //CREATING SQUARES
            include('../create-squares.php');
            //MODIFY COLOR OF THE NEXT SQUARE
            include('../color-unbreak.php');

            $x1+=$colwidth; //applying column width to left coord
            $x2+=$colwidth; //applying column width to right coord  
            $countb++;
            $markr2++;
            }
        $x1-=$colwidth; //reinitiate x1 to previous coordonate
        $x2-=$colwidth; //reinitiate x2 to previous coordonate
        $y1+=$rowheight; //add row heigth to top coord
        $y2+=$rowheight; //add row heigth to bottom coord
        $sens=2;//switch to sens 2
        $reachmod1++;//increase reachmod1
        $countb=1;
        
        }
        elseif($sens == 2){
            while ($counta <= ($reacha-$reachmod2) && ($markr2 <= $totalsquares)){
            //CREATING SQUARES
            include('../create-squares.php');
            //MODIFY COLOR OF THE NEXT SQUARE
            include('../color-unbreak.php');
            
            $y1+=$rowheight; //applying column width to left coord
            $y2+=$rowheight; //applying column width to right coord
            $counta++;
            $markr2++;            
            }
        $x1-=$colwidth; //reinitiate x1 to previous coordonate
        $x2-=$colwidth; //reinitiate x2 to previous coordonate
        $y1-=$rowheight; //add row heigth to top coord
        $y2-=$rowheight; //add row heigth to bottom coord
        $sens=3;//switch to sens 3
        $reachmod2++;//increase reachmod2
        $counta=1;
        }
    elseif($sens == 3){
            while ($countb <= ($reachb-$reachmod1) && ($markr2 <= $totalsquares)){
            //CREATING SQUARES
            include('../create-squares.php');
            //MODIFY COLOR OF THE NEXT SQUARE
            include('../color-unbreak.php');
            
            $x1-=$colwidth; //applying column width to left coord
            $x2-=$colwidth; //applying column width to right coord
            $countb++;
            $markr2++;    
            }
        $x1+=$colwidth; //reinitiate x1 to previous coordonate
        $x2+=$colwidth; //reinitiate x2 to previous coordonate
        $y1-=$rowheight; //add row heigth to top coord
        $y2-=$rowheight; //add row heigth to bottom coord
        $sens=4;//switch to sens 4
        $reachmod1++;//increase reachmod1
        $countb=1;
        }
    elseif($sens == 4){
            while ($counta <= ($reacha-$reachmod2) && ($markr2 <= $totalsquares)){
            //CREATING SQUARES
            include('../create-squares.php');
            //MODIFY COLOR OF THE NEXT SQUARE
            include('../color-unbreak.php');
            
            $y1-=$rowheight; //applying column width to left coord
            $y2-=$rowheight; //applying column width to right coord
            $counta++;
            $markr2++;    
            }
        $x1+=$colwidth; //reinitiate x1 to previous coordonate
        $x2+=$colwidth; //reinitiate x2 to previous coordonate
        $y1+=$rowheight; //add row heigth to top coord
        $y2+=$rowheight; //add row heigth to bottom coord
        $sens=1;//switch to sens 1
        $reachmod2++;//increase reachmod2
        $counta=1;
        }
        
    
    }
?>