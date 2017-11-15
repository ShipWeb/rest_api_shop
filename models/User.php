<?php

namespace app\models;

use Yii;
use \yii\web\IdentityInterface;
use \yii\db\ActiveRecord;

class User extends ActiveRecord implements IdentityInterface {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {

		return '{{%user}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {

		return [
			[['username'], 'string', 'max' => 60],
			[['user_pass'], 'string', 'max' => 255],
			[['user_salt'], 'string', 'max' => 250],
			[['auth_key'], 'string', 'max' => 250],
			[['username'], 'unique'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'id'         => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'User Name'),
			'user_pass'  => Yii::t('app', 'User Pass'),
			'user_salt'  => Yii::t('app', 'User Salt'),
			'auth_key'  => Yii::t('app', 'Auth Key'),
		];
	}


	public static function findIdentity($id) {

		return static::findOne($id);
	}


	public static function findIdentityByAccessToken($token, $type = null) {

		return static::findOne(['access_token' => $token]);
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 *
	 * @return static|null
	 */
	public static function findByUsername($username) {

		$user = User::find()->where(['username' => $username])->one();

		if (!empty($user)) {
			return $user;
		}

		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {

		return $this->id;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {

		return $this->auth_key;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {

		return $this->auth_key === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 *
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password, $user) {

		$password = $this->generateHash($password, $user->user_salt);
echo $password.'<br>';
echo $user->user_pass.'<br>';

		return $user->user_pass === $password;
	}

	public function beforeSave($insert) {

		if (parent::beforeSave($insert)) {

			$this->user_salt = $this->generateSalt();

			$this->user_pass = $this->generateHash($this->user_pass, $this->user_salt);

			if ($this->isNewRecord) {
				$this->auth_key = \Yii::$app->security->generateRandomString();
			}

			return true;
		} else {
			return false;
		}
	}

	public function generateSalt() {

		$salt = '&%hdus' . substr(md5(uniqid(rand(), true)), 0, 21);

		if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
			$salt = '$2y$24$' . substr(md5(uniqid(rand(), true)), 0, 26);
		}

		return $salt;
	}

	public function generateHash($password, $salt) {

		$secretKey = md5("Its_secret_key_476");

		return hash("sha512", substr($secretKey, 5, 18) . $password . substr($salt, 0, 12));
	}

}
