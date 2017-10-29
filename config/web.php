<?php
require_once('../common/functions.php');
$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

use \yii\web\Request;
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	'modules' => [
		'admin' => [
			'class' => 'app\modules\admin\Module',
		],
	],
    'components' => [
        'request' => [
			'baseUrl' => $baseUrl,
			'enableCsrfValidation' => true,
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'aUc4WmxcOAz9eZ1Och8N-8JFLDJ80F1m',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName'  => false,
			'rules' => [
				'<module:admin>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
				'<module:admin>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
				'<module:admin>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',


				'/product/<id:\d+>/<alias:.+>' => 'products/view',
				'/product'                     => 'products/index',
				'/basket'                     => 'products/basket',
				''                     => 'site/index',
			]
		],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
