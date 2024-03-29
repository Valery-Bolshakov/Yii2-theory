<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);  // метод register($this) класса AppAsset регистрирует комплект ресурсов
// комплект ресурсов задается в виде свойств класса и задается в классе AppAsset (assets/AppAsset)
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--<p>-->
<!--Добавляем проверку существования переменных, что бы не вылетали ошибки при запуске скрипта через sitecontroller-->
<!--    --><?php //if (isset($this->context->my_var)): ?>
<!--        --><?//= $this->context->my_var; //My Variable  ?>
<!--Почему то после введения AppContr и конструктора в нем - тут начала вылетать ошибка: -->
<!--    <p>--><?////= $this->params['t1'] //T1 params  ?><!--</p>-->
<!--И теперь можно вывести его в виде или в ШАБЛОНЕ main -->
<!--        <p>--><?////= $this->params['t2'] //T2 params  ?><!--</p>-->
<!--    --><?php //endif; ?>

<!-- И теперь можно вывести ИНФОРМАЦИЮ в виде или в ШАБЛОНЕ main -->
<!--    --><?php //if (isset($this->blocks['block1'])): ?>
<!--        --><?//= $this->blocks['block1'] ?>
<!--    --><?php //endif; ?>
<!--</p>-->

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
