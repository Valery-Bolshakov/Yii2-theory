<?php


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
//        Налаживаем свазь с таблицей categories
        return '{{products}}';
    }

    public function getCategory()
    {
        /*Рассмотрим связь hasOne():

        Связываем модель Product с моделью Category и устанавливаем зависимость поля id таблицы categories
        от поля category_id таблицы product*/
        return $this->hasOne(Category::class, ['id' =>'category_id']);
    }
}