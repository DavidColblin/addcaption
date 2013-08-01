<?php

/* AddCaption v0.1
   By Christophe Ramsamy

---------------------------
  Get params to pass:
    data: string caption. several lines can be added with \n.
    path: image path to fetch (can be cross donain)
  
  you can easily make the script more flexible by passing more parameters such as font, colour(r,g and b separately) etc, and then changing the script to read those params in $_GET.
*/

//------Font configs-----------
$font = 'segoeuib.ttf'; // caption font. ttf file should be in same dir as script.
$fontSize = "14";       // depends on your image size, trial and error
$fontRotation = "0"; // rotation angle of text if required


if (isset($_GET))
{
  header ("Content-type: image/jpeg"); // output of this script will be an image.

  $string = $_GET['data']; // text to be written on pic

$im = imagecreatefromjpeg($_GET['path']); // load image file in php.

$width = imagefontwidth($font) * strlen($string);
$height = imagefontheight($font) ;

$x = imagesx($im) - $width ;
$y = imagesy($im) - $height;

// here we add the color of text/shadow to the image palette (color allocate)
// first param is img source, next is rgb.

$shadowColor =imagecolorallocate ($im, 0, 0,0);
$textColor = imagecolorallocate ($im, 255, 255, 255);






/*write Shadow */
ImageTTFText($im, $fontSize, $fontRotation, 7, 22, $shadowColor, $font, $string);

/* write text on top of shadow */
ImageTTFText($im, $fontSize, $fontRotation, 5, 20, $textColor, $font, $string);

imagejpeg($im); // output image

}
// else { error handling code should go here }
?>