<?php
session_start();
include ('process.php');
include ('help.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>ImgGen v2</title>
        <meta charset="utf-8">
        <meta name="description" content="Generate images with PHP">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="all"/>
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta property="og:title" content="ImgGen V2" />
        <meta property="og:url" content="http://www.pochworld.com/imggen/v2/" />
        <meta property="og:image" content="http://www.pochworld.com/imggen/v2/img/imggenv2.png" />
        <meta property="og:description" content="Generate images with PHP" />
    </head>

    <body>
        <header id="hhh" class="hhh">
            <div class="title1"><h3>ImgGen v2</h3></div>
                <!-- firefox hack for title banner -->
                <svg class="clip-svg">
                    <defs>
                        <clipPath id="banner" clipPathUnits="objectBoundingBox">
                            <polygon points="0 0, 1 0, 0.95 0.5, 1 1, 0 1, 0.05 0.5" />
                        </clipPath>
                    </defs>	
                </svg>
                <style>
                    .title1 h3 {
                        clip-path: url("#banner");
                        -webkit-clip-path: url("#banner");
                        }
                    .clip-svg{
                        position: absolute;
                        z-index:-99999;
                        }
                </style>
                <!-- end of hack -->
        
            <div class="about">
                    <p>ImgGen is a project about generating images with PHP.</p>
                    <p><a href="gallery.php">Gallery</a></p>
            </div>
        </header>

        <div class="content">
            <aside class="row-offcanvas">
                <div class="param_title">
                    <button type="button" class="buttn visible" data-toggle="offcanvas" aria-expanded="false" aria-controls="navbar"></button>
                    <div class="ptcontent">
                        <h2>PARAMETERS</h2>
                        <p>Play with parameters below and see what happens !</p>
                    </div>
                </div>
                <div class="form">
                    <form action="img.php" target="frame" method="post" id="myform">
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_1">Image size</a>
                            <div id="param_1" class="collapse in">
                                <div class="param_content">
                                    <p>Width</p>
                                    <p><input type="text" name="width" id="fader_width" data-slider-value="<?php echo $_SESSION[width]; ?>"/></p>
                                    <p><span id="fader_width_out"><?php echo $_SESSION[width]; ?></span></p>
                                </div>
                                <div class="param_content">
                                    <p>Height</p>
                                    <p><input type="text" name="height" id="fader_height" data-slider-value="<?php echo $_SESSION[height]; ?>"/></p>
                                    <p><span id="fader_height_out"><?php echo $_SESSION[height]; ?></span></p>
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_1 ?>">?</div>
                        </div>
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_2">Grid</a>
                            <div id="param_2" class="collapse">
                                <div class="param_content">
                                    <p>Columns</p>
                                    <p><input type="text" name="columns" id="fader_columns" data-slider-value="<?php echo $_SESSION[columns]; ?>"/></p>
                                    <p><span id="fader_columns_out"><?php echo $_SESSION[columns]; ?></span></p>
                                </div>
                                <div class="param_content">
                                    <p>Rows</p>
                                    <p><input type="text" name="rows" id="fader_rows" data-slider-value="<?php echo $_SESSION[rows]; ?>"/></p>
                                    <p><span id="fader_rows_out"><?php echo $_SESSION[rows]; ?></span></p>
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_2 ?>">?</div>
                        </div>
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_3">Color</a>
                            <div id="param_3" class="collapse">
                                <div class="horiz">
                                    <div class="param_content">
                                    <p>Red</p>
                                    <p><input type="text" name="r" data-slider-id="r" id="fader_r" data-slider-value="<?php echo $_SESSION[r]; ?>"/></p>
                                    <p><span id="fader_r_out"><?php echo $_SESSION[r]; ?></span></p>
                                </div>
                                    <div class="param_content">
                                    <p>Green</p>
                                    <p><input type="text" name="g" data-slider-id="g" id="fader_g" data-slider-value="<?php echo $_SESSION[g]; ?>"/></p>
                                    <p><span id="fader_g_out"><?php echo $_SESSION[g]; ?></span></p>
                                </div>
                                    <div class="param_content">
                                    <p>Blue</p>
                                    <p><input type="text" name="b" data-slider-id="b" id="fader_b" data-slider-value="<?php echo $_SESSION[b]; ?>"/></p>
                                    <p><span id="fader_b_out"><?php echo $_SESSION[b]; ?></span></p>
                                    </div>
                                </div>
                                <div class="color">
                                    <p>Color</p>
                                    <p id="RGB"></p>
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_3 ?>">?</div>
                        </div>
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_4">Color modification</a>
                            <div id="param_4" class="collapse">
                                <div class="param_content">
                                    <p>Red</p>
                                    <p><input type="text" name="rmod" data-slider-id="rmod" id="fader_rmod" data-slider-value="<?php echo $_SESSION[rmod]; ?>"/></p>
                                    <p><span id="fader_rmod_out"><?php echo $_SESSION[rmod]; ?></span></p>
                                    <div class="checkboxes">
                                        <p><input type="checkbox" class="check" name="r_glitch" value="1"<?php echo $check_r_glitch; ?>><label for="r_glitch">Glitch</label></p>
                                        <p><input type="checkbox" class="check" name="incrr" value="0"<?php echo $check_incrr; ?>><label for="incrr">Inverse</label></p>
                                    </div>
                                </div>
                                <div class="param_content">
                                    <p>Green</p>
                                    <p><input type="text" name="gmod" data-slider-id="gmod" id="fader_gmod" data-slider-value="<?php echo $_SESSION[gmod]; ?>"/></p>
                                    <p><span id="fader_gmod_out"><?php echo $_SESSION[gmod]; ?></span></p>
                                    <div class="checkboxes">
                                        <p><input type="checkbox" class="check" name="g_glitch" value="1"<?php echo $check_g_glitch; ?>><label for="g_glitch">Glitch</label></p>
                                        <p><input type="checkbox" class="check" name="incrg" value="0"<?php echo $check_incrg; ?>><label for="incrg">Inverse</label></p>
                                    </div>
                                </div>
                                <div class="param_content">
                                    <p>Blue</p>
                                    <p><input type="text" name="bmod" data-slider-id="bmod" id="fader_bmod" data-slider-value="<?php echo $_SESSION[bmod]; ?>"/></p>
                                    <p><span id="fader_bmod_out"><?php echo $_SESSION[bmod]; ?></span></p>
                                    <div class="checkboxes">
                                        <p><input type="checkbox" class="check" name="b_glitch" value="1"<?php echo $check_b_glitch; ?>><label for="b_glitch">Glitch</label></p>
                                        <p><input type="checkbox" class="check" name="incrb" value="0"<?php echo $check_incrb; ?>><label for="incrb">Inverse</label></p>
                                    </div>
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_4 ?>">?</div>
                        </div>
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_7">Fill mode</a>
                            <div id="param_7" class="collapse">
                                <p><select name="fillmode" >
                                    <option value="1"<?php echo $selected_1; ?>>rows</option>
                                    <option value="1.2"<?php echo $selected_1_2; ?>>rows "snake"</option>
                                    <option value="2" <?php echo $selected_2; ?>>columns</option>
                                    <option value="2.2"<?php echo $selected_2_2; ?>>columns "snake"</option>
                                    </select>
                                </p>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_7 ?>">?</div>
                        </div>
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_6">Color modification limits</a>
                            <div id="param_6" class="collapse">
                                <div class="param_content">
                                    <p>Red limits</p>
                                    <p><input type="text" name="rlimits" id="fader_rlimits" data-slider-value="[<?php echo $_SESSION[rlimits]; ?>]"/></p>
                                    <p><span id="fader_rlimits_out"><?php echo $_SESSION[rlimits]; ?></span></p>
                                </div>
                                <div class="param_content">
                                    <p>Green limits</p>
                                    <p><input type="text" name="glimits" id="fader_glimits" data-slider-value="[<?php echo $_SESSION[glimits]; ?>]"/></p>
                                    <p><span id="fader_glimits_out"><?php echo $_SESSION[glimits]; ?></span></p>
                                </div>
                                <div class="param_content">
                                    <p>Blue limits</p>
                                    <p><input type="text" name="blimits" id="fader_blimits" data-slider-value="[<?php echo $_SESSION[blimits]; ?>]"/></p>
                                    <p><span id="fader_blimits_out"><?php echo $_SESSION[blimits]; ?></span></p>
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_6 ?>">?</div>
                        </div>
                        <input type="hidden" name="modif" value="ok" />
                    </form>
                    <form action="save.php"  method="post" id="saveform">
                        <input type="submit" value="Save image to gallery (Exit editor)">
                    </form>
                </div>
            </aside>
            
            <article>
                

                    <iframe name="frame" class="frame" src="img.php" frameborder="0"></iframe>
                    
                    
            </article>
        </div>
        <footer>
            <p>Credit : Benoît Ripoche - contact : <a href="mailto:contact@pochworld.com">contact@pochworld.com</a></p>
        </footer>
  
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-slider.js"></script>
        <script src="js/functions.js"></script>

    </body>
</html>