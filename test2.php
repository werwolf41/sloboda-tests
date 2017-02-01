<?php
//Check the form to fill
if(!empty($_POST)) {
    //Check your entries
    $error = '';
    foreach ($_POST as $key => $value) {
        if (empty($value) || !is_numeric($value)) {
            $error .= 'Field ' . $key . ' empty or not number!<br>';
        }
    }
    //If there are no errors
    if (empty($error)) {
        //Assigning a variable input data $x $y $N
        $x = $_POST['x'];
        $y = $_POST['y'];
        $n = $_POST['N'];
        $time = 0;
        //Determine how the printer will
        if($x<$y){
            //print first pages
            $n -=$y;
            $printer = "Printer y is faster than printer x";
        }else{
            //print first pages
            $printer = "Printer x is faster than printer y";
            $n -=$x;
        }
        //subtract the first second
        $time = 1;
        //counting the remaining time
        $time += $n/($x+$y);
        //round upward
        $time = ceil($time);
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
    <title>Secretary Jeniffer</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Secretary Jeniffer</h1>
    <form method="post" action="">
        <label for="inputn">Enter N <input name="N" type="number" id="inputn" value="<?php echo $_POST['N']?>" ></label>
        <label for="inputx">Enter x <input name="x" type="number" id="inputx" value="<?php echo $_POST['x']?>" ></label>
        <label for="inputy">Enter y <input name="y" type="number" id="inputy" value="<?php echo $_POST['y']?>"></label>
        <input type="submit" value="submit">
    </form>
    <!--print errors-->
    <?php if(!empty($error)){?>
    <div class="error">
        <p><?php echo $error ?></p>
    </div>
    <?php }?>
    <!--print result-->
    <?php if(!empty($time)){?>
    <div class="result">
        <p>Result: <?php echo $time ?></p>
    </div>
    <div><?php echo $printer; ?></div>
    <?php }?>
</body>
</html>