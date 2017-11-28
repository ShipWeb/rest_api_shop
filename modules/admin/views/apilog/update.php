<?php

use yii\helpers\Html;
use app\components\AdminMenu;

echo AdminMenu::widget();

/* @var $this yii\web\View */
/* @var $model app\models\Apilog */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Apilog',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apilogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="apilog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
