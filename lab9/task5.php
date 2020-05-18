<?php
$str = "<html>
<head>
<title>Test</title>
</head>
<body> 
<B>12345</B>
<I>qwerty</i>
<pre>jljl</pre>
</body>
</html>";
//выделили новую подстроку от <body> до </body>
$newstr = substr($str,strpos($str,'<body>'),strpos($str,"</body>"));
    //заводим два выражения для открывающего и закрывающего тега и производим замену
  $res = preg_replace(["/<[^\/>]+>/", "/\<[^>]\+>/"],
  ["", "</br>"],
  $newstr);
echo $res;
?>