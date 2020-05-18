<?php

$password = $_POST['password'];
$username = $_POST['username'];

$pass_h = password_verify($password, PASSWORD_DEFAULT);
echo $pass_h;

$fd = fopen("psw.txt", "r");
$auth = false;
while (!feof($fd)) {
	// получаем строку
	$buffer = fgets($fd);
	// отделяем пароль 
	if ($buffer){
		$pass = explode(" ", $buffer);
	}
if (password_verify($password, $pass[1])) 
	$auth = true;
}
if ($auth){
	$host  = $_SERVER['HTTP_HOST'];
	$extra = 'protected.php';
	setCookie('Auth','true');
    header("Location: http://$host/lab5/$extra");
}
else{
	$host  = $_SERVER['HTTP_HOST'];
	$extra = 'error.php';
    header("Location: http://$host/lab5/$extra");
}
fclose($fd);
?>