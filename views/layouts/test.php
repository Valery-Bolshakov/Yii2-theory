<!--Создаем дополнительный шаблон. Так как он будет опираться на контроллер Test то и шаблон-->
<!--назовем так же.-->
<?php


use yii\helpers\Html;

//AppAsset::register($this);  // метод register($this) класса AppAsset регистрирует комплект ресурсов.
// Комплект ресурсов задается в виде свойств класса и задается в классе AppAsset (assets/AppAsset)

$this->beginPage(); //Данные методы нужны чтобы скрипты и тэги, зарегистрированные в других местах
// приложения могли быть правильно отображены в местах вызова (например, в шаблоне).

\app\assets\TestAsset::register($this); // регистрируем комплект ресурсов
?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>"> <!--Сделали язык приложения динамично определяемым-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Данный метод необходим для корректной работы Ajax запросов, отправки форм и защиты от Csrf атак.
    Он генерирует специальный токен, который нужен для того что бы проверять что форма отправлена с данного сайта-->
    <?php $this->registerCsrfMetaTags() ?>

    <!--    Метод encode нужен для обеспечения защиты от каких-то там уязвимостей-->
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--Поскольку используем разметку bootstrap  то можно заключить контент в следующие контейнеры:-->
<div class="container">
    <div class="row">
<!--        Выводим информацию из данного виджета: Её можно выводить и в виде и в Шаблоне (views/layouts/test)-->
        <?//= \app\components\HelloWidget::widget() ?>
        <!--Поременная $content отвечает за подключение видов в шаблон. В ней находятся все данные вида.-->
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

