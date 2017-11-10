<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%products_properties}}".
 *
 * @property string $product_id
 * @property string $property_id
 * @property string $value_str
 * @property string $value_int
 * @property string $value_dec
 * @property double $value_flt
 * @property string $value_date
 */
class ProductsProperties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products_properties}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'property_id'], 'required'],
            [['product_id', 'property_id', 'value_int'], 'integer'],
            [['value_dec', 'value_flt'], 'number'],
            [['value_date'], 'safe'],
            [['value_str','value_ext_html'], 'string', 'max' => 255],
            [['product_id', 'property_id'], 'unique', 'targetAttribute' => ['product_id', 'property_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'property_id' => Yii::t('app', 'Property ID'),
            'value_str' => Yii::t('app', 'Value Str'),
            'value_ext_html' => Yii::t('app', 'Value Extented HTML'),
            'value_int' => Yii::t('app', 'Value Int'),
            'value_dec' => Yii::t('app', 'Value Dec'),
            'value_flt' => Yii::t('app', 'Value Flt'),
            'value_date' => Yii::t('app', 'Value Date'),
        ];
    }

	public function getPropertiesProductType($properties) {

		$products_properties_type = [];

		foreach ($properties as $key => $property) {

			$arr_type = Properties::getArrValueType();
			$type = Properties::setValueType($arr_type, $property->type);

			$products_properties_type[$property->property_name] = $type;
		}

		return $products_properties_type;
	}

	public function getPropertyValueProduct($id, $properties, $products_properties_type) {

		$property_value_product = [];

		foreach ($properties as $key => $property) {

			$query = "
SELECT " . $products_properties_type[$property->property_name] . ", value_ext_html
FROM {{%products_properties}} 
WHERE product_id=:product_id AND property_id=:property_id";

			$command = Yii::$app->db->createCommand($query);
			$command->bindValue(':product_id', $id);
			$command->bindValue(':property_id', $property->property_id);
			$result = $command->queryColumn();

			$property_value_product[$property->property_name] = implode(",", $result);

		}

		return $property_value_product;
	}

	public function getPropertyValueExtHtmlProduct($id, $properties) {

		$property_value_ext_html_product = [];

		foreach ($properties as $key => $property) {

			$query = "
SELECT value_ext_html
FROM {{%products_properties}} 
WHERE product_id=:product_id AND property_id=:property_id";

			$command = Yii::$app->db->createCommand($query);
			$command->bindValue(':product_id', $id);
			$command->bindValue(':property_id', $property->property_id);
			$result = $command->queryColumn();

			$property_value_ext_html_product[$property->property_name] = implode(",", $result);

		}

		return $property_value_ext_html_product;
	}

	public function deleteProductProperty($product_id, $property_id) {

		$query = "
DELETE FROM {{%products_properties}} 
WHERE product_id=:product_id AND property_id=:property_id
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':product_id', $product_id);
		$command->bindValue(':property_id', $property_id);

		return $command->query();
	}

	public function insertProductProperty($product_id, $property_id, $type, $value, $value_ext_html = false) {

		if (!in_array($type, Properties::getArrValueType())) {
			return false;
		}

		$query = "
INSERT INTO {{%products_properties}} 
(product_id, property_id, " . $type . ", value_ext_html) 
VALUES 
(:product_id, :property_id, :value, :value_ext_html) 
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':product_id', $product_id);
		$command->bindValue(':property_id', $property_id);
		$command->bindValue(':value', $value);
		$command->bindValue(':value_ext_html', !empty($value_ext_html) ? $value_ext_html : '');

		return $command->query();
	}

}
