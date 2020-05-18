<?php
// получаем данные поста 
$pass = $_POST['password'];
$username = $_POST['username'];
// шифруем пароль 
$pass_h = password_hash($pass, PASSWORD_DEFAULT);
// открываем файл 
if(!$fd=fopen("psw.txt","r"))
    $fd = fopen("psw.txt", "w");

else{
    $fd = fopen("psw.txt", "a+");
}
// записываем данные 
if (!fputs($fd, "$username $pass_h \r\n"))
    echo "File saving error!";
fclose($fd);

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
        <h1 class='cart-wrapper__title'> Username, $username successful was added!</h1>
        <a href='admin.html' class='cart-wrapper__link'>Back to admin panel</a>
        <a href='registr.html' class='cart-wrapper__link gray'>Authorization</a>
     </div>
</body>
</html>";
echo $html;

?>