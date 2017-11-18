<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lock}}".
 *
 * @property string $id
 * @property string $ip
 * @property string $useragent
 * @property string $username
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
            [['useragent', 'username', 'user_pass'], 'required'],
            [['useragent'], 'string'],
            [['unblock_date'], 'safe'],
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
            'unblock_date' => Yii::t('app', 'Unblock Date'),
            'permanent' => Yii::t('app', 'Permanent'),
            'hits' => Yii::t('app', 'Hits'),
        ];
    }

	public function checkBanIp($ip) {

		$query = 'SELECT * FROM {{%lock}} WHERE ip = INET_ATON(:ip)';

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':ip', $ip);
		$lock = $command->queryOne();

		if ($lock && $lock['unblock_date'] > date('Y-m-d H:i:s')) {
			$lock = 'Ваш IP забанен на 15 минут.';
		} elseif ($lock && $lock['permanent'] === 1) {
			$lock = 'Ваш IP забанен, обратитесь за помощью к администратору сайта.';
		} else {
			$lock = false;
		}

		return $lock;
	}

}
