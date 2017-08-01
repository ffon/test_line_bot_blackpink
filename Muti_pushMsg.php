<?php
getToken();
function getToken()
{
    $id = $_GET['id'];
    $mid = $_GET['mid'];
    $text = $_GET['text'];
//     echo "id";echo "<br>";
//     var_dump($id);
//     echo "<br>";
//     echo "mid";echo "<br>";
//     var_dump($mid);
//     echo "<br>";
//     echo "Text";echo "<br>";
//     var_dump($text);
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'https://uat.dxplace.com/dxtms/get_line_master');
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                            )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    $line_master = json_decode($result);
    $count = count($line_master);
    
    $j=0;
    while ($j!=$count) {
        if ($id==$line_master[$j]->id) {
            $token=$line_master[$j]->access_token;
            $line_name=$line_master[$j]->line_name;
        }
        $j++;
    }
    echo "line@"."<br>";
    echo $line_name;
    echo "<br>";
//     echo "token";echo "<br>";
//     echo $token;echo "<br>";
   // pushMsg($token,$mid,$text);
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
        echo "result ";echo "<br>";
        var_dump($result);
}
?>
