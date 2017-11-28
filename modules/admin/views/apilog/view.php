<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\AdminMenu;

echo AdminMenu::widget();

/* @var $this yii\web\View */
/* @var $model app\models\Apilog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apilogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apilog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'request',
            'response',
            'url:url',
            'type',
            'date',
        ],
    ]) ?>

</div>
