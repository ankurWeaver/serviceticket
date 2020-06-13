<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Swapnauddan : Home</title>
    <link rel="shortcut icon" href="<?php echo $images_path; ?>shortcuticon.png">
<?php echo $style; ?>
    <script src="<?php echo $js_path; ?>jquery-3.1.0.min.js"></script>
  </head>
  <body>
<header>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 headerwrap">
                    <a class="logo" href="<?php echo $base_url; ?>"><img alt="logo" src="<?php echo $images_path; ?>logo.png"/></a>
                    <div class="topnav" id="myTopnav">
                        <div class="menuWrap">
                            <a href="<?php echo $base_url; ?>" class="active spriteBefore home">Home</a>
                            <a class="spriteBefore about" href="<?php echo $base_url.'about-us'; ?>">About Us</a>
                            <a class="spriteBefore tours" href="<?php echo $base_url.'tours'; ?>">Tour</a>
                            <a class="spriteBefore tours" href="<?php echo $base_url.'trek'; ?>">Trek</a>
                            <a class="spriteBefore tours" href="<?php echo $base_url.'expedition'; ?>">Expedition</a>
                            
                            <a class="spriteBefore contact" href="contactus">Contact</a>
                        </div>
                        <a href="javascript:void(0);" style="font-size:20px;" class="icon" onclick="myFunction()">&#9776;</a>
                    </div>
                </div>
            </div>
        </div>
    </header>