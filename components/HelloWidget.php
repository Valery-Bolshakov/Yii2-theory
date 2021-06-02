<?php


namespace app\components;


use yii\base\Widget;

class HelloWidget extends Widget
{
//Создали новый клас HelloWidget, и далее в файле index выводим его (HelloWidget::widget()):

    public $name;

    public function init()
    {
//        сперва оставляем вызов результата родительского метода init
        parent::init(); // TODO: Change the autogenerated stub
//        и далее реализуем свою логику:
        if ($this->name === null) {
            $this->name = 'Гость';
        }
//        включаем буферизацию:
        ob_start();
    }

//    метод run запускает выполнение данного виджета
    public function run()
    {
        /*Вернем содерижимое буфера и очистим его, запишем в переменную данные буфера:
        Таким образом в переменной $inform будет лежать весь контент виджета - то что между begin() и end()*/
        $inform = ob_get_clean();
//        Далее с переменной можно производить любые операции, например:
        $inform = strip_tags($inform);  // обрезали теги

//        Если вызвать виджет без настроек то выдаст значение по умолчанию: 'Привет, Гость!'
//        Если в виде index передать настройки виджету в виде массива то значение изменится: 'Привет, Nick!'
//        return "Привет, {$this->name}! {$inform}";  // Привет, Nick! Контент Виджета

        /*В виджетах, как и в контроллерах, можно подключать представления (рендерить виды)
        Виды желательно складывать в дирректорию components/views и называть по имени виджета*/
        return $this->render('hello', [
            'name' => $this->name,
            'inform' => $inform
        ]);
    }
}