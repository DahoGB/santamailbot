<?php
include (__DIR__ . '/vendor/autoload.php');

function createPhoto($text){
    $imagefile = 'img/temp.jpg';
    $image = new \claviska\SimpleImage();
    /* $font = imageloadfont('font/font.ttf');*/
    // Manipulate it
    $image
        ->fromFile('img/temp.jpg')              // load parrot.jpg
        ->text($text,
            array(
                'fontFile' => __DIR__ . '/font/font.ttf',
                'size' => 90,
                'color' => '#FF0000',
                'anchor' => 'center',
                'xOffset' => 120,
            )
        )
        ->toFile('img/image.jpg');



}

$telegram = new Telegram('1463917846:AAGZu5eUr_nkYkMQxPddEJWNibffVzKcJR8');

$req = $telegram->getUpdates();

for ($i = 0; $i < $telegram-> UpdateCount(); $i++) {
    // You NEED to call serveUpdate before accessing the values of message in Telegram Class
    $telegram->serveUpdate($i);
    $text = $telegram->Text();
    $chat_id = $telegram->ChatID();

    if ($text == '/start') {
        $reply = 'Ismingizni kiriting. Biz sizni qorboboning ro\'yxatidan qidirib ko\'ramiz:';
        $content = array('chat_id' => $chat_id, 'text' => $reply);
        $telegram->sendMessage($content);
    }
    else {
        $reply = 'Tabriklaymiz! Biz sizni ro\'yxatdan topdik:';
        $content = array('chat_id' => $chat_id, 'text' => $reply);
        $telegram->sendMessage($content);

        header("Content-type: image/jpeg");

        /*** specify an image and text ***/
        $im = createPhoto($text);;

        /*** spit the image out the other end ***/
        imagejpeg($im, 'img/image.jpg');
        $img = curl_file_create('img/image.jpg','image/jpg');
        $content = array('chat_id' => $chat_id, 'photo' => $img );
        $telegram->sendPhoto($content);
    }
    // DO OTHER STUFF
}
