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
class Login extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {

		return '{{%login}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {

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
	public function attributeLabels() {

		return [
			'id'         => Yii::t('app', 'ID'),
			'ip'         => Yii::t('app', 'Ip'),
			'useragent'  => Yii::t('app', 'Useragent'),
			'username'   => Yii::t('app', 'User Name'),
			'user_pass'  => Yii::t('app', 'User Pass'),
			'login_date' => Yii::t('app', 'Login Date'),
			'hits'       => Yii::t('app', 'Hits'),
		];
	}

	/**
	 * @param $ip
	 * @param $username
	 * @param $password
	 *
	 * @return mixed
	 */
	public function registerIP($ip, $username, $password) {

		$login = self::checkLogin($ip);

		if (empty($login)) {

			self::insertLogin($ip, $username, $password, Yii::$app->request->userAgent, 1);

		} elseif ($login['hits'] < 3) {

			self::updateLogin($login['id'], $username, $password, Yii::$app->request->userAgent, $login['hits'] + 1);

		} else {

			self::updateLogin($login['id'], $username, $password, Yii::$app->request->userAgent, 0);

			$lock = Lock::checkLock($ip);

			if (empty($lock)) {

				Lock::insertLock($ip, $username, $password, Yii::$app->request->userAgent, 15, 0, 1);

			} elseif ($lock['hits'] < 3 && $lock['permanent'] == 0) {

				Lock::updateLock($lock['id'], $username, $password, Yii::$app->request->userAgent, 15, 0, $lock['hits'] + 1);

			} else {

				Lock::updateLock($lock['id'], $username, $password, Yii::$app->request->userAgent, 15, 1, 0);

			}

		}

		return $ip;
	}

	/**
	 * @param $ip
	 *
	 * @return array|false
	 */
	public function checkLogin($ip) {

		$query = 'SELECT * FROM {{%login}} WHERE ip = INET_ATON(:ip) LIMIT 1';

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':ip', $ip);
		$login = $command->queryOne();

		return $login;
	}

	/**
	 * @param $ip
	 * @param $username
	 * @param $password
	 * @param $useragent
	 * @param $hits
	 *
	 * @return \yii\db\DataReader
	 */
	public function insertLogin($ip, $username, $password, $useragent, $hits) {

		$query = "
INSERT INTO {{%login}} 
(ip, username, user_pass, useragent, login_date, hits) 
VALUES 
(INET_ATON(:ip), :username, :user_pass, :useragent, NOW(), :hits) 
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':ip', $ip);
		$command->bindValue(':username', $username);
		$command->bindValue(':user_pass', $password);
		$command->bindValue(':useragent', $useragent);
		$command->bindValue(':hits', $hits);

		return $command->query();
	}

	/**
	 * @param $id
	 * @param $username
	 * @param $password
	 * @param $useragent
	 * @param $hits
	 *
	 * @return \yii\db\DataReader
	 */
	public function updateLogin($id, $username, $password, $useragent, $hits) {

		$query = "
UPDATE {{%login}}
SET username=:username, user_pass=:user_pass, useragent=:useragent, login_date=NOW(), hits=:hits
WHERE id=:id
		";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':id', (int)$id);
		$command->bindValue(':username', $username);
		$command->bindValue(':user_pass', $password);
		$command->bindValue(':useragent', $useragent);
		$command->bindValue(':hits', (int)$hits);

		return $command->query();
	}

}
