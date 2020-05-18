<?php
//простая реализация без проверки на допустимость даты
function dateConvert($date){
    $newDate = preg_replace("/^(\d{4}){1,1}-(\d{2})-(\d{2})$/","$3.$2.$1",$date);
    return $newDate;
}
echo '1999-12-01 - '.dateConvert('1999-12-01');
?>