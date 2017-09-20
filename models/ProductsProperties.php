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
}
