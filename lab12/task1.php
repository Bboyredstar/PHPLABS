<?php

// родительский класс
class BaseClass {
    //конструктор основного класса
    protected $name;
    protected $prop = "property";
    protected $className = "BaseClass";
    public function __construct($name) {
        $this->name = $name;
        echo "<span class='warning'>Конструктор класса BaseClass вызван для: $name </span> </br>";
    }
    //функция преобразования свойств объекта к строке
    public function __toString() {
        return "<span class='info'>Объект класса BaseClass с именем: $this->name </span> </br>";
    }
    //деструктор класса
    public function __destruct() {
        print "<span class='warning'> Деструктор класса BaseClass вызван для: $this->name  </span> </br>";
    }
    //отлеживание попытки получения доступа к несуществующему свойству
    public function __get($name)
    {
        print "<span class='warning'> Нет свойства с именем $name   </span></br>";
    }
    //отлеживание попытки присваивания значения несуществующему свойству
    public function __set($name, $value)
    {
        print "<span class='warning'> Нельзя присвоить свойству $name значение $value  </span> </br>";
    }
  //отлеживание попытки вызова несуществующего метода класса
    public function __call($name, $arguments) {
        print " <span class='warning'> Нельзя вызвать метод $name с аргументами: ";
        foreach ($arguments as $argument) print $argument.' ';
        print "</span> </br>";
        return " <span class='warning'>Ошибка вызова метода $name </span> </br>";
    }
    //функция клонирования свойств 
    public function __clone() {
        $this->name = "x$this->name";
    }
    //МЕТОДЫ СЕРИАЛИЗАЦИИ 
    public function __sleep() {
        return array("prop", "name");
    }
    //восстановление значений свойств класса
    public function __wakeup() {
        $this->className = "BaseClass";
    }
}
class SubClass extends BaseClass {
    public function __construct($name) {
        parent::__construct($name);
        print "<span class='warning'>Конструктор класса SubClass вызван для: $name</span></br>";
    }

    public function __toString() {
        return "<span class='info'>Объект класса SubClass с именем: $this->name</span></br>";
    }
    public function __destruct() {
        parent::__destruct();
        print "<span class='warning'>Деструктор класса SubClass вызван для: $this->name</span></br>";
    }
}
$obj = new BaseClass('New main Class');
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class & Subclass</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&family=Jost&display=swap" rel="stylesheet">
</head>
<body>';
echo $obj;
$obj=null;
$obj = new SubClass('New Sub Class');
echo $obj;
$obj->prop = "new prop";
"---".$obj->prop."+++";
print $obj->missingMethod(1,2,3,4);
$obj2 = clone $obj;
print "<span class='info'> Cloned Object: ". $obj2."</span>";
$serialize = serialize($obj2);
$objSer = unserialize($serialize);
print "<span class='info'> Serialized Object: ". $objSer."</span>";
echo '    
</body>
</html>';