<!DOCTYPE html>
<html lang="th">

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
    <div class="container">
        <div class="row">
            <div class="col-xs-12 head-form">
                <h1 align="center">Push Massages</h1>
            </div>
            
            <form method="Get" action="test_pushMsg.php">
                <div class="form-group">
                    <div class="container">
                        <h2>Line Member </h2>
                        <?php $i=0; while($i!=$count){
                            if($line_member[$i]->line_master_id==$id){?>
                            
                            <div class="checkbox">
                                <label><input type="checkbox" value="<?php echo $line_member[$i]->user_id; ?>"> <?php echo $line_member[$i]->id; echo " "; echo $line_member[$i]->member_name; ?></label><br>
                            </div>
                            <?php 
                            $i++; 
                            }else{?>
                            <div class="checkbox">
                                <label><input type="checkbox" > <?php echo "not found"; ?></label><br>
                            </div>
                            <?    break;
                            }
                        }
                        ?>
                    </div>
                    <div>
                        <label>Text</label>
                        <textarea class="form-control" rows="5" id="textArea" name="textArea"></textarea><br>
                    </div>

                    <div align="center">
                        <button type="cancel" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="submit">Send</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
