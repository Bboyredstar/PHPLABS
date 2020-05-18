<?php
$text = "aBcE fGHij";
//Вторая часть строки соотвествует паттерну регулярного выражения => 
//5 букв a-z без учета регистра и 2 подстроки, соответствующие частям регулярного выражения взятые в скобки 
// вторая и четвертая  буква
//результат => в массив заносится массив хранящий строку полностью совпавшую с шаблоном и подстроки совпавшие с подстроками 
$result = preg_match_all("/[a-z]([a-z])[a-z]([a-z])[a-z]/i",$text,$matches,PREG_SET_ORDER);
print_r($matches);
//результат => массив элементами являются массивы, первый массив содержит строку совпавшую с целым шаблоном
// последующие элементы содержат подстроки совпавшие с подстроками шаблона
$result = preg_match_all("/[a-z]([a-z])[a-z]([a-z])[a-z]/i",$text,$matches,PREG_PATTERN_ORDER);
print_r($matches);
?> 