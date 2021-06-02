<?php


namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
//        Налаживаем свазь с таблицей categories
        return '{{categories}}';
    }

    /*Пишем метод который свяжет модель Category с таблицей products, что бы установить связь одной категории
    с Множеством продуктов из таблицы products посредством метода hasMany()*/
    public function getProducts($price = 1000)
    {
        /* Рассмотрим связь hasMany():

        В документации на сайте предлагают использвоать устаревший метод className. Что бы заменить его на новый
        Тыкаем на него с зажатым контрол и далее находим новый метод, который предложен в документации фреймфорка
        Связываем модель Category с моделью Product и устанавливаем зависимость поля category_id таблицы product
        от поля id таблицы categories
        Добавим сортировку по цене товара и получением данных от пользователя:
        Тестируем на вкладке http://yii2-theory/category/view?id=4
        */
        return $this->hasMany(Product::class, ['category_id' =>'id'])->where('price < :price',
            [':price' => $price])->orderBy('price DESC');
    }
}