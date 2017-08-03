<?php
    
    $token = $_GET['token'];
    $mid = $_GET['mid'];
    $text = $_GET['text'];
    
    echo "22";

//     echo "result ";
//     echo "<br>";
//     var_dump($result);
//     echo "<br>"; 
    echo "token";
    echo "<br>";
    var_dump($token);
    echo "<br>";
//     echo "mid";
//     echo "<br>";
//     var_dump($mid);
//     echo "<br>";
//     echo "text";
//     echo "<br>";
//     var_dump($text);
//     echo "<br>";


foreach($token as $key=>$token1){
    echo $key;echo "<br>";
    echo $token1;echo "<br>";
    for($token1 as $tokens){
        print_r(array_keys($tokens));
    }
    
}

   
    

    
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
