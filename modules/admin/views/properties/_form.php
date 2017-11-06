<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Properties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="properties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'property_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'INTEGER' => 'INTEGER', 'DECIMAL' => 'DECIMAL', 'FLOAT' => 'FLOAT', 'TEXT' => 'TEXT', 'DATE' => 'DATE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'filter')->dropDownList([ 'SELECT' => 'SELECT', 'MULTISELECT' => 'MULTISELECT', 'LIST' => 'LIST', 'RANGE' => 'RANGE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sort')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'show_index')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'show_view')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'technical_requirements')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
