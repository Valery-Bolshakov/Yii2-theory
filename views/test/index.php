<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

    <div class="col-md-12">
        <h2>Страница с формой</h2>

        <?php
        /*Виджет Pjax позволяет обновлять определённую область страницы вместо перезагрузки всей страницы.
        Вы можете использовать его для обновления формы после её отсылки.*/
        Pjax::begin([
            // Опции Pjax
        ]);

        /** Виджеты: */ ?>

<!--        Выводим информацию из данного виджета: Её можно выводить и в виде и в Шаблоне (views/layouts/test)-->
        <?//= \app\components\HelloWidget::widget(['name' => 'Name']) ?>

        <?php \app\components\HelloWidget::begin(['name' => 'Name']) ?>
        <h3>Далее можно отобразить какой-нибдуь Контент Виджета</h3>
        <?php \app\components\HelloWidget::end() ?>

        <!--        Закомментирум флешки и вместо этого воспользуемся виджетом Alert и его методом widget()-->
        <?= \app\widgets\Alert::widget() ?>
<!--        Данный виджет позволил нам избежать многострок кода флэщ-сообщений-->

        <!--выводим флэшСообщение если нужно. Их можно выводить либо в шаблоне либо в виде-->
        <!--Если что то имеется по ключу success то выводим флешСообщение-->
        <?php /*if (Yii::$app->session->hasFlash('success')): */?><!--
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <?php /*echo Yii::$app->session->getFlash('success'); */?>
            </div>
        <?php /*endif; */?>
        <?php /*if (Yii::$app->session->hasFlash('error')): */?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <?php /*echo Yii::$app->session->getFlash('error'); */?>
            </div>
        --><?php /*endif; */?>


        <?php //debug($model); // модель можно распечать ?>
        <!--Для старта формы обращаемся к классу ActiveForm и его методу begin()-->
        <!--В метод begin() можно передать массив опций для формы, например:-->
        <?php $form = ActiveForm::begin([
            'id' => 'my-form',
//             Включаем либо выключаем Ajax валидацию для всей формы:
//            'enableAjaxValidation' => false,
            'enableClientValidation' => false, // Свойство включить/отключить(true/false) клиенскую валидацию
            'options' => [  // в свойстве options можно передать массив доп настроек, например:
                'class' => 'form-horizontal',  // свойство bootstrap разметки
                'data-pjax' => false, // либо 'data' => ['pjax' => true] если много data атрибутов
            ],
            /*Для того что бы не задавать разметку в свойстве template Для Каждого поля - можно использовать
            свойство fieldConfig в методе begin() и задать массив настроек сразу для всех полей.
            Но если дополнительно еще указать template для отдельного поля - то тот массив настроек будет главным*/
            'fieldConfig' => [
                'template' => "{label} \n <div class='col-md-5'> {input} </div> \n 
                                          <div class='col-md-5'> {hint} </div> \n 
                                          <div class='col-md-5'> {error} </div>",
//                Для того что бы не заворачивать label в класс - применим свойство labelOptions
                'labelOptions' => ['class' => 'col-md-2 control-label'],
            ]
        ]) ?>
        <!--С помощью метода field() передаем обьект модели $model в вид и вторым параметром вводим название полей:
        По умолчанию метод field() следом используем метод fileInput() который выводит простой текстовый инпут,
        но можно изменить его на нужный нам метод, например ->passwordInput() или ->dropDownList() и т.д

        Свойство public $template = "{label}\n{input}\n{hint}\n{error}" - Шаблон, который
        используется для размещения метки, поля ввода, сообщения об ошибке и текста подсказки.-->
        <?= $form->field($model, 'name'/*, [
        // из-за переноса строки \n используем двойные ковычки ""
        'template' => "{label} \n <div class='col-md-5'> {input} </div> \n
                                  <div class='col-md-5'> {hint} </div> \n
                                  <div class='col-md-5'> {error} </div>",
        //Для того что бы не заворачивать label в класс - применим свойство labelOptions
        'labelOptions' => ['class' => 'col-md-2 control-label'],
    ]*/)/*->hint('Метод hint выдает доп подсказку при еобходимости')*/
        ->textInput(['placeholder' => 'Так Можно задать массив настроек для метода field'])
        /*->label('Имечко:')Методом label() меняем его название со стандартного 'Name' на заданный 'Имя:'
        Однако есть более удобный метод - в моделе формы используем метод attributeLabels() */ ?>


        <?= $form->field($model, 'email'/*, [
        'template' => "{label} \n <div class='col-md-5'> {input} </div> \n
                                  <div class='col-md-5'> {hint} </div> \n
                                  <div class='col-md-5'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
    ]*/)->input('email', ['placeholder' => 'Email']) ?>


        <?= $form->field($model, 'topic', ['enableAjaxValidation' => false])
            ->input('topic', ['placeholder' => 'Выключили AjaxValidation отдельно для этого поля']) ?>


        <?= $form->field($model, 'text'/*, [
        'template' => "{label} \n <div class='col-md-5'> {input} </div> \n
                                  <div class='col-md-5'> {hint} </div> \n
                                  <div class='col-md-5'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
    ]*/)->textarea(['rows' => 5, 'placeholder' => 'Свойство placeholder тоже можно использовать для подсказок']) ?>


        <!--    Для задания кнопки либо просто пишем её html кодом либо воспользуемся методом submitButton helpers\Html-->
        <div class="form-group">
            <div class="col-md-5 col-md-offset-2"> <!--Меняем позиционирование кнопки:-->
                <!--Сделали кнопку по размеру блока формы: btn-block-->
                <?= Html::submitButton('Отправить', ['class' => 'btn-btn-default btn-block']) ?>
            </div>
        </div>

        <!--В конце формы обращаемся к методу end() для закрытия формы-->
        <?php
        ActiveForm::end();
        Pjax::end();
        ?>
    </div>

<?php

/*Опишем Ajax отправку данных:(это можно сделать в файле scripts и подключить в ресурсах)

создадим переменную form и запишем в нее id нашей формы что бы можно было обращаться к ней*/
$js = <<<JS
var form = $('#my_form');
/*привязываемся к событию beforeSubmit, по которому выполняем функцию
beforeSubmit событие запускается перед отправкой формы после того, как все проверки пройдены.*/
form.on('beforeSubmit', function(){
    /*при помощи jquery - метода serialize берем данные из формы и...*/
    var data = form.serialize();
    /* и далее выполняем ajax запрос*/
    $.ajax({
    /*url на который будут отправлены данные берем из атрибута формы action*/
    uri: form.attr('action'),
    type: 'POST',
    /*данные берем тоже из формы*/
    data: data,
    /*и далее если если все пришло норм то очищаем форму, иначе выводим сооьшение об ошибке*/
    success: function(res) {
        console.log(res);
        form[0].reset();
    },
    error: function() {
        alert('Error!');      
    }
    });
    /* return false нужен для отмены дефолтного события(оправки формы)*/
    return false;
});
JS;

// регистрируем данный скрипт
//$this->registerJs($js);
//Далее Эти данные отправляются на сервер (в TestController) и надо их там как то обработать

?>

    <!--
        Воспользуемся методом рендер для подключения вида в другом виде

        Это удобно делать когда надо подключить какой то блок кода (например сайтбар
    или данные с БД) который находится в отдельном файле(виде). В этом случае
    шаблон подключаемого вида не будет применяться, выведется только информация
     -->
<? //= $this->render('inc') // C:\OpenServer\domains\Yii2-theory\views\test\inc.php ?>

    <!--
        Доступ к данным из видов
    Данные можно передавать в вид явно или подгружать их динамически, обращаясь
    к контексту из вида.
    Можно получать данные из контроллера:
    В контроллере TestController в actionIndex передаем параметры ($name = 'User', $age = 25)
    Затем в методе render вторым параметром обращаемся к методу compact и передаем ему эти значения
     compact('name', 'age'). И далее в виде можно получить эти данные следубщим образом:
    -->
    <!--<p>--><? //= $name // User ?><!--</p>-->
    <!--<p>--><? //= $age // 25 ?><!--</p>-->

<?php
/* Подключать виды можно из любой дирректории, если правильно указать путь:
*/
//echo $this->render('//test/inc/test.html');
//Данный путь преобразуется в "@app/views/test/inc/test.html" И выведется инфа из файла "test.html"

/*
 *     Еще про получение данных из контроллера:
 * Создали в контроллере свойство public $my_var;
 * Затем назначили ему значение $this->my_var = 'My Variable';
 * И далее обратиться к свойству context и свойству my_var для получения его значения
 */
//echo $this->context->my_var; //My Variable
/*
 * Данное свойство my_var принадлежит контроллеру. В вид мы его не рендерим, но можем получить его
 * значение в виде (тут) или В ШАБЛОНЕ (layouts/main) посредством обращения к свойству content:
 * <?= $this->context->my_var ?>
 */
?>

    <!-- получили значение t1 которое ввели в тест контроллере и положили в контейнер yii/app -->
    <!--<p>--><? //= $this->params['t1'] //T1 params ?><!--</p>-->

<?php // debug($this->params) // [t1] => T1 params ?>

    <!-- Запишем еще одно свойство в массив params по ключу t1 -->
<?php //$this->params['t2'] = 'T2 params'; ?>
    <!-- И теперь можно вывести его в виде или в ШАБЛОНЕ main -->
    <!--<p>--><? //= $this->params['t2'] //T2 params ?><!--</p>-->

    <!-- ЕЩЕ ОДИН ВАРИАНТ ПЕРЕДАЧИ ДАННЫХ В ШАБЛОН
    Данная конструкция тоже позволяет записать информацию в какой то контейнер и затем получать доступ к ней
     в виде или в шаблоне -->
<?php //$this->beginBlock('block1'); ?>
    <!--<p>--><? //= $this->params['t2'] ?><!--</p>-->
    <!--<p>...содержимое блока 1...</p>-->
<?php //$this->endBlock(); ?>

    <!-- И теперь можно вывести ИНФОРМАЦИЮ в виде или в ШАБЛОНЕ main -->
<?php //if (isset($this->blocks['block1'])): ?>
    <!--    --><? //= $this->blocks['block1'] ?>
<?php //endif; ?>