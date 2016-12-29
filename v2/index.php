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
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="all"/>
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
                    <p><i>ImgGen is a project about generating images with PHP.</i></p>
                    <p><b>Home</b> - <a href="gallery.php">Gallery</a> - <a href="..">V1</a></p>
            </div>
        </header>
        <div class="content">
            <aside class="row-offcanvas">
                <div class="param_title">
                    <button type="button" id="buttn" class="buttn visible" data-toggle="offcanvas" aria-expanded="false" aria-controls="navbar"></button>
                    <div class="ptcontent">
                        <h2>PARAMETERS</h2>
                        <p>Play with parameters below and see what happens !</p>
                    </div>
                </div>
                <div class="form">
                    <form action="img.php" target="frame" method="post" id="myform">
                    
                        <div class="param" >
                            <a data-toggle="collapse" data-target="#param_1" class="trigg">Image size</a>
                            <div id="param_1" class="collapse in">
                                <div class="slid norange">
                                    <p>Width</p>
                                    <input type="range" name="width" value="<?php echo $_SESSION[width]; ?>" min="50" max="1000" data-highlight="true" data-mini="true">
                                </div>
                                <div class="slid norange">
                                    <p>Height</p>
                                    <input type="range" name="height" value="<?php echo $_SESSION[height]; ?>" min="50" max="1000" data-highlight="true" data-mini="true">
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_1 ?>">?</div>
                        </div>
                        
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_2" class="trigg collapsed">Grid</a>
                            <div id="param_2" class="collapse">
                                <div class="slid norange">
                                    <p>Columns</p>
                                    <input type="range" name="columns" value="<?php echo $_SESSION[columns]; ?>" min="1" max="250" data-highlight="true" data-mini="true">
                                </div>
                                <div class="slid norange">
                                    <p>Rows</p>
                                    <input type="range" name="rows" value="<?php echo $_SESSION[rows]; ?>" min="1" max="250" data-highlight="true" data-mini="true">
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_2 ?>">?</div>
                        </div>
                        
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_3" class="trigg collapsed">Base Color</a>
                            <div id="param_3" class="collapse">
                                <div class="slid norange">
                                    <p>Red</p>
                                    <input type="range" name="r" value="<?php echo $_SESSION[r]; ?>" min="0" max="255" data-highlight="true" data-mini="true">
                                </div>
                                <div class="slid norange">
                                    <p>Green</p>
                                    <input type="range" name="g" value="<?php echo $_SESSION[g]; ?>" min="0" max="255" data-highlight="true" data-mini="true">
                                </div>
                                <div class="slid norange">
                                    <p>Blue</p>
                                    <input type="range" name="b" value="<?php echo $_SESSION[b]; ?>" min="0" max="255" data-highlight="true" data-mini="true">
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_3 ?>">?</div>
                        </div>
                        
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_4" class="trigg collapsed">Color modification</a>
                            <div id="param_4" class="collapse">
                                <div class="slid norange">
                                    <p>Red</p>
                                    <input type="range" name="rmod" value="<?php echo $_SESSION[rmod]; ?>" min="0" max="255" data-highlight="true" data-mini="true">
                                </div>
                                <div class="checkboxes">
                                    <p><input type="checkbox" class="check" name="r_glitch" value="1"<?php echo $check_r_glitch; ?>><label for="r_glitch">Glitch</label></p>
                                    <p><input type="checkbox" class="check" name="incrr" value="0"<?php echo $check_incrr; ?>><label for="incrr">Inverse</label></p>
                                </div>
                                <div class="slid norange">
                                    <p>Green</p>
                                    <input type="range" name="gmod" value="<?php echo $_SESSION[gmod]; ?>" min="0" max="255" data-highlight="true" data-mini="true">
                                </div>
                                <div class="checkboxes">
                                        <p><input type="checkbox" class="check" name="g_glitch" value="1"<?php echo $check_g_glitch; ?>><label for="g_glitch">Glitch</label></p>
                                        <p><input type="checkbox" class="check" name="incrg" value="0"<?php echo $check_incrg; ?>><label for="incrg">Inverse</label></p>
                                </div>
                                <div class="slid norange">
                                    <p>Blue</p>
                                    <input type="range" name="bmod" value="<?php echo $_SESSION[bmod]; ?>" min="0" max="255" data-highlight="true" data-mini="true">
                                </div>
                                <div class="checkboxes">
                                        <p><input type="checkbox" class="check" name="b_glitch" value="1"<?php echo $check_b_glitch; ?>><label for="b_glitch">Glitch</label></p>
                                        <p><input type="checkbox" class="check" name="incrb" value="0"<?php echo $check_incrb; ?>><label for="incrb">Inverse</label></p>
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_4 ?>">?</div>
                        </div>
                        <div class="param">
                            <a data-toggle="collapse" data-target="#param_7" class="trigg collapsed">Fill mode</a>
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
                            <a data-toggle="collapse" data-target="#param_6" class="trigg collapsed">Color modification limits</a>
                            <div id="param_6" class="collapse">
                                <div class="slid" data-role="rangeslider" data-mini="true">
                                    <p>Red limits</p>
                                    <input type="range" name="rlimits_min" value="<?php echo $_SESSION[rlimits_min]; ?>" min="0" max="255">
                                    <input type="range" name="rlimits_max" value="<?php echo $_SESSION[rlimits_max]; ?>" min="0" max="255">
                                </div>
                                <div class="slid" data-role="rangeslider" data-mini="true">
                                    <p>green limits</p>
                                    <input type="range" name="glimits_min" value="<?php echo $_SESSION[glimits_min]; ?>" min="0" max="255">
                                    <input type="range" name="glimits_max" value="<?php echo $_SESSION[glimits_max]; ?>" min="0" max="255">
                                </div>
                                <div class="slid" data-role="rangeslider" data-mini="true">
                                    <p>Blue limits</p>
                                    <input type="range" name="blimits_min" value="<?php echo $_SESSION[blimits_min]; ?>" min="0" max="255">
                                    <input type="range" name="blimits_max" value="<?php echo $_SESSION[blimits_max]; ?>" min="0" max="255">
                                </div>
                            </div>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="right" title="<?php echo $help_6 ?>">?</div>
                        </div>
                        <input type="hidden" name="modif" value="ok" />
                    </form>
                    <form action="random.php"  method="post" id="randform">
                        <input type="hidden" name="rand" value="1" />
                        <input type="submit" value="Randomize !">
                    </form>
                    <form action="save.php"  method="post" id="saveform">                        
                        <input type="submit" value="Save image to gallery (Exit editor)">
                        <div class="sign">
                            Sign your artwork : <input type="text" maxlength="25" id="sign" name="sign" placeholder="Anonymous"/>
                            <div class="param_info" data-html="true" data-toggle="tooltip" data-placement="top" title="<?php echo $help_8 ?>">?</div>
                        </div>
                    </form>
                </div>
            </aside>
            
            <article>
                

                    <iframe name="frame" class="frame" src="img.php" frameborder="0"></iframe>
                    
                    
            </article>
        </div>
        <footer>
            <p>All images are under <a href="https://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank">Creative Commons Licence BY-NC-SA</a> - Credit : Benoît Ripoche - Github -> <a href="https://github.com/Poshri" target="_blank">Pochwar</a></p>
        </footer>
  
        
        
       <!---->
       <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
       <!--disable ajax in JQuery Mobile-->
       <script>
            $(document).on("mobileinit", function(){
            $.mobile.ajaxEnabled=false;
            $.mobile.loadingMessage = false;
            });            
        </script>
       <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/functions.js"></script>
    </body>
</html>