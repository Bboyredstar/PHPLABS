
<?php

    session_start();
    $html =  " <h1>2 page</h1>
<a href='1.php'>1 page</a>
<br>
<a href='index.php' class='settings'>Color settings</a>";
$redirect = "<h1 class='warning' >Cannot display this page check:</h1>
<br>
<a href='index.php' class='settings'>Color settings</a>
"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        body{
            background:<?php echo $_SESSION['color']?>;
        };
    </style>
</head>
<body>
    <?php
if (isset($_SESSION['color'])) {
     echo $html;  
}
else{
    $host  = $_SERVER['HTTP_HOST'];
    $extra = 'index.php';
    header("Location: http://$host/lab_4/$extra");
}?>
</body>
</html>