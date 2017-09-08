<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'url');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Content-Type: application/json",
                        )
);
$result = curl_exec($ch);
$err    = curl_error($ch);
curl_close($ch);


var_dump($result);

?>
