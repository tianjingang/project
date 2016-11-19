<?php
return [
    'defaultRoute' => 'home/login',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=xiaozukaifaceshi',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
                    'username' => 'm15227395537@163.com',	//发件人邮箱
                    'password' => 'a123456',	//授权码
                    'port' => '25',
                    'encryption' => 'tls',
            ],
            'messageConfig'=>[
                    'charset'=>'UTF-8',
                    'from'=>['m15227395537@163.com'=>'八维校园招聘系统']  //发件人昵称
            ],
        ],

    ],
];