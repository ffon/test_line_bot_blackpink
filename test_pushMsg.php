<?php

getToken();

function getToken()
{
    $id = $_GET['id'];
    $mid = $_GET['mid'];
    $text = $_GET['text'];
    echo "id";echo "<br>";
    var_dump($id);
    echo "<br>";
    echo "mid";echo "<br>";
    var_dump($mid);
    echo "<br>";
    echo "Text";echo "<br>";
    var_dump($text);
    echo "<br>";
    
    
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_master');
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
        }
    }
    echo "token";echo "<br>";
    echo $token;
}


?>
