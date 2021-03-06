<?php
session_start();

//set parameters array with default values
$_SESSION['param_array'] = $default_param_array = array(
        "width" => "600",
        "height" => "600",
        "columns" => "5",
        "rows" => "5",
        "r" => "50",
        "g" => "100",
        "b" => "150",
        "rmod" => "5",
        "gmod" => "5",
        "bmod" => "5",
        "incrr" => "1",
        "incrg" => "1",
        "incrb" => "1",
        "r_glitch" => "0",
        "g_glitch" => "0",
        "b_glitch" => "0",
        "rlimits_min" => "0",
        "rlimits_max" => "255",
        "glimits_min" => "0",
        "glimits_max" => "255",
        "blimits_min" => "0",
        "blimits_max" => "255",
        "fillmode" => "1"
    );
?>
