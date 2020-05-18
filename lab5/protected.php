<?php
if (!$_COOKIE["Auth"]){
    $host  = $_SERVER['HTTP_HOST'];
	$extra = 'admin.html';
    header("Location: http://$host/lab5/$extra");
}
$html = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Adding in db</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto&display=swap'rel='stylesheet'>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <div class='cart-wrapper'>
        <h1 class='cart-wrapper__title'> Welcome to the protected page!</h1>
        <a href='admin.html' class='cart-wrapper__link'>Back to admin panel</a>
        <a href='registr.html' class='cart-wrapper__link gray'>Authorization</a>
     </div>
</body>
</html>";

echo $html;
?>