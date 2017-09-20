<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%properties}}".
 *
 * @property string $property_id
 * @property string $name
 * @property string $type
 * @property string $filter
 * @property string $sort
 * @property string $active
 * @property string $show_index
 * @property string $show_view
 */
class Properties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%properties}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'filter', 'sort', 'active', 'show_index', 'show_view','technical_requirements'], 'string'],
            [['property_name','property_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'property_id' => Yii::t('app', 'Property ID'),
            'property_title' => Yii::t('app', 'Property Title'),
            'property_name' => Yii::t('app', 'Property Name'),
            'type' => Yii::t('app', 'Type'),
            'filter' => Yii::t('app', 'Filter'),
            'sort' => Yii::t('app', 'Sort'),
            'active' => Yii::t('app', 'Active'),
            'show_index' => Yii::t('app', 'Show Index'),
            'show_view' => Yii::t('app', 'Show View'),
            'technical_requirements' => Yii::t('app', 'Technical Requirements'),
        ];
    }

	public static function getAll() {

		return Properties::find()->all();
	}

	public function getAllFilters() {

		$query = "
SELECT * FROM {{%properties}} prop 
	LEFT JOIN {{%products_properties}} prod_prop ON prod_prop.property_id=prop.property_id
WHERE active='Y' AND show_index='Y'";

		$filter_properties = Yii::$app->db->createCommand($query)->queryAll();

		return $filter_properties;

	}

	/**
	 * Получение массива типов значений
	 *
	 * @return array
	 */
	public function getArrValueType() {

		return [
			"INTEGER" => "value_int",
			"DECIMAL" => "value_dec",
			"FLOAT"   => "value_flt",
			"TEXT"    => "value_str",
			"DATE"    => "value_date",
		];

	}

	/**
	 * Установка столбца с типом значений
	 *
	 * @return array
	 */
	public function setValueType($array, $type) {

		$val = "";
		foreach ($array as $key => $value) {
			if ($key === $type) {
				$val = $value;
				break;
			}
		}

		return $val;

	}

	public function getTechnicalProperties($id) {

		$query = "
SELECT * FROM {{%properties}} prop 
	LEFT JOIN {{%products_properties}} prod_prop ON prod_prop.property_id=prop.property_id
WHERE active='Y' AND show_view='Y' and technical_requirements='Y' AND prod_prop.product_id=:product_id";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':product_id',(int)$id);
		$properties = $command->queryAll();

		$properties_result =self::unionLikeProperties($properties);

		return $properties_result;

	}

	public function getNotTechnicalProperties($id) {

		$query = "
SELECT * FROM {{%properties}} prop 
	LEFT JOIN {{%products_properties}} prod_prop ON prod_prop.property_id=prop.property_id
WHERE active='Y' AND show_view='Y' and technical_requirements='N' AND prod_prop.product_id=:product_id";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':product_id',(int)$id);
		$properties = $command->queryAll();

		$properties_result =self::unionLikeProperties($properties);

		return $properties_result;

	}

	public function unionLikeProperties($properties) {

		$properties_result = [];

		foreach ($properties as $key => $value) {

			if (empty($properties_result[$value['property_id']])) {
				$properties_result[$value['property_id']] = [];
			}

			$properties_result[$value['property_id']] = array_merge_recursive($properties_result[$value['property_id']], $value);

			foreach ($properties_result[$value['property_id']] as $k => $v) {

				if (gettype($v) === 'array') {
					$properties_result[$value['property_id']][$k] = array_unique($v);
				}

			}

			$arr_type = self::getArrValueType();

			$properties_result[$value['property_id']]['value'] = self::setValueType($arr_type, $value['type']);

		}

		foreach ($properties_result as $key=>$value){
			if (gettype($value['property_id']) !== 'array') {
				foreach ($value as $ke => $va) {
					if ($ke!=='value') {
						$properties_result[$key][$ke] = ['0' => $va];
					}
				}
			}

			foreach ($properties_result[$key]['value_ext_html'] as $k=>$v){
				if (!empty($v)){
					$properties_result[$key][$value['value']][$k]=$v.$properties_result[$key][$value['value']][$k];
				}
			}

			if ($value['value'] = 'value_date') {
				foreach ($properties_result[$key]['value_date'] as $k => $v) {

					$properties_result[$key]['value_date'][$k] = rdate(date('j F Y',strtotime($properties_result[$key]['value_date'][$k])));

				}
			}

		}


		return $properties_result;

	}

}