<?php
    
    echo "22";
    echo "<br>";
    $tokens = array('1' => 'bnPCz7RNBSZ2h/PbGjAPN1iaK4PIIF0MlLrar0iOFi5kpcjb8qGcQCQZngEAnsS2QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBcs7twRoZc+fC59BcRxhwPWlvmr/nXevWi7w1FWg4QoMBwdB04t89/1O/w1cDnyilFU=',
                    '2' => '7uCUqHp4ZPaCraRiNL+FYnbgH7KSzEME+hIEZvOf0sxRyEuEjQ9O32liOHwmLUFmcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQqHfRVdzDJv4ZBpSy4ql5bt3COy1hmKkVdRlDo1swsePgdB04t89/1O/w1cDnyilFU='
                    );
                                //ffon,oil
    $mids = array('1'=>array('U7de80d0a2ceea863e831375badd2eb55','Ub5fea2ff169cba24b2179fd33e59e454'),
                  '2'=>array('U7de80d0a2ceea863e831375badd2eb55')
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

    foreach ($tokens as $key_token => $token) {
        foreach ($mids as $key_mid => $mid) {
            if ($key_token == $key_mid) {
                // echo "key token";
                // echo "<br>";
                // echo $key_token;
                // echo "<br>";
                // echo "key mid";
                // echo "<br>";
                // echo $key_mid;
                // echo "<br>";
                // echo "key_token == key_mid";
                // echo "<br>";
                foreach ($mid as $key_value => $mid_value) {
                    $messages = [
                    "type" => "text",
                    "text" => $text
                    ];
 
                    $post_data = [
                    "to" => $mid_value,
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
            }
        }
    }
    echo "<br>";
    echo "result";echo "<br>";
    var_dump($result);
