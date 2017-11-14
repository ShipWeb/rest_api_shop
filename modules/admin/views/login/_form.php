<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Login */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="login-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'useragent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_pass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login_date')->textInput() ?>

    <?= $form->field($model, 'hits')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
