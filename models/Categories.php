<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property string $category_id
 * @property string $name
 * @property string $number_products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number_products'], 'integer'],
			[['title'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
			'title' => Yii::t('app', 'Title'),
            'name' => Yii::t('app', 'Name'),
            'number_products' => Yii::t('app', 'Number Products'),
        ];
    }

	public static function getAll()
	{
		return Categories::find()->all();
	}
}
