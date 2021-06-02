<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <div class="col-md-12">
        <h2>Работа с моделями. Операция Update</h2>
        <?php
        if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif; ?>

        <?php $form = ActiveForm::begin([
            'id' => 'my-form',
//            'enableAjaxValidation' => true,
            'options' => [
                'class' => 'form-horizontal',  // свойство bootstrap разметки
            ],
            'fieldConfig' => [
                'template' => "{label} \n <div class='col-md-5'> {input} </div> \n 
                                          <div class='col-md-5'> {hint} </div> \n 
                                          <div class='col-md-5'> {error} </div>",
                'labelOptions' => ['class' => 'col-md-2 control-label'],
            ]
        ]) ?>

        <?= $form->field($country, 'name') ?>
        <?= $form->field($country, 'population') ?>
        <!--    Для чекбокса разметку надо указывать отдельно:-->
        <?= $form->field($country, 'status')->checkbox([
            'template' => "{label} \n <div class='col-md-5'> {input} </div> \n 
                                          <div class='col-md-5'> {hint} </div> \n 
                                          <div class='col-md-5'> {error} </div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ], false) ?>

        <div class="form-group">
            <div class="col-md-5 col-md-offset-2"> <!--Меняем позиционирование кнопки:-->
                <!--Сделали кнопку по размеру блока формы: btn-block-->
                <?= Html::submitButton('Отправить', ['class' => 'btn-btn-default btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end() ?>
    </div>
<?php
