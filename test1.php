<?php
//Check the form to fill
if(!empty($_POST)){
    //Check your entries
    $error='';
    foreach ($_POST as $key => $value){
        if(empty($value) || !is_numeric($value)){
            $error .= 'Field '.$key.' empty or not number!<br>';
        }
    }
    //If there are no errors
    if(empty($error)){
        //Adding data in the form of an array $arr
        $arr=array();
        array_push($arr, $_POST['x'], $_POST['y'], $_POST['z']);
        $res = 0;
        //calculation results (We add up the values and check the amount that would have been higher mass limit)
        for($i=0; $i<count($arr); $i++){
            for ($b=$i; $b<count($arr); $b++){
                //skip repetitive calculations
                if($b==$i) continue;
                //if the amount is less than or equal to the limit Wess add another option to the result
                if($arr[$i]+$arr[$b]<=$_POST['w']) $res++;
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candies</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

    <h1>Candies</h1>
    <form method="post" action="/test1.php">
        <label for="inputx">Enter X <input name="x" type="number" id="inputx" value="<?php echo $_POST['x']?>"></label>
        <label for="inputy">Enter Y <input name="y" type="number" id="inputy" value="<?php echo $_POST['y']?>"></label>
        <label for="inputz">Enter Z <input name="z" type="number" id="inputz" value="<?php echo $_POST['z']?>"></label>
        <label for="inputw">Enter W <input name="w" type="number" id="inputw" value="<?php echo $_POST['w']?>"></label>
        <input type="submit" value="submit">
    </form>
    <!--print errors-->
    <?php if(!empty($error)){?>
    <div class="error">
        <p><?php echo $error ?></p>
    </div>
    <?php }?>
    <!--print result-->
    <?php if(!empty($res)){?>
    <div class="result">
        <p>Result: <?php echo $res ?></p>
    </div>
    <?php }?>
</body>
</html>
