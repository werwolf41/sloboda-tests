<?php
//Check the form to fill
if(!empty($_POST)){
    //Check your entries
    $error = '';
    if(empty($_POST['N']) || !is_numeric($_POST['N'])) $error .= 'Field N empty or not number<br>';
    if(empty($_POST['S']) || !is_numeric($_POST['S'])) $error .= 'Field S empty or not number<br>';
    $m = $_POST['matrix'];
    //We check the correctness of the matrix
    if(empty($m) || !preg_match("/^[0-1\s\+]+$/", $m) )  $error .= 'Field matrix empty or doesn`t comply with the rules of entry<br>';
    //If there are no errors
    if(empty($error)){
        //Assigning a variable input data $n $s
        $n=$_POST['N'];
        $s=$_POST['S'];
        //Splitting a string matrix arrays
        $m = explode("\r",$m);
        $matrix = array();
        //Splitting a strings matrix arrays
        foreach ($m as $value){
            $matrix[] = explode(' ', $value);
        }
        //An array with the positions I found friends in the matrix
        $find = array(
            'row'=>array(),
            'str'=>array()
        );
        //Check the employee's line
        for($i=0; $i<$n; $i++){
            if($matrix[$s-1][$i]==1){
                $find['row'][]=$i;
                $find['str'][]=$s-1;
            }
        }
        //Check found matched friends
        for($i=0; isset($find['row'][$i]) && isset($find['str'][$i]); $i++){
            for($z=0; $z<$n; $z++){
                if($matrix[$find['row'][$i]][$z]==1 && $z!=$find['str'][$i]){
                    $find['row'][]=$z;
                    $find['str'][]=$find['row'][$i];
                }
            }
        }
        //summarize the number of friends
        $count = count($find['row']);
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
    <link href="css/styles.css" rel="stylesheet">
    <title>Sloboda friends </title>
</head>
<body>
    <div>
        <form action="" method="post">
            <label for="input_n">Enter N <input type="number" name="N" id="input_n" value="<?php echo $_POST['N']?>"></label>
            <label for="input_s">Enter S <input type="number" name="S" id="input_s" value="<?php echo $_POST['S']?>"></label>
            <label for="input_matrix">Enter the matrix <textarea name="matrix" id="input_matrix"><?php echo $_POST['matrix']?></textarea><br/>
            <small>Separated by commas.</small>
            </label>
            <div class="clr"></div>
            <input type="submit" value="submit">
        </form>
        <div class="clr"></div>
    </div>
    <!--print errors-->
    <?php if(!empty($error)){?>
   <div class="error">
       <p><?php echo $error ?></p>
   </div>
   <?php }?>
    <!--print result-->
    <?php if(!empty($count)){?>
    <div class="result">
        <p>Result: <?php echo $count ?></p>
    </div>
    <?php }?>
</body>
</html>

<?php

?>