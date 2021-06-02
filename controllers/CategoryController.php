<?php


namespace app\controllers;


use app\models\Category;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{
    public function actionIndex()
    {
//        Даннай экшен будет отвечать за просмотр всех категорий
        $this->view->title = 'Categories';
//        Получим данные из модели посредством метода find():
        $categories = Category::find()->all();
//        Передаем полученые данные в вид
        return $this->render('index', compact('categories'));
    }

    /*выведем одну категорию с продуктами посредством Гет запроса категории:
    Добавим возможность задавать гет параметром не id, а alias из таблицы*/
    public function actionView(/*$id = null, */$alias = null) // Get request = .../category/view?id=1
    {
        $category = Category::findOne([/*$id, */'alias' => $alias]);
//        Если гет параметром передали несуществующий id то выскачет следующее исключение:
        if (!$category) {
            throw new NotFoundHttpException(
                'Если гет параметром передали несуществующий id то выскачет данное исключение :(');
        }
//        Добавим данную настройку что бы реализовать возможность задавать Гет параметр getProducts($price = 1000)
        $products = $category->getProducts(850)->all();
        $this->view->title = "Category: {$category->title}";
        return $this->render('view', compact('category', 'products'));
    }
}