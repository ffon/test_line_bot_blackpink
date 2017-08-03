<!DOCTYPE html>
<html lang="th">
1010
<br>
<head>
    <title>Push Messages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .head-form h1 {
            padding-top: 30px;
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <?php
        $id = $_GET['id'];
        echo "id";
        echo "<br>";
        var_dump($id);
        echo "<br>";
 
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
        $count_member = count($line_member);
        $count_id = count($id);
    
    ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 head-form">
                    <h1 align="center">Push Massages</h1>
                </div>
                <?php
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
                    $count_master = count($line_master);
                   // $count_id=count($id);
                    ?>

                <form method="GET" action="Muti_pushMsg.php">
                    <div class="form-group">
                        <div class="container">
                            <h2>Line Member </h2>
                            <label>(Line@) Member name</label>
                            <?php
                            for ($i=0; $i<$count_member; $i++) {
                                for ($j=0; $j<$count_id; $j++) {
                                    if ($id[$j] == $line_member[$i]->line_master_id) {
                                        //$mid[$id[$j]] = array($j => array($line_member[$i]->user_id));
                                        //$mid[$j] = array($id[$j] => array($line_member[$i]->user_id));
                                        $mid = array($id[$j] => $line_member[$i]->user_id);

                                    ?>

                                        <div class="checkbox">
                                                <label><input type="checkbox" value="<?php print_r($mid); ?>" name="mid[]"> 
                                                <?php
                                                    echo "(";
                                                    echo $line_member[$i]->created_user;
                                                    echo ")";
                                                    echo "     ";
                                                    echo $line_member[$i]->member_name;                                
                                                ?>
                                                </label><br>
                                        </div>
                                <?php
                                    }
                                }
                            }
                            
                        ?>
                        </div>
                        <div>
                            <label>Text</label>
                            <textarea class="form-control" rows="5" id="textArea" name="text"></textarea><br>
                        </div>
                        
                        <div align="center">
                        <?php
                        for ($i=0; $i<$count_master; $i++) {
                            for ($j=0; $j<$count_id; $j++) {
                                if ($id[$j]==$line_master[$i]->id) {
                                     $token[$j] = array($id[$j] => $line_master[$i]->access_token);
                                    ?>
                                    <input type="hidden" value="<? print_r($token[$j])?>" name="token[]"/>
                                    <?php
                                }
                            }
                        }
                            for($token as $key1=>$token1){
                                for($token1 as $key2=>$token2){
                                    print_r($key2);
                                    print_r($token2);
                                }
                            }
                            
                        ?>
                            <button type="reset" value="Reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>
