<?php
$id = $_GET['id'];


echo "id - ";
echo "<br>";
var_dump($id);
echo "<br>";

get_token($id);
filter_member($id);

function get_token($id)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://uat.dxplace.com/dxtms/get_line_master');
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
    echo "count_id";
    echo "<br>";
    var_dump($count_id);
    echo "<br>";
    
    for ($i=0; $i<$count; $i++) {
        for ($j=0; $j<$count_id; $j++) {
            if ($id[$j]==$line_master[$i]->id) {
                        $token[$j] = $line_master[$i]->access_token;
            }
        }
    }
    
    echo "i";
    echo "<br>";
    var_dump($i);

    echo "token";
    echo "<br>";
    var_dump($token);
    echo "<br>";
}

function filter_member($id)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://uat.dxplace.com/dxtms/get_line_member');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                            )
    );
    $result = curl_exec($ch);
    $err    = curl_error($ch);
    curl_close($ch);

    $line_member = json_decode($result);
    $count = count($line_member);
    $count_id = count($id);

    echo "filter_member";
    echo "<br>";

    echo "id";
    echo "<br>";
    var_dump($id);
    echo "<br>";
    
    
    // for ($i=0; $i<$count; $i++) {
    //     for ($j=0; $j<$count_id; $j++) {
    //         if ($id[$j] == $line_member[$i]->line_master_id) {
    //             echo $line_member[$j]->line_master_id;
    //             echo "  ";
    //             echo $line_member[$j]->id;
    //             echo "  ";
    //             echo $line_member[$j]->member_name;
    //             echo "  ";
    //             echo $line_member[$j]->user_id;
    //             echo "  ";
    //         }
    //     }
    //     echo "<br>";
    // }


    
    $j=0;
    $i=0;
    while ($i!=$count) {
        if ($id[$i] == $line_member[$i]->line_master_id) {
            echo $line_member[$i]->line_master_id;
            echo "  ";
            echo $line_member[$i]->id;
            echo "  ";
            echo $line_member[$i]->member_name;
            echo "  ";
            echo $line_member[$i]->user_id;
            echo "  ";
        }
        echo "<br>";
        $i++;
    }
}
