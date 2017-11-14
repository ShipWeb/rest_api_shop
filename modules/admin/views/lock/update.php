<?php

use yii\helpers\Html;
use app\components\AdminMenu;

echo AdminMenu::widget();

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Lock',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
