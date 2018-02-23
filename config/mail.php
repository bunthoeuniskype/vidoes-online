<?php

return array(
'driver' => 'smtp',
'host' => 'mail.ecamschool.com',
'port' => 25,
'from' => ['address' => 'admin@ecamschool.com', 'name' => 'E-Cam School'],
'encryption' => 'tls',
'username' => 'admin@ecamschool.com',
'password' => 'ZTihv7JdGLk4',
'sendmail' => '/usr/sbin/sendmail -bs',
'pretend' => false,

'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    'stream' => [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ],
]

);