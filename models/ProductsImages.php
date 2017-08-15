<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%products_images}}".
 *
 * @property string $product_id
 * @property string $image_id
 */
class ProductsImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'image_id'], 'required'],
            [['product_id', 'image_id'], 'integer'],
            [['product_id', 'image_id'], 'unique', 'targetAttribute' => ['product_id', 'image_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'image_id' => Yii::t('app', 'Image ID'),
        ];
    }
}
