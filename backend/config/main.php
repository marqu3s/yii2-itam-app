<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'itam-app',
    'name' => 'ITAM - IT Asset Manager',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'itam',
    'bootstrap' => ['log'],
    'language' => 'pt-BR',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        'jquery.min.js'
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        'js/bootstrap.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@app/themes/paper',
                    'css' => [
                        'bootstrap.min.css'
                    ]
                ],
                'yii\bootstrap\BootstrapThemeAsset' => [
                    'sourcePath' => null,   // do not publish the bundle
                ]
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'formatter' => [
            'nullDisplay' => '<span class="not-set">--</span>',
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
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/paper',
                'baseUrl' => '@web/themes/paper',
                'pathMap' => [
                    '@app/views' => '@app/themes/paper',
                ],
            ],
        ],
    ],
    'modules' => [
        'itam' => [
            'class' => 'marqu3s\itam\Module',
            'rbacAuthorization' => true,
        ],
    ],
    'params' => $params,
];
