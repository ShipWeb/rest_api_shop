<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LockSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ip') ?>

    <?= $form->field($model, 'useragent') ?>

    <?= $form->field($model, 'user_login') ?>

    <?= $form->field($model, 'user_pass') ?>

    <?php // echo $form->field($model, 'unblock_date') ?>

    <?php // echo $form->field($model, 'permanent') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
