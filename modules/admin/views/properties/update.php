<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Properties */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Properties',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->property_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="properties-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
