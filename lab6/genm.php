<?php
//передаем заголовок
header("Content-type: image/png");
//создаем область отображения картинки
$im = imagecreate(550, 620);
//задаем  фон 
$background = imagecolorallocate($im, 255,255,255);

$black = imagecolorallocate($im, 0,0,0);
//определяем цвета
$color[] = imagecolorallocate($im, 0xEE, 0xF9, 0xBF);
$color[] = imagecolorallocate($im, 0xA7, 0xE9, 0xAF);
$color[] = imagecolorallocate($im, 0x75, 0xB7, 0x9E);
$color[] = imagecolorallocate($im, 0x6A, 0x8C, 0xAF);
$color[] = imagecolorallocate($im, 0x19, 0x29, 0x65);
//сид генератора привязанного к времени
mt_srand((double)microtime()*1000000);
//получаем набор чисел

$array = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
for ($l=0;$l<100;$l++){
	$x=mt_rand(0, 9);
	$array[$x]++;
}
$freq = array (0, 0, 0, 0, 0);
//заполняем массив частот 
for ($l=0;$l<5;$l++){
	$freq[$l]= ($array[$l*2]+$array[($l*2)+1])/2;
}

//масштабный коэффициент
 $mk=620/max($freq);
//строим прямоугольники 
for ($l=0;$l<5;$l++){
	imagefilledrectangle($im, (110*$l), (620-($freq[$l]*$mk)), (110*($l+1)), 620, ($color[$l]));
	imagettftext($im,12,0,(110*$l+10),610, $black,"C:\\xampp\\htdocs\\lab6\\arial.ttf","Range ".(($l*2)).' - '.(($l*2)+1));
 }
 //абсолютный путь к шрифту

imagepng($im);
?>