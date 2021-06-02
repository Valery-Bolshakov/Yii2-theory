<?php


namespace app\controllers\admin;


use yii\web\Controller;

class MyController extends Controller
{

    public function actionIndex()
    {
        // http://yii2-theory/web/admin/my/index - Здесь в адресе перед контроллером "My" добавляется
        // модуль "admin". Такие модули удобно создавать когна есть много контроллеров и их надо
        // как то сгруппировать
        return __METHOD__; // app\controllers\admin\MyController::actionIndex
    }

}