<!DOCTYPE html>
<html lang="th">
111
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
        $chAdd = curl_init();
        curl_setopt($chAdd, CURLOPT_URL, 'url');
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
     
    ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-25 head-form">
                    <h1 align="center">Push Massages</h1>
                </div>
                <form method="GET" action="Muti_test_member_2.php">
                    <div class="form-group">
                        <div class="container" align="center">
                            <h2>Line@</h2>
                            <?php  
                            $i=0;
                            $j=0;
                            while($i!=$count) { ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="<?php echo $line_master[$i]->id; ?>" name="id[]"> 
                                        <?php $id = $line_master[$i]->id; echo $id;
                                            echo "    ";
                                            echo $line_master[$i]->line_name; 
                                        ?>
                                    </label><br>
                                </div>
                                
                            <?
                                $i++;
                            }
                            ?>
                        </div>
                        <br><br><br>
                        <div align="center">
                            <button type="reset" value="Reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>
