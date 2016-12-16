<?php
//COLOR UNBREAK SCRIPT PING PONG (Check that rgb values dont go beyond 255 or below 0)
    //RED
    if ($incrr == 1){
        if ($r+$rmod <= $rmax){$r+=$rmod;}
        else {$incrr = 0;$r-=$rmod;}
        }		
    elseif ($incrr == 0){
        if ($r-$rmod >= $rmin){$r-=$rmod;}
        else {$incrr = 1;$r+=$rmod;}
        }
    //GREEN
    if ($incrg == 1){
        if ($g+$gmod <= $gmax){$g+=$gmod;}
        else {$incrg = 0;$g-=$gmod;}
        }		
    elseif ($incrg == 0){
        if ($g-$gmod >= $gmin){$g-=$gmod;}
        else {$incrg = 1;$g+=$gmod;}
        }
    //BLUE
    if ($incrb == 1){
        if ($b+$bmod <= $bmax){$b+=$bmod;}
        else {$incrb = 0;$b-=$bmod;}
        }		
    elseif ($incrb == 0){
        if ($b-$bmod >= $bmin){$b-=$bmod;}
        else {$incrb = 1;$b+=$bmod;}
        }
?>