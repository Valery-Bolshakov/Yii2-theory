<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends AppController
{
    public function actionIndex()
    {
        $this->view->title = 'Products';
        /*Сократим число sql запросов, добавляем метод with который реализует "жадную загрузку". Добавляем
        параметр 'category', который обратится к методу getCategory()*/
        $products = Product::find()->with('category')->all();
        return $this->render('index', compact('products'));
    }

}