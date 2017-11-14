<?php

use yii\helpers\Html;
use app\components\AdminMenu;

echo AdminMenu::widget();

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Properties',
]) . $model->property_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->property_id, 'url' => ['view', 'id' => $model->property_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="properties-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
