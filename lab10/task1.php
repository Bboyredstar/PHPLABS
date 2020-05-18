
  <?php
  $books = array();
  $book = null;          
  $currentTag= null;  
  $title = "";        
    
  function startElementHandler($parser,$name,$attribs)
  {
        global $currentTag,$book;
        switch ($name){
            case 'book':
                $book = array();
            default:
                $currentTag = $name;
            break;
        }
      
  }

  function charDataHandler($parser, $data) 
  { 
    global $currentTag,$book,$title;
        switch ($currentTag){
            case 'LIBRARY':
            case 'BOOK':
            case 'PAGES':
            break;
            case 'TITLE':
                $title .= $data;
                $book[$currentTag] = $title;
                 
            break;
            case 'RATING':
                switch($data){
                    case '1':
                        $book[$currentTag] = 'Ужасно';
                    break;
                    case '2':
                        $book[$currentTag] = 'Плохо';
                    break;
                    case '3':
                        $book[$currentTag] = 'Так себе';
                    break;
                    case '4':
                        $book[$currentTag] = 'Хорошо';
                    break;
                    case '5':
                        $book[$currentTag] = 'Прекрасно';
                    break;
                }
            break;
        default:
         if ($currentTag) {
            $book[$currentTag] = $data;
        }
        break;
    }
  }
  function endElementHandler($parser,$name)
  {
    global $currentTag,$book,$books,$title;
        switch ($name){
            case "BOOK":
                if ($book) {
                    $books[]= $book;
                }
                $title = " ";
                $book = null;
            break;
        }
   
    $currentTag = null;
  }



  

  $parser = xml_parser_create();

  xml_set_element_handler($parser,'startElementHandler','endElementHandler');
  xml_set_character_data_handler($parser,'charDataHandler');


$fp = fopen('./library.xml', 'r');
while ($data = fread($fp, 4096))
if (!xml_parse($parser, $data, feof($fp))){
    die(sprintf('Ошибка XML: %s в строке %d',
        xml_error_string(xml_get_error_code($parser)),
        xml_get_current_line_number($parser)));
}
else{
   xml_parse($parser, $data, feof($fp));
//    print_r($books);
xml_parser_free ($parser);  
$table = '
<table class="table_price">
<caption>Библиотека</caption>
  <tr>
    <th>Название</th>
    <th>Автор</th>
    <th>Цена</th>
    <th>Рейтинг читателей</th>
</tr>';
foreach ($books as $book){
    $table .=  
    '<tr>
        <td class="title">'.$book["TITLE"].'</td>
        <td>'.$book["AUTHOR"].'</td>
        <td class="price">'.$book["PRICE"].'</td>
        <td class="rating">'.$book["RATING"].'</td>
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
}
?>

