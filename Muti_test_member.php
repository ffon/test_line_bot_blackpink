<?php
$id = $_GET['id'];


echo "id - ";
echo "<br>";
var_dump($id);
echo "<br>";

get_token($id);

function get_token($id)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_master');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                            )
    );
    $result = curl_exec($ch);
    $err    = curl_error($ch);
    curl_close($ch);

    $line_master = json_decode($result);
    $count = count($line_master);

    var_dump($id);
    echo "<br>";
    
   
   
    $count_id=count($id);
    echo "count_id";echo "<br>";
    var_dump($count_id);echo "<br>";
    
    for ($i=0; $i<$count; $i++) {
        for ($j=0; $j<$count_id; $j++) {
            if ($id[$j]==$line_master[$i]->id) {
                        $token[$i] = $line_master[$i]->access_token;
            }
        }
    }
  

    
    echo "i";echo "<br>";
    var_dump($i);

    echo "token";echo "<br>";
    var_dump($token);echo "<br>";
}
