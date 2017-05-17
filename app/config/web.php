<?php

$params = require(__DIR__ . '/params.php');

$basePath = dirname(__DIR__);
$webroot = dirname($basePath);

$config = [
    'id' => 'app',
    'basePath' => $basePath,
    'bootstrap' => ['log','assetsAutoCompress'],
    'runtimePath' => $webroot . '/runtime',
    'vendorPath' => $webroot . '/vendor',
    // set target language to be Swedish
    'language' => 'sv-SE',
    // set source language to be English
    'sourceLanguage' => 'en-US',
    'modules' => [
        'attachments' => [
            'class' => nemmo\attachments\Module::className(),
            'tempPath' => '@app/uploads/temp',
            'storePath' => '@app/uploads/store',
            'rules' => [ // Rules according to the FileValidator
                'maxFiles' => 1, // Allow to upload maximum 3 files, default to 3
                'mimeTypes' => 'application/pdf', // Only png images
                'maxSize' => 1024 * 1024 * 5// 5 MB
            ],
            'tableName' => '{{%attachments}}', // Optional, default to 'attach_file'

        ],
        'akut' => [
            'class' => 'app\modules\akut\AkutModule',
        ],
        'job' => [
            'class' => 'app\modules\job\JobModule',
        ],
        'controllerMap' => [
            'migrate' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                    'nemmo\attachments\migrations',
                ],
            ],
        ],

    ],

    'components' => [
        'assetsAutoCompress' =>
        [
            'class' => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
                    '@easyii/modules/page/views' => '@app/modules/sida/views'
                ],
            ],
        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
            'defaultRoles' => ['customer'],

        ],
        'formatter' => [
            'locale' => 'sv-SE',
        ],
        'i18n' => [
            'translations' => [
                'akut' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'akut' => 'akut.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'sida' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'orders' => 'sida.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'orders' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'orders' => 'orders.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'company' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'company' => 'company.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ZZfuWKC8J-c0q65jwN_38R5V9WfRacTP',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        // Override the urlManager component
        'urlManager' => [
            // Make sure, you include your app's default language.
//            'class' => 'codemix\localeurls\UrlManager',
            // List all supported languages here
//            'languages' => ['sv-SE', 'sv'],
            'rules' => [
                'orders/view/<id:\d+>' => 'orders/view',
                'invoice/view/<id:\d+>' => 'invoice/view',
                'orders/update/<id:\d+>' => 'orders/update',
                'company/view/<id:\d+>' => 'company/view',
                'company/update/<id:\d+>' => 'company/update',
                'admin/page/a/edit/<id:\d+>' => 'admin/sida/a/edit',
//                'profile/<id\+>' => 'user/profile/show',
                'boka' => 'orders/create',
                'order-admin' => 'orders/index',
                'customers' => 'admin/default/view-customers',
                'order-update/<id:\d+>' => 'admin/default/update',
                '<controller:\w+>/view/<slug:[\w-]+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/cat/<slug:[\w-]+>' => '<controller>/cat',
            ],
        ],
        'assetManager' => [
            // uncomment the following line if you want to auto update your assets (unix hosting only)
            //'linkAssets' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [YII_DEBUG ? 'jquery.js' : 'jquery.min.js'],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [YII_DEBUG ? 'css/bootstrap.css' : 'css/bootstrap.min.css'],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [YII_DEBUG ? 'js/bootstrap.js' : 'js/bootstrap.min.js'],
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

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['components']['db'] = require(__DIR__ . '/db.php');
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';

    $config['components']['db']['enableSchemaCache'] = false;
}else{
    $config['components']['db'] = require(__DIR__ . '/db_production.php');
}

$config = array_merge_recursive($config,
    require($webroot . '/vendor/developeruz/easyii-user-module/config/user_module_config.php'),
    require($webroot . '/vendor/noumo/easyii/config/easyii.php'));

//override of user module
$config['components']['user'] = ['identityClass' => 'app\models\User'];
$config['modules']['user']['modelMap']['User'] = 'app\models\User';
$config['modules']['user']['modelMap']['UserSearch'] = 'app\models\UserSearch';
$config['modules']['user']['controllerMap']['admin'] = 'app\controllers\user\AdminController';
$config['modules']['user']['controllerMap']['profile'] = 'app\controllers\user\ProfileController';
Yii::setAlias('@easyii', $webroot . '/vendor/noumo/easyii/');
Yii::setAlias('@page', '/modules/sida');
Yii::setAlias('@pageViews', '@page/views/a');
return $config;