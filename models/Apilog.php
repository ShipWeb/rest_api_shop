<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%apilog}}".
 *
 * @property string $id
 * @property string $request
 * @property string $response
 * @property string $url
 * @property string $type
 * @property string $date
 */
class Apilog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%apilog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string'],
            [['date'], 'safe'],
            [['request', 'response', 'url'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'request' => Yii::t('app', 'Request'),
            'response' => Yii::t('app', 'Response'),
            'url' => Yii::t('app', 'Url'),
            'type' => Yii::t('app', 'Type'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
