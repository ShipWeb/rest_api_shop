<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_api_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chpu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_activation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_thumbnail_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_thumbnail_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'date_create_gmt')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'date_modified_gmt')->textInput() ?>

	<h2>Свойства товара</h2>
	<?php foreach ($properties as $key=>$property) { ?>
		<div class="form-group field">
			<label class="control-label">
				<?= $property->property_title .
				($property->filter === "MULTISELECT" ? " - множественное значение" : " - одиночное значение") .
				"(" . ($property->type === "DATE" ? $property->type . " Дата формат 1999-12-31 00:00:00" :
					($property->type === "FLOAT" || $property->type === "DECIMAL" ? $property->type . " Дробное число формат 12.34" :
						($property->type === "INTEGER" ? $property->type . " Целое число формат 123" :
							($property->type === "TEXT" ? $property->type . " Текст формат А-я123" : $property->type)))) . ")" ?>
			</label>
			<input type="text" class="form-control" name="property[<?= $property->property_name ?>]"
				   value="<?= !empty($property_value_product[$property->property_name]) ? $property_value_product[$property->property_name] : "" ?>">
			<input type="hidden" name="property_type[<?= $property->property_name ?>]"
				   value="<?= !empty($properties_product_type[$property->property_name]) ? $properties_product_type[$property->property_name] : "" ?>">
			<input type="hidden" name="property_id[<?= $property->property_name ?>]"
				   value="<?= !empty($property->property_id) ? $property->property_id : "" ?>">
			<input type="hidden" name="property_filter[<?= $property->property_name ?>]"
				   value="<?= !empty($property->filter) ? $property->filter : "" ?>">

			<?php if($property->use_value_ext_html==="Y") { ?>

			<label class="control-label">Дополнительный HTML для свойства <?= $property->property_title; ?></label>
			<input type="text" class="form-control" name="property_ext_html[<?= $property->property_name ?>]"
				   value="<?= !empty($property_value_ext_html_product[$property->property_name]) ? $property_value_ext_html_product[$property->property_name] : "" ?>">

			<?php } ?>

			<div class="help-block"></div>
		</div>
	<?php } ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>