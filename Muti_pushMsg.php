<?php
    
    $token = $_GET['token'];
    $mid = $_GET['mid'];
    $text = $_GET['text'];
    
    $token_en = json_encode($token);
    $token_de = json_decode($token);
    echo "21"; echo "<br>";

    echo "token";echo "<br>";
    var_dump($token);echo "<br>";

    echo "token en";echo "<br>";
    var_dump($token_en);echo "<br>";

    echo "token_de";echo "<br>";
    var_dump($token_de);echo "<br>";

    echo "mid";echo "<br>";
    var_dump($mid);echo "<br>";
    echo "text"; echo "<br>";
   
    var_dump($text); echo "<br>";
    



//     foreach($token as $key1=>$token1){
//         foreach($token1 as $key2=>$token2){
//             print_r($key2);
//             echo "<br>";
//             print_r($token2);
//             echo "<br>";
//         }
//     }

   
    

    
// foreach(token as $key => $tokens){
// foreach ($mids as $key => $mid) {
//     $messages = [
//     "type" => "text",
//     "text" => $text
//     ];
 
//     $post_data = [
//     "to" => $mid,
//     "messages" => [$messages]
//     ];
   
        
//         $header = array(
//         'Content-Type: application/json',
//         'Authorization: Bearer ' . $tokens
//         );
    
//     $url = 'https://api.line.me/v2/bot/message/push';
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//     $result = curl_exec($ch);
//     curl_close($ch);
// }
// }
