<html>
    <meta charset="utf-8">
<?php
getMid();
function getMid()
{
    $strAccessToken = "7uCUqHp4ZPaCraRiNL+FYnbgH7KSzEME+hIEZvOf0sxRyEuEjQ9O32liOHwmLUFmcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQqHfRVdzDJv4ZBpSy4ql5bt3COy1hmKkVdRlDo1swsePgdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/message/reply";
    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
    
     if ($arrJson['events'][0]['type'] == 'follow') {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "สวัสดี ID = ".$arrJson['events'][0]['source']['userId']."(event type follow : ".$arrJson['events'][0]['type'].")";
        $mid = $arrJson['events'][0]['source']['userId'];
        getName($mid);
 
      }else{
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "event type : ".$arrJson['events'][0]['message']['type'];        
     }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
    var_dump($result);
}
function getName($mid)
{
    $strAccessToken = "7uCUqHp4ZPaCraRiNL+FYnbgH7KSzEME+hIEZvOf0sxRyEuEjQ9O32liOHwmLUFmcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQqHfRVdzDJv4ZBpSy4ql5bt3COy1hmKkVdRlDo1swsePgdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/profile/$mid";
    $header = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $strAccessToken
    );
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, $strUrl);
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
   insert_data_tb($result);
}
function insert_data_tb($data)
{
    $string = preg_replace('/\s+/', '', $data); 
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'https://uat.dxplace.com/dx_line/line_member?data='.$string.'&add_by=3');
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                            )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
}
    ?>
</html>
