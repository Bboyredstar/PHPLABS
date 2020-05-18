<?php 
    $xmlstr = '<library></library>';
    $xml = new SimpleXMLELement($xmlstr);
    $xml -> addChild('book');
    $xml -> addChild('author','Р.А.Уайк');
    $xml -> addChild('title','PHP. Справочник');
    $xml -> book-> addAttribute('price','300 руб.');
    if( $xml -> asXML('xmlOutput.xml')){
        echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>XML parser</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="container">
            <div class="wrapper">
                <h1>Файл создан</h1>
            </div>
        </div>
    </body>
    </html>';
    }
    else{
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>XML parser</title>
            <link rel="stylesheet" href="./style.css">
        </head>
        <body>
            <div class="container">
                <div class="wrapper">
                    <h1>При создании файла произошла ошибка</h1>
                </div>
            </div>
        </body>
        </html>';
    }
    ;

?>