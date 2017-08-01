<?php
get_token();

function get_token()
{    
    $id = $_GET['id'];
    $mid = $_GET['mid'];
    $text = $_GET['text'];
    
    echo "id"; echo "<br>";
    var_dump($id);
    echo "mid"; echo "<br>";
    var_dump($mid);
    echo "text"; echo "<br>";
    var_dump($text);

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, 'https://uat.dxplace.com/dxtms/get_line_master');
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     "Content-Type: application/json",
//                             )
//     );
//     $result = curl_exec($ch);
//     $err    = curl_error($ch);
//     curl_close($ch);
//     $line_master = json_decode($result);
//     $count = count($line_master);
//     var_dump($id);
//     echo "<br>";
    
//     $count_id=count($id);
//     echo "count_id";
//     echo "<br>";
//     var_dump($count_id);
//     echo "<br>";
    
//     for ($i=0; $i<$count; $i++) {
//         for ($j=0; $j<$count_id; $j++) {
//             if ($id[$j]==$line_master[$i]->id) {
//                         $token[$j] = $line_master[$i]->access_token;
//             }
//         }
//     }
   
//     echo "token";
//     echo "<br>";
//     var_dump($token);
//     echo "<br>";

    //pushMsg($token,$mid,$text);
}

function pushMsg($token,$mids,$text){
   
    echo "mid";echo "<br>";
    var_dump($mids);echo "<br>";
    echo "Text";echo "<br>";
    var_dump($text);
    echo "token";echo "<br>";
    echo $token;echo "<br>";
    
    
    foreach($mids as $key => $mid){        
        $messages = [
            "type" => "text",
            "text" => $text
        ];
 
        $post_data = [
            "to" => $mid,
            "messages" => [$messages]
        ];
 
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        );
        $url = 'https://api.line.me/v2/bot/message/push';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);
}
//         echo "result ";echo "<br>";
//         var_dump($result);
}
?>
