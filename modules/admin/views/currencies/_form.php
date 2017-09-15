<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Currencies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currencies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'currency_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'currency_main')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
