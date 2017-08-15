<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Properties */

$this->title = Yii::t('app', 'Create Properties');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="properties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
