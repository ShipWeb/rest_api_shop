<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%products_properties}}".
 *
 * @property string $product_id
 * @property string $property_id
 * @property string $value
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
            [['product_id', 'property_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
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
            'value' => Yii::t('app', 'Value'),
        ];
    }
}
