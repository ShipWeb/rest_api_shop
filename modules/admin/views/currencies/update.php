<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Currencies */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Currencies',
]) . $model->currency_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Currencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->currency_id, 'url' => ['view', 'id' => $model->currency_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="currencies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
