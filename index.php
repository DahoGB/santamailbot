<?php
include (__DIR__ . '/vendor/autoload.php');
define('API_KEY', '1487439829:AAELmueGWI_B3R8W66vEBQEQNtmGIt2LpZQ');


$telegram = new Telegram(API_KEY);

$req = $telegram->getUpdates();

for ($i = 0; $i < $telegram-> UpdateCount(); $i++) {
    // You NEED to call serveUpdate before accessing the values of message in Telegram Class
    $telegram->serveUpdate($i);
    $text = $telegram->Text();
    $chat_id = $telegram->ChatID();
    $content = array('chat_id' => $chat_id, 'text' => '$reply');
    $telegram->sendMessage($content);

    // DO OTHER STUFF
}
