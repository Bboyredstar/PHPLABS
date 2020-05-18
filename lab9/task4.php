<?php
    function urlConvert($url){
        preg_match_all("/^http:\/\/(www\.(\w|\d|.|-){1,}\.\w{2,})(\/|\?|#)/",$url,$matches);      
        $main = $matches[1][0];
        $newUrl = '<a href="'.$url.'" target=_blank>'.$main."</a>" ;
        return $newUrl;
    }
    
    echo  urlConvert("http://www.sfedu.ru/root/index.php");
    echo "<br>http://www.sfedu.ru/root/index.php<br>";
    echo  urlConvert("http://www.m.vk.com/root/index.php");
    echo "<br> http://www.m.vk.com/root/index.php<br>";
    echo  urlConvert("http://www.sfedu.ru?x=1&y=1");
    echo "<br> http://www.sfedu.ru?x=1&y=1 <br>";
    echo  urlConvert( "http://www.sfedu.ru#top");
    echo "<br> http://www.sfedu.ru#top";
   
?>