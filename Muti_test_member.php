<?php
$id = $_GET['id'];
$access_token = $_GET['access_token'];

echo "id";echo "<br>";
var_dump($id);

echo "access_token";echo "<br>";
var_dump($access_token);

$chAdd = curl_init();
curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_member');
curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
"Content-Type: application/json",
                    )
);
$result = curl_exec($chAdd);
$err    = curl_error($chAdd);
curl_close($chAdd);

$line_member = json_decode($result);
$count = count($line_member);


?>
