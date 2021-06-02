<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
//    Данное свойство позволяет Глобально переопределить щаблон который будет использоваться (неудобный вариант)
//    По умолчанию данное свойство ищет шаблоны в папке app/views/layout
//    'layout' => 'test',

    'language' => 'ru', // Свойство позволяет конкретно задать язык приложения

//    Данное свойство позволяет изменять корневой(дефолтный) маршрут. И тогда при обращении к
//    http://yii2-theory/web/ отработает не web/site/index как было изначально, а другой путь.
//    'defaultRoute' => 'site/about',

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-c4ZOHE7ONQMseL8XYHooxQxiuveJ925',
//            Избавляемся от папки /web/ в адресах приложения
            'baseUrl' => '',  /*что бы корректно подгружались ресурсы -> в настройкай openserver -> модули ->
            -> HTTP -> указать только Apache (без Nginx)*/
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
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [  /*Этот массив нужен для записи в него правил ЧПУ.
                Правила обрабатываются последовательно.
                Чем более индивидуально правило - тем выше оно должно стоять.
                Чем более обобщённое правило - тем ниже должно стоять
                В правилах можно использовать регулярные выражения.
                Введем правило что бы в адресе параметр после Вида принимался
                как Гет параметр id категории:
                именованому параметру id: соответствует какая то цифра
                Теперь адрес /category/view/4 РАВНО записи /category/view?id=4*/
                'category/view/<id:\d+>' => 'category/view',
                /*Так же можно из адреса слева убрать 'view':
                Теперь адрес /category/4 Равен адресу /category/view?id=4*/
                'category/<id:\d+>' => 'category/view',
//                Добавляем возможность задавать гет параметром не id а alias изх таблицы: /category/samsung
                'category/<alias>' => 'category/view',
            ],
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
