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
 * @property int    $permanent
 * @property string $hits
 */
class Lock extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {

		return '{{%lock}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {

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
	public function attributeLabels() {

		return [
			'id'           => Yii::t('app', 'ID'),
			'ip'           => Yii::t('app', 'Ip'),
			'useragent'    => Yii::t('app', 'Useragent'),
			'username'     => Yii::t('app', 'User Name'),
			'user_pass'    => Yii::t('app', 'User Pass'),
			'unblock_date' => Yii::t('app', 'Unblock Date'),
			'permanent'    => Yii::t('app', 'Permanent'),
			'hits'         => Yii::t('app', 'Hits'),
		];
	}

	/**
	 * @param $ip
	 *
	 * @return array|bool|false|string
	 */
	public function checkBanIp($ip) {

		$lock = self::checkLock($ip);

		if ($lock && $lock['unblock_date'] > Yii::$app->db->createCommand('SELECT NOW()')->queryOne()) {
			$lock = 'Ваш IP забанен на 15 минут.';
		} elseif ($lock && $lock['permanent'] == 1) {
			$lock = 'Ваш IP забанен, обратитесь за помощью к администратору сайта.';
		} else {
			$lock = false;
		}

		return $lock;
	}

	/**
	 * @param $ip
	 *
	 * @return array|false
	 */
	public function checkLock($ip) {

		$query = 'SELECT * FROM {{%lock}} WHERE ip = INET_ATON(:ip) LIMIT 1';

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':ip', $ip);
		$lock = $command->queryOne();

		return $lock;
	}

	/**
	 * @param $ip
	 * @param $username
	 * @param $password
	 * @param $useragent
	 * @param $unblock_date
	 * @param $permanent
	 * @param $hits
	 *
	 * @return \yii\db\DataReader
	 */
	public function insertLock($ip, $username, $password, $useragent, $unblock_date, $permanent, $hits) {

		$query = "
INSERT INTO {{%lock}} 
(ip, username, user_pass, useragent, unblock_date, permanent, hits) 
VALUES 
(INET_ATON(:ip), :username, :user_pass, :useragent, NOW() + INTERVAL " . (int)$unblock_date . " MINUTE, :permanent, :hits) 
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':ip', $ip);
		$command->bindValue(':username', $username);
		$command->bindValue(':user_pass', $password);
		$command->bindValue(':useragent', $useragent);
		$command->bindValue(':permanent', (int)$permanent);
		$command->bindValue(':hits', (int)$hits);

		return $command->query();
	}

	/**
	 * @param $id
	 * @param $username
	 * @param $password
	 * @param $useragent
	 * @param $unblock_date
	 * @param $permanent
	 * @param $hits
	 *
	 * @return \yii\db\DataReader
	 */
	public function updateLock($id, $username, $password, $useragent, $unblock_date, $permanent, $hits) {

		$query = "
UPDATE {{%lock}}
SET username=:username, user_pass=:user_pass, useragent=:useragent, unblock_date=NOW() + INTERVAL " . (int)$unblock_date . " MINUTE, permanent=:permanent, hits=:hits 
WHERE id=:id
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':id', (int)$id);
		$command->bindValue(':username', $username);
		$command->bindValue(':user_pass', $password);
		$command->bindValue(':useragent', $useragent);
		$command->bindValue(':user_pass', $password);
		$command->bindValue(':permanent', (int)$permanent);
		$command->bindValue(':hits', (int)$hits);

		return $command->query();
	}

}
