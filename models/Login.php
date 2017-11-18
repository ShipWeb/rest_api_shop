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
            [['useragent', 'username', 'user_pass'], 'required'],
            [['useragent'], 'string'],
            [['login_date'], 'safe'],
            [['username'], 'string', 'max' => 60],
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
            'username' => Yii::t('app', 'User Name'),
            'user_pass' => Yii::t('app', 'User Pass'),
            'login_date' => Yii::t('app', 'Login Date'),
            'hits' => Yii::t('app', 'Hits'),
        ];
    }

	public function registerIP($ip, $username) {

		$query = 'SELECT * FROM {{%login}} WHERE ip = INET_ATON(:ip) AND username=:username';

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':ip', $ip);
		$login = $command->queryOne();




		return $ip;
	}

}
