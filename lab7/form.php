<?php
    require ('./form_func.php');  
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Form</title>
    <link rel='stylesheet' href='./style.css'>
    <style>
        <?php 
            if($firstLoad){
                echo '#show{ display:none;}';
            }
            else{
                echo '#build{display:none;}';         
               }
        ?>
    </style>
</head>
<body>
    <div class='wrapper' id='build'>
        <?php echo $Form['build'] ?>
    </div>
    <div class='wrapper' id='show'>
        <?php echo $Form['show'] ?>
    </div>
    <div class='popup' id='thanks' >
        <h1 class='popup__title'>
            Спасибо за заполнение анкеты!
        </h1>
    </div>
</body>
</html>