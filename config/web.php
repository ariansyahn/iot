<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets'
        ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'Uz1X6OkaR45hOVUHUqrUP_fcljV6zVxo',
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
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'info@megaark.com',
                'password' => 'megaark@123',
                'port' => '587',
                'encryption' => 'tls',
                'streamOptions' => [
                'ssl' => [
                'allow_self_signed' => true,
                'verify_peer' => false,
                'verify_peer_name' => false,
                ],
                ],
            ],
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
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
           ],
       ],
    ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'actions' => ['login','signup','confirm'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
        'denyCallback' => function () {
            return Yii::$app->response->redirect(['site/login']);
        },
    ],
    'params' => $params,
];

if (!YII_ENV_TEST) {
    //     configuration adjustments for 'dev' environment
        $config['bootstrap'][] = 'debug';
        $config['modules']['debug'] = 'yii\debug\Module';
    
        $config['bootstrap'][] = 'gii';
        $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            'generators' => [
                'crud' => ['class' => 'dee\gii\generators\crud\Generator'],
                'angular' => ['class' => 'dee\gii\generators\angular\Generator'],
                'mvc' => ['class' => 'dee\gii\generators\mvc\Generator'],
                'migration' => ['class' => 'dee\gii\generators\migration\Generator'],
            ]
        ];
    }

return $config;
