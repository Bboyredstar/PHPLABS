>
<?php
session_start();
if (isset($_POST['color'])){
    $_SESSION['color'] = $_POST['color'];
}
?>


<?php
if (isset($_SESSION['color'])) {
    $html =  "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style.css'>
    <title>Document</title>
    <style>
        body{
            background:" .$_SESSION['color'] ."
           
        }
    </style>
</head>
<body> <h1>1 page</h1>
<a href='2.php'>2 page</a>
<br>
<a href='index.php' class='settings'>Color settings</a></body>";
     echo $html;  
}
else{
    $redirect = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style.css'>
    <title>Document</title>
</head>
<body>
<h1 class='warning'>Cannot display this page check:</h1>
<br>
<a href='index.php' class='settings'>Color settings</a>
</body>
";
    echo $redirect;
}
?>
</body>
</html>
