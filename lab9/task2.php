<?php
function checkEmail( $email) {
    //проверка на первое сопоставление
    // первая часть до @ шаблон подстроки включает символы и цифры A-Za-z0-9 и спец.знаки _ . -
    // условие 1 или более раз 
    //вторая часть после @ шаблон подстроки включает символы и цифры A-Za-z0-9 и спец.знаки _ . -
   //одна + доменная зона  включает от 2 симолов a-z может быть несколько подстрок разделенных .
    $result = preg_match("/^(\w|\d|_|\.|-){1,}@(\w|\d|_|\.|-){1,}\.([a-z]|.{2,}){1}$/", $email, $matches);
    if ($result) {
        echo $email. " is correct";
    }
    else {
        echo $email. " is not correct";    
    }
    return $result;
}
checkEmail("&sada.kklasd@mail.ru");
echo "\n";
checkEmail ("mbdoy213@gmail.com");
echo "\n";
checkEmail ("mbd.oy213@w.gmail.com.COM");
echo "\n";
checkEmail ("mbd-a.asd-oy213@w.gmail.ru");
?>