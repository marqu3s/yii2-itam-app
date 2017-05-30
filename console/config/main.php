<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'itam-monitoring' => [
            'class' => 'marqu3s\itam\console\controllers\MonitoringController',
            'nmapPath' => '/usr/bin/',
            'pushbulletAPIKey' => '',
            'pushbulletChannelTag' => '',
            'telegramAPIKey' => '',
            'telegramBotName' => '',
            'telegramChannel' => '',
            'pushoverUserKey' => '',
            'pushoverAPIKey' => '',
        ],
    ],
    'components' => [
        'log' => [
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
