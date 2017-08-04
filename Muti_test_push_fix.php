<?php    
    
    
    $tokens = array('1'=>'4IBuBmV6FywcyJmUK34M8karKQx3d4ferATfOBddUE5lOKYK4hMX5nn6zHmY0xU435cWVjdmcsqIsDjlsWQNO2siGwPWEXtl7Y67lf2v0nEGIAfvuKDtBJZx4JUtwgb+PJWLcRN8TArRFMfNP3ZGKQdB04t89/1O/w1cDnyilFU=','2'=>'7uCUqHp4ZPaCraRiNL+FYnbgH7KSzEME+hIEZvOf0sxRyEuEjQ9O32liOHwmLUFmcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQqHfRVdzDJv4ZBpSy4ql5bt3COy1hmKkVdRlDo1swsePgdB04t89/1O/w1cDnyilFU=');
    // $token = $tokens;
    // $mid = $mids;
    // $text = '123';
    
    var_dump($tokens);

    foreach($tokens as $key=>$token){
        echo $key;
        echo "<br>";
        echo $token;
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
