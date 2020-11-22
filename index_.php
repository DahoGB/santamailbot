<?php
/*
 * Author: DIlshodjon Olimov
 */

function sendMessage($chatID, $message, $token) {
    echo "sending message to " . $chatID . "\n";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($message) . "&photo='/img/image.jpg'";
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function sendImage($chatID, $path, $token){

    $bot_url    = "https://api.telegram.org/bot" . $token . '/';
    $url        = $bot_url . "sendPhoto?chat_id=" . $chatID ;

    $post_fields = array(
        'chat_id'   => $chatID,
        'photo'     => new CURLFile(realpath($path))
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type:multipart/form-data"
    ));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    $output = curl_exec($ch);
    echo 'result: ' . $output;
    return $output;

}

$token = "1463917846:AAGZu5eUr_nkYkMQxPddEJWNibffVzKcJR8";
$chatID = 560005006;
$message = 'hbdsviojf';
$request_params = [
    'chat_id' => $chatID,
    'message' => $message
];

$text_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request_params);

$ssl_params = array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$path = '';

/*file_get_contents($text_url, false, stream_context_create($ssl_params));*/

echo sendMessage($chatID, $message, $token);
/*echo sendImage($chatID, $path, $token);*/

