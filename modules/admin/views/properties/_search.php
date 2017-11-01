<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PropertiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="properties-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'property_title') ?>

    <?= $form->field($model, 'property_name') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'filter') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'show_index') ?>

    <?php // echo $form->field($model, 'show_view') ?>

    <?php // echo $form->field($model, 'technical_requirements') ?>

    <?php // echo $form->field($model, 'count_values') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
