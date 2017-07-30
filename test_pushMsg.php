<?php
$id = $_GET['id'];
$mid = $_GET['mid'];
$text = $_GET['text'];

var_dump($token);
echo "<br>";
var_dump($mid);
echo "<br>";
var_dump($text);
echo "<br>";
getToken($id);

function getToken($id)
{
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
    $countMas = count($line_master);
    $j=0;
    while ($j!=$countMas) {
        if ($id==$line_master[$j]->id) {
            $token=$line_master[$j]->access_token;
        }
    }
    echo $token;
}
?>
