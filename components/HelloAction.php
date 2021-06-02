<?php

namespace app\components;

use yii\base\Action;

class HelloAction extends Action
{
//    Клас для 'Отдельных Действий' должен наследовать yii\base\Action;
    public function run()
    {
        return 'Hello, world!';
    }

}