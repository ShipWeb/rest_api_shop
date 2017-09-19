<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%settings}}".
 *
 * @property string $setting_id
 * @property string $name
 * @property string $value
 * @property string $active
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setting_name', 'setting_value'], 'required'],
            [['active'], 'string'],
            [['setting_name','setting_title'], 'string', 'max' => 255],
            [['setting_value'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setting_id' => Yii::t('app', 'Setting ID'),
            'setting_title' => Yii::t('app', 'Setting Title'),
            'setting_name' => Yii::t('app', 'Name'),
            'setting_value' => Yii::t('app', 'Value'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
