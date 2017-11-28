<?php

use yii\helpers\Html;
use app\components\AdminMenu;

echo AdminMenu::widget();

/* @var $this yii\web\View */
/* @var $model app\models\Apilog */

$this->title = Yii::t('app', 'Create Apilog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apilogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apilog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
