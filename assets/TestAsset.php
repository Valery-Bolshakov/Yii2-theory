<?php


namespace app\assets;


use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
//      Если комплект ресурсов находится не в web доступной дирректории (находятся не в app/web) необходимо
//    воспользоваться свойством sourcePath.
//    Файлы для подключения положили в папку app/components.

//      sourcePath: задаёт корневую директорию содержащую файлы ресурса в этом комплекте.
//    Это свойство должно быть установлено если корневая директория не доступна из Web.
//    public $sourcePath = '@app/components';  // задали путь к папке хранящей созданные файлы ресурсов

//    Если комплект ресурсов находится в web доступной дирректории (лежат в папке web) то прописывам
//    следующие свойства:
    public $basePath = '@webroot';
    public $baseUrl = '@web';

//    public $css = [
//        'css/styles.css', // указали путь к файлу которые надо подключать
//    ];

//    public $js = [
//        подключили библиотеку jquery(первый вариант подключения)
//        'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
//        'js/scripts.js', // указали путь к файлу которые надо подключать
//    ];
//    Далее для того что бы опубликовать данные свойства(сделать так что бы они подключились и отработали) надо
//    зарегистрировать данный комплект ресурсов. Длял этого переходим в шаблон test и регистрируем ресурсы

    public $depends = [
//        yii\web\JqueryAsset: Включает jquery.js файл из jQuery Bower пакета.
        'yii\web\YiiAsset', // подключает: <script src="/assets/214326db/jquery.js"></script>
//<script src="/assets/32ab3a67/yii.js"></script>

//        yii\bootstrap\BootstrapAsset: Включает CSS файл из Twitter Bootstrap фреймворка.
//        'yii\bootstrap\BootstrapAsset', // подключает href="/assets/54a40c81/css/bootstrap.css"

//        yii\bootstrap\BootstrapPluginAsset: Включает JavaScript файл из Twitter Bootstrap
//        фреймворка для поддержки Bootstrap JavaScript плагинов.
        'yii\bootstrap\BootstrapPluginAsset',  // подключает src="/assets/54a40c81/js/bootstrap.js"
    ];
    /**
     * Скрипты и стили можно подключать как глобально(выше) так и локально
     * (методами registerJsFile(), registerCssFile(),) пример в виде my-test
     */

}