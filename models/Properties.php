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
            [['type', 'filter', 'sort', 'active', 'show_index', 'show_view'], 'string'],
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
        ];
    }

	public static function getAll() {

		return Properties::find()->all();
	}
}
