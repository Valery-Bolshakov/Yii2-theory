<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <div class="col-md-12">
        <h2>Работа с моделями. Операция Delete</h2>
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

    </div>
<?php
