<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
//    Данные 2 свойства необхоидмо задавать когда файлы комплекта ресурсов находится в app/web
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];

//    Свойство $depends это зависимости для стилей и скриптов
//    В данном случае свойство $depends говорит что класс AppAsset зависит от 2х
//    нижеперечисленных классов:
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
