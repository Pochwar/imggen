<?php
//get default parameters
include (parameters.php);

//destroy edit session to allow image modifying
if (isset($_POST[modif])){unset($_SESSION[edit]);}

//New image
if (!isset($_SESSION[edit])){
    //if no value is post, apply default value
    foreach($_SESSION[param_array] as $key => $value){
        if (!isset ($_POST[$key])){$_SESSION[$key] = $value;}
        else {$_SESSION[$key] = $_POST[$key];}
    }
    //check if sens checkbox is checked then set 0 or 1 to color modification sens
    if ($_SESSION[incrr] != 0){$_SESSION[incrr] = 1;}
    if ($_SESSION[incrg] != 0){$_SESSION[incrg] = 1;}
    if ($_SESSION[incrb] != 0){$_SESSION[incrb] = 1;}
}

//edit mode
if (isset($_SESSION[edit])){
    //get ID of image to edit
    $ver=$_SESSION[edit];

    //get values from image to edit
    foreach($_SESSION[param_array] as $key => $value){
        $_SESSION[$key] = $_SESSION[$key."_gal"][$ver];
    }

    //if inverse is ON, check checkboxes
    if ($_SESSION[incrr] == 0){$check_incrr = "checked";}
    elseif ($_SESSION[incrg] == 0){$check_incrg = "checked";}
    elseif ($_SESSION[incrb] == 0){$check_incrb = "checked";}
    
    //if glitch mode is ON, check checkboxes
    if ($_SESSION[r_glitch] == 1){$check_r_glitch = "checked";}
    if ($_SESSION[g_glitch] == 1){$check_g_glitch = "checked";}
    if ($_SESSION[b_glitch] == 1){$check_b_glitch = "checked";}

    //select fillmode
    if ($_SESSION[fillmode] == 1){$selected_1 = "selected";}
    elseif ($_SESSION[fillmode] == 1.2){$selected_1_2 = "selected";}
    elseif ($_SESSION[fillmode] == 2){$selected_2 = "selected";}
    elseif ($_SESSION[fillmode] == 2.2){$selected_2_2 = "selected";}
}
?>


