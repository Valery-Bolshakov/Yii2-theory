<?php


namespace app\controllers;


use app\models\Country;
use app\models\EntryForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

//use yii\web\View;

class TestController extends AppController
{
    /*
     Внутри контроллеров можно вызывать следующие методы рендеринга видов:
        render(): рендерит именованный вид (about) и применяет шаблон к результату рендеринга.
        renderPartial(): рендерит именованный вид без шаблона.
        renderAjax(): рендерит именованный вид без шаблона, и добавляет все зарегистрированные JS/CSS
        скрипты и стили. Обычно этот метод применяется для рендеринга результата AJAX запроса.
        renderFile(): рендерит вид, заданный как путь к файлу или алиас.
     */

//    http://yii2-theory/web/test/index - Теперь обращаясь по этому адресу в приложении - Фронт контроллер
//    подключает данный TestController - который подключает экшн с названием Index и выполняет код в этом экшене

//    Для того что бы переопределить шаблон только для одного контроллера - надо в нем задать свойство layout
//    public $layout = 'test'; // данным свойством назначаем контроллеру TestController шаблон views/layout/test


//    public $defaultAction = 'my-test'; // свойство для установки выполнения конкретного метода по умолчанию

    /* Данное свойство my_var принадлежит контроллеру. В вид мы его не рендерим, но можем получить его
     * значение в виде (например index) или В ШАБЛОНЕ (layouts/main) посредством обращения к свойству content:
     * <?= $this->context->my_var ?> */
//    public $my_var;

    public function actionIndex($alert = '', $name = 'User', $age = 25)
    {
//        Шаблон можно применить не ко всему контроллеру и всем его видам, а только к одному конкретному виду:
        $this->layout = 'test';
//         тайтл можно задавать в виде или в контроллере в экшене данного вида
        $this->view->title = 'Test Page';
//        Метатеги можно задавать как в контроллере, тaк и в виде.
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

//        $alert приходит Гет запросом (/test?alert=info) и в зависимости от значения выдаст соотв. флешку
        switch ($alert) {
            case 'error':
                \Yii::$app->session->setFlash('error', 'Error');
                break;
            case 'success':
                \Yii::$app->session->setFlash('success', 'OK');
                break;
            case 'info':
                \Yii::$app->session->setFlash('info', 'information');
                break;
            case 'warning':
                \Yii::$app->session->setFlash('warning', 'Warning');
                break;
            default:
                \Yii::$app->session->setFlash('danger', 'Danger');
        }


//        $this->my_var = 'My Variable';
//        var_dump($name, $age);
        /* web/test/ - если в маршруте после контроллера не указать действие, то по умолчанию фреймворк будет
        пробовать выполнить actionIndex
        return '<h2>Hello world!</h2>'; */

//        Виды можно рендерить в контроллерах следующими способами:
//        return $this->renderPartial('index');
//        return $this->renderAjax('index');
//        return $this->renderFile('@app/views/test/index.php');

//        \Yii::$app - это некий контейнер в приложении куда можно складывать различные данные, что бы
//        потом иметь к ним доступ из любого места ( например в виде или в фронтконтроллере)
//        В него можн озаписывать информацию ДВУМЯ вариантами
//        \Yii::$app->view->params['t1'] = 'T1 params'; // ПЕРВЫЙ ВАРИАНТ (более Глобальный)
//        $this->view->params['t1'] = 'T1 params'; // ВТОРОЙ ВАРИАНТ

//        События в видах. Компонент вида вызывает несколько событий во время рендеринга.
//        Данный код привязан к событию EVENT_END_BODY и отработает при
//        срабатывании $this->endBody() в TestController
//        \Yii::$app->view->on(View::EVENT_END_BODY, function () {
//            echo "<p>&copy; Yii2 " . date("Y") . "</p>"; //© Yii2 2021
//        });

//        Посмотреть что возвращает алиас (@web, @webroot и т.д.) можно следующим образом:
//        debug(\Yii::getAlias('@webroot'));  // C:/OpenServer/domains/Yii2-theory/web
//        debug(\Yii::getAlias('@web'));  // /web


//        Доступ к данными в виде получая их из контроллера:
//        return $this->render('index', [
//            'name' => $name,
//            'age' => $age,
//        ]); // Такая запись довольна длинная, можно поступить иначе:

//        Доступ к данными в виде получая их из контроллера:
//        Внимание! Переменные передаются в метод compact БЕЗ знака $
//        метод compact позволяет передавать данные на страницу вида и можно получить к ним доступ из других мест
//        return $this->render('index', compact('name', 'age'));


        /**
         * РАБОТА С ФОРМАМИ:
         */
        $model = new EntryForm();
//    Создали обьект модели, далее его надо передать в соотв вид (index) ->
//    в рендере передаем как еще один параметр compact('model') Далее в виде index выводим поля формы.

        /*Прием данных из формы
        Метод load мозволяет загрузить данные из модели. Метод validate позволяет провалидировать
        даныне согласно условиям валидации прописанные в модели EntryForm*/

        /** Pjax */
        /*if ($model->load(\Yii::$app->request->post()) && $model->validate()) {*/
//            debug($model); // посмотреть загруженные данные

        /*Виджет Pjax позволяет обновлять определённую область страницы вместо перезагрузки всей страницы .
        Вы можете использовать его для обновления формы после её отсылки .
        Проверим пришли ли данные Pjax запросом:*/
        /*if (\Yii::$app->request->isPjax) {  // если данные пришли Pjax то выведем флешку (if isPjax==true)
//            Используем метод setFlash для вывода нужного сообщения по указанному ключу success
            \Yii::$app->session->setFlash('success', 'Данные приняты через Pjax');

//                И далее для того что бы очистить фирму - созданим новуй пустой обьект формы
            $model = new EntryForm();
        } else {
            \Yii::$app->session->setFlash('success', 'Данные приняты стандартно');
            return $this->refresh(); // если данные пришли то метод refresh просто перезапросит страничку
        }*/

        /*\Yii::$app->session->setFlash('success', 'Данные приняты стандартно');
        return $this->refresh(); // если данные пришли то метод refresh просто перезапросит страничку
    }*/


        /** Ajax */

        /*$model->load(\Yii::$app->request->post());  // загружаем данные в модель,
        if (\Yii::$app->request->isAjax) {  // проверяем - если данные пришли аяксом то
            \Yii::$app->response->format = Response::FORMAT_JSON;  // то выставляем вормат ответа и
//            И будем возвращать ответ в зависимости от валидации
            if ($model->validate()) {
                return ['message' => 'OK'];  // если форма прошла валидацию то вернем сообщение ОК
            } else {
                return ActiveForm::validate($model);  // иначе возвращаем массив ошибок
            }

//            return ActiveForm::validate($model);  // и возвращаем массив ошибок или пустой массив(методом validate)
        }*/


        /** Виджеты */

        if($model->load(\Yii::$app->request->post())) {  // если получили жанные постом
            if ($model->validate()) {  // и если они прошли валидацию то
                \Yii::$app->session->setFlash('success', 'OK');
                return $this->refresh();  // перезапрашиваем страницу
            } else {
                \Yii::$app->session->setFlash('error', 'Error');
            }
        }

//            return ActiveForm::validate($model);  // и возвращаем массив ошибок или пустой массив(методом validate)


//        Обратить Внимание что обьект модели передается как строчный параметр 'model' т.е. без знака $ !!!!!
        return $this->render('index', compact('model'));

    }


    public function actionRead()  // Создали экшен для работы с БД
    {
//        Именование Моделей и Таблиц желательно в единственном числе

        $this->layout = 'test';  // Устанавливаем Шаблон, в который будет рендериться вид read
        $this->view->title = 'Работа с моделями';
//        $model = new Country();  // создаем новый экземпляр модели Country


        /** Операция Read  Получение данных */

        /*После объявления класса Active Record вы можете использовать его для получения данных из соответствующей
        таблицы базы данных. Этот процесс, как правило, состоит из следующих трёх шагов:

        1. Создать новый объект запроса вызовом метода yii\db\ActiveRecord::find();
        2. Настроить объект запроса вызовом методов построения запросов; (Опциональный пункт)
        3. Вызвать один из методов получения данных для извлечения данных в виде объектов Active Record.

        ! ! ! Не встраивайте переменные непосредственно в условие, особенно если значение переменной получено
        от пользователя, потому что это делает ваше приложение подверженным атакам через SQL инъекции.
        Лучше использовать привязку параметров 'status = :status', [':status' => $status]
        */


//        Строковый формат

//        $countries = Country::find()->all();  // Создать новый объект запроса -> получение ВСЕХ даннных с таблицы

//        SELECT * FROM `countries` WHERE population < 100000000 - запрос выглядит так
//        $countries = Country::find()->where("population < 100000000")->all();

//        SELECT * FROM `countries` WHERE population < 100000000 and code <> "AU" - исключили Австралию
//        $countries = Country::find()->where("population < 100000000 and code <> 'AU'")->all();

//        Пример использования привязки параметров:
//        $population = 100000000; // Данные получаются от пользователя
//        $code = 'AU';  // Данные получаются от пользователя
//        SELECT * FROM `countries` WHERE population < 100000000 and code <> 'AU';
        /*$countries = Country::find()->where("population < :population and code <> :code",
            [':code' => $code, ':population' => $population])->all();*/ // Безопасный запрос


//        Формат массива:

//        SELECT * FROM `countries` WHERE `code` IN ('DE', 'FR', 'GB') AND (`status`=1)
        /*$countries = Country::find()->where([
            'code' => ['DE', 'FR', 'GB'],
            'status' => 1,
        ])->all();*/


//        Формат операторов:
//        SELECT * FROM `countries` WHERE `name` LIKE '%ni%' - выдать все обьекты где в поле name имеется 'ni'
//        $countries = Country::find()->where(['like', 'name', 'ni'])->all();


//        Сортировка:
//        $countries = Country::find()->orderBy('population ASC')->all(); // сортировка по возрастанию
//        $countries = Country::find()->orderBy('population DESC')->all(); // сортировка по Убыванию

//        Считаем колличество:

//        $countries = Country::find()->count();  // вернет коллич записей
//        debug($countries, 1);  // что бы избежать ошибок, пишем это, так как записи перечилсяем циклом в виде read

//        $countries = Country::find()->limit(1)->one();  //Выбрать 1 первую запись из таблицы. В виде пришеб debug...
//         и закоментируем цикл

//         Выбрать указанную 'code' => 'CN' запись из таблицы.
//        $countries = Country::find()->limit(1)->where(['code' => 'CN'])->one();

//         аналог записи Country::find()->where(['code' => ['DE', 'FR', 'GB'],])->all();
//        $countries = Country::findAll(['DE', 'FR', 'GB']);

//        что бы отработал запрос надо закоментировать цикл в виде - так как запрос на 1 обьект
//        $countries = Country::findOne('BR'); // В аргементах обычно указывают код по первичному ключу

        /** Получение данных в виде массива */
        /*Несмотря на то, что получение данных в виде Active Record объектов является удобным и гибким, этот способ
        не всегда подходит при получении большого количества данных из-за больших накладных расходов памяти. В этом
        случае вы можете получить данные в виде PHP-массива, используя перед выполнением запроса метод asArray():*/

//        если ответ приходит в виде массива то обращаться не к свойствам $country->code а по ключам $country['code']
        $countries = Country::find()->asArray()->all(); // Ответ получаем в виде Массив[массивов]


        return $this->render('read', compact('countries'));  // вторым параметром передаем обьект модели
    }


    /** Операция Create  Сохранение данных */

    public function actionCreate()
    {
        $this->layout = 'test';  // Устанавливаем Шаблон, в который будет рендериться вид read
        $this->view->title = 'Операция Create';

        /*Используя Active Record, вы легко можете сохранить данные в базу данных, осуществив следующие шаги:
        1. Подготовьте объект Active Record;
        2. Присвойте новые значения атрибутам Active Record;
        3. Вызовите метод yii\db\ActiveRecord::save() для сохранения данных в базу данных.

        Например:
           вставить новую строку данных
        $customer = new Customer();
        $customer->name = 'James';
        $customer->email = 'james@example.com';
        $customer->save(); // Метод save() по умолчанию вызывает валидацию данных */

        $country = new Country();  // Обязательно создаем обьект модели

//        Данный метод Одноразовый и неудобный и без валидации. Обычно данные принимаются из формы и валидируется.
//        По этому Переходим в модель Country и создаем правила валидации:
        /*$country->code = 'IT';
        $country->name = 'Italia';
        $country->population = 60360000;
        $country->status = '1';
//        $country->save(); // Этот метод возвращает либо True либо  False, по этому его можно запихнуть в условие:

        if ($country->save()) {
            \Yii::$app->session->setFlash('success', 'OK');
        } else {
            \Yii::$app->session->setFlash('error', 'NO');
        }*/

//        Описываем Ajax валидацию для формы принятия данных
        if (\Yii::$app->request->isAjax) {  // если данные в запросе пришли аяксом
            $country->load(\Yii::$app->request->post());  // то загружаем эти данные в таблицу
            \Yii::$app->response->format = Response::FORMAT_JSON;  // в ответе вернем данные в формате JSON
            return ActiveForm::validate($country);  // Возвращаем отвалидированные данные
        }

//        Пишем обработчик данных приходящих из формы, что бы они сохранялись в таблицу
//        Если данные загружены в модель и данные провалидированы и сохранены успешно то:
        if ($country->load(\Yii::$app->request->post()) and $country->save()) {
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }

        return $this->render('create', compact('country'));
    }


    /** Операция Update */

    public function actionUpdate()
    {
        $this->layout = 'test';  // Устанавливаем Шаблон, в который будет рендериться вид
        $this->view->title = 'Операция Update';

        /*обновить имеющуюся строку данных
        $customer = Customer::findOne(123);
        $customer->email = 'james@newexample.com';
        $customer->save();*/

//        Поскольку нам надо обновлять обьект модели - мы не создаем новый(new Country()), а берем существующий:
        $country = Country::findOne('IT'); // получили обьект можели по клюючу IT
//        debug($country, 1);

        if (!$country) {  // если страны по заданному ключу (findOne('IT')) Не существует то:
            throw new NotFoundHttpException('Country not found'); // выводим сообщение об ошибке с текстом
        }

//        Если данные загружены в модель и данные провалидированы и сохранены успешно то:
        if ($country->load(\Yii::$app->request->post()) and $country->save()) {
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }

        return $this->render('update', compact('country'));
    }


    /** Операция Delete */
//    Данную операцию рассмотрим на примере использования Гет параметров

//    Гет параметром задаем код страны
    public function actionDelete($code = '')
    {
        /** Пример GET запроса .../delete?code=IT  - Адрес страницы может заканчиваться
        на 'delete' или 'delete.php',  затем идет GET запрос: '?' и далее параметры запроса: 'code=IT' */

        $this->layout = 'test';  // Устанавливаем Шаблон, в который будет рендериться вид
        $this->view->title = 'Операция Delete';

        /*обновить имеющуюся строку данных
        $customer = Customer::findOne(123);
        $customer->email = 'james@newexample.com';
        $customer->save();*/

//        Сперва надо найти обьект который надо удалить:
        $country = Country::findOne($code); // получили обьект можели по клюючу $code который передали Гет параметром

//        Если найден обьект по заданному ключу то (ключ передается Гет параметрами)...
        if ($country) {
//            ...то операция $country->delete() попробует удалить то что было найдено в $country. И если удаление
//            пройдет успешно то операция вернет true. В этом случае отработает первое условие и вылетит сообщение ОК
            if (false !== $country->delete()) {
                \Yii::$app->session->setFlash('success', 'OK');
            } else {
                \Yii::$app->session->setFlash('error', 'NO');
            }
        }

        return $this->render('delete', compact('country'));

    }



    public function actionMyTest()
    {
        /* http://yii2-theory/web/test/my-test Что бы данный экшн отработал надо обратиться к контроллеру test
        и далее выполнить запрос к действию my-test */

//        return __METHOD__;  // app\controllers\TestController::actionMyTest
        return $this->render('my-test');
    }


    //Отдельные действия: (нужны для расширения функционала контроллеров)
    public function actions()
    {
        return [
            /* объявляет "test" действие с помощью названия класса
             * И при обращению к контроллеру тест и действию тест (.../web/test/test) отработает экземпляр
             * класса HelloAction, который создали в дирректории 'components\HelloAction'
             */
            'test' => 'app\components\HelloAction',
        ];
    }

}
