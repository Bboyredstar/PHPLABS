<?php
//Открываем XML- файл -> преобразуем в simple xml объект 
    $doc = simplexml_load_file('library.xml');
//заводим буферную переменную для рейтинга
    $rtng = '';
    $table = '
    <table class="table_price">
    <caption>Библиотека</caption>
      <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Цена</th>
        <th>Рейтинг читателей</th>
    </tr>';
    //просматриваем поля объекта и парсим в таблицу
    foreach($doc->book as $book){
        switch($book->rating){
            case '1':
               $rtng = 'Ужасно';
            break;
            case '2':
                $rtng = 'Плохо';
            break;
            case '3':
                $rtng = 'Так себе';
            break;
            case '4':
                $rtng = 'Хорошо';
            break;
            case '5':
                $rtng = 'Прекрасно';
            break;
        }

        $table .=  
        '<tr>
            <td class="title">'.$book->title.'</td>
            <td>'.$book->author.'</td>
            <td class="price">'.$book->price.'</td>
            <td class="rating">'.$rtng.'</td>
        </tr>';
    }
    $table.='</table>';
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>XML parser</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="container">
            <div class="wrapper">'
                . $table.'
            </div>
        </div>
    </body>
    </html>';
    echo $html;
?>
