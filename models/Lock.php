<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lock}}".
 *
 * @property string $id
 * @property string $ip
 * @property string $useragent
 * @property string $user_login
 * @property string $user_pass
 * @property string $unblock_date
 * @property int $permanent
 * @property string $hits
 */
class Lock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lock}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'permanent', 'hits'], 'integer'],
            [['useragent', 'user_login', 'user_pass'], 'required'],
            [['useragent'], 'string'],
            [['unblock_date'], 'safe'],
            [['user_login'], 'string', 'max' => 60],
            [['user_pass'], 'string', 'max' => 255],
            [['ip'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ip' => Yii::t('app', 'Ip'),
            'useragent' => Yii::t('app', 'Useragent'),
            'user_login' => Yii::t('app', 'User Login'),
            'user_pass' => Yii::t('app', 'User Pass'),
            'unblock_date' => Yii::t('app', 'Unblock Date'),
            'permanent' => Yii::t('app', 'Permanent'),
            'hits' => Yii::t('app', 'Hits'),
        ];
    }
}
