<?php

use yii\helpers\Html;
use app\components\AdminMenu;

echo AdminMenu::widget();

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Login',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Logins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
