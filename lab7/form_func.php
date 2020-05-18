<?php
    //объявляем перемнные, которые будут хранить данные 
    $firstName = ' ';
    $secondName = ' ';
    $middleName = ' ';
    $thanks = 'display:inline-block';
    //проверка на наличие данных 
    if (count($_POST) == 0){
        $firstLoad = true;
        $Form['build'] = build_form();
    }
    else{
        $firstLoad = false;
        $Form['show'] = build_result();
}
     function build_form()
    {
        $lang = array('Си','Паскаль','РНР');
    
        $prof = array('Программистом',
            'Системным администратором',
            'Постановщиком задач',
            'Руководителем группы'
        );

        $result = " <form class='wrapper__form' action='#' method='POST'>
                    <label class='wrapper__label' for='surname' >Фамилия:
                         <input class='wrapper__input' type='text' name='surname' id='surname' value='' required />
                    </label>
                    <label class='wrapper__label' for='name'>Имя:
                        <input class='wrapper__input' type='text' name='name' id='name'  value=''  required/>
                    </label>
                    <label class='wrapper__label' for='middlename'>Отчество:
                        <input class='wrapper__input' type='text'  name='middlename' id='middlename' value=''  required/>
                    </label>
                    <h3 class='wrapper__title'>Программирую на:</h3>
                    <div class='wrapper__language'>";
        foreach ($lang as $x) {
            $result .= "<span class='wrapper__text'>$x<input class='wrapper__radio' name='lang' type='radio' value='$x' required></span>";
        }
        $result .= "</div>";
    
        $result .= "<h3 class='wrapper__title'>Могу работать:</h3>
                    <select class='wrapper__selector' name='prof' multiple  required>";
        foreach ($prof as $sel) {
            $result .= "<option class='wrapper__option' >$sel</option>";
        }
        $result .= "</select>
                <input class='wrapper__button' type='submit' />
                </form>";
    
        return $result;
    }
    
    function build_result() {
        return "
        <div class='wrapper__cart'> 
            <h3 class='wrapper__title'>Фамилия: {$_POST['surname']}</h3>
            <h3 class='wrapper__title'>Имя: {$_POST['name']}</h3>
            <h3 class='wrapper__title'>Отчество: {$_POST['middlename']}</h3>
            <h3 class='wrapper__title'>Программирую на: {$_POST['lang']}</h3>
            <h3 class='wrapper__title'>Могу работать: {$_POST['prof']}</h3>
            <button class='wrapper__button' onclick='window.history.go(-1)'>Изменить</button>
            <button class='wrapper__button' onclick='document.getElementById(`show`).style.display=`none`;document.getElementById(`thanks`).style.display=`inline-block`;'>Сохранить</button>
        </div>
    ";
    }
 ?>
