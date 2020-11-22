<?php
include (__DIR__ . '/vendor/autoload.php');

try {
    // Create a new SimpleImage object
    $image = new \claviska\SimpleImage();
   /* $font = imageloadfont('font/font.ttf');*/
    // Manipulate it
    $image
        ->fromFile('img/temp.jpg')              // load parrot.jpg
       ->text('Dilshodjon Olimov',
            array(
                'fontFile' => __DIR__ . '/font/font.ttf',
                'size' => 90,
                'color' => '#FF0000',
                'anchor' => 'center',
                'xOffset' => 120,
                )
        )
        ->toFile('img/image.jpg');                         // output to the screen

} catch(Exception $err) {
    // Handle errors
    echo $err->getMessage();
}