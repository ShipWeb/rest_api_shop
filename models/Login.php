<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%login}}".
 *
 * @property string $id
 * @property string $ip
 * @property string $useragent
 * @property string $user_login
 * @property string $user_pass
 * @property string $login_date
 * @property string $hits
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%login}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'hits'], 'integer'],
            [['useragent', 'user_login', 'user_pass'], 'required'],
            [['useragent'], 'string'],
            [['login_date'], 'safe'],
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
            'login_date' => Yii::t('app', 'Login Date'),
            'hits' => Yii::t('app', 'Hits'),
        ];
    }
}
