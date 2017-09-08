<?php
    
    echo "22";
    echo "<br>";
    $tokens = array('1' => 'token'
                    '2' => 'token'
                );
                                //ffon,oil
    $mids = array('1'=>array('mid','mid'),
                  '2'=>array('mid')
                  );
    $text = 'test';

    echo "token";
    echo "<br>";
    var_dump($tokens);
    echo "<br>";

    echo "mids";
    echo "<br>";
    var_dump($mids);
    echo "<br>";

    echo "text";
    echo "<br>";
    var_dump($text);
    echo "<br>";

//     foreach ($tokens as $key_token => $token) {
//         foreach ($mids as $key_mid => $mid) {
//             if ($key_token == $key_mid) {
//                 // echo "key token";
//                 // echo "<br>";
//                 // echo $key_token;
//                 // echo "<br>";
//                 // echo "key mid";
//                 // echo "<br>";
//                 // echo $key_mid;
//                 // echo "<br>";
//                 // echo "key_token == key_mid";
//                 // echo "<br>";
//                 foreach ($mid as $key_value => $mid_value) {
//                     $messages = [
//                     "type" => "text",
//                     "text" => $text
//                     ];
 
//                     $post_data = [
//                     "to" => $mid_value,
//                     "messages" => [$messages]
//                     ];
   
        
//                     $header = array(
//                     'Content-Type: application/json',
//                     'Authorization: Bearer ' . $token
//                     );
    
//                     $url = 'https://api.line.me/v2/bot/message/push';
//                     $ch = curl_init($url);
//                     curl_setopt($ch, CURLOPT_POST, true);
//                     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
//                     curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//                     $result = curl_exec($ch);
//                     curl_close($ch);
//                 }
//             }
//         }
//     }
//     echo "<br>";
//     echo "result";echo "<br>";
//     var_dump($result);
