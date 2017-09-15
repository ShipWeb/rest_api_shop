<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CurrenciesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currencies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'currency_id') ?>

    <?= $form->field($model, 'currency_title') ?>

    <?= $form->field($model, 'currency_name') ?>

    <?= $form->field($model, 'currency_course') ?>

    <?= $form->field($model, 'currency_active') ?>

    <?php // echo $form->field($model, 'currency_main') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
