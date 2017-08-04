<?php    
    
    echo "0";
    $tokens = array('1' => 'bnPCz7RNBSZ2h/PbGjAPN1iaK4PIIF0MlLrar0iOFi5kpcjb8qGcQCQZngEAnsS2QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBcs7twRoZc+fC59BcRxhwPWlvmr/nXevWi7w1FWg4QoMBwdB04t89/1O/w1cDnyilFU='
                    '2' => 'S3VhGqoaXc1OFAxRsYPrIpcuqMXf7Zc9/b9fXM8iXf3EEAJAMIXtoZBlcrdScnb86qVYXGI80LOObJe1H9EaoK4ZfSiSHwpUrRgQxlREc/Y7ZKfNYCcmdBkE+GPik3HsrAnlLnjICCQtAZXij9VHzwdB04t89/1O/w1cDnyilFU=');
                                //oil,ffon
    $mids = array('1'=>array('Ub5fea2ff169cba24b2179fd33e59e454','U7de80d0a2ceea863e831375badd2eb55'),
                  '2'=>array('U30e8563887497419674d43526fb4d878','U7de80d0a2ceea863e831375badd2eb55'));//ffon,code
    $text = '123';
    var_dump($tokens);
    var_dump($mids);

    // foreach($tokens as $key_token => $token){
    //     echo $key_token;
    //     echo "<br>";
    //     echo $token;
    //     echo "<br>";
        // foreach($mids as $key_mid => $mid){
        //     echo $key_mid;
        //     echo "<br>";
        //     echo $mid;
        //     echo "<br>";
        // }

  //  }
   
    
    
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
