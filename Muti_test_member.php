<!DOCTYPE html>
<html lang="th">
1

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
        echo "id++";
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
        $count = count($line_member);
        $count_id = count($id);
    
    ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 head-form">
                    <h1 align="center">Push Massages</h1>
                </div>

                <form method="GET" action="Muti_pushMsg.php">
                    <div class="form-group">
                        <div class="container">
                            <h2>Line Member </h2>
                            <?php
                            for ($i=0; $i<$count; $i++) {
                                for ($j=0; $j<$count_id; $j++) {
                                    if ($id[$j] == $line_member[$i]->line_master_id) {?>
                                        <div class="checkbox">
                                                <label><input type="checkbox" value="<?php echo $line_member[$i]->user_id; ?>" name="mid[]"> 
                                                <?php echo $line_member[$i]->line_master_id;
                                                echo " ";
                                                echo $line_member[$i]->id;
                                                echo " ";
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
                            <input type="hidden" value="<?php echo $id; ?>" name="id"/>
                            <button type="reset" value="Reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>
