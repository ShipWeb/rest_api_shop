<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%currencies}}".
 *
 * @property string $currency_id
 * @property string $currency_title
 * @property string $currency_name
 * @property string $currency_course
 * @property string $currency_active
 * @property string $currency_main
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%currencies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_course'], 'number'],
            [['currency_active', 'currency_main'], 'string'],
            [['currency_title'], 'string', 'max' => 100],
            [['currency_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'currency_id' => Yii::t('app', 'Currency ID'),
            'currency_title' => Yii::t('app', 'Currency Title'),
            'currency_name' => Yii::t('app', 'Currency Name'),
            'currency_course' => Yii::t('app', 'Currency Course'),
            'currency_active' => Yii::t('app', 'Currency Active'),
            'currency_main' => Yii::t('app', 'Currency Main'),
        ];
    }
}
