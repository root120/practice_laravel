<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 587),
    'from' => ['address' => 'foysolmu@gmail.com', 'name' => 'Shuvo'],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    //Maybe here is your problem
    'username' => env('MAIL_USERNAME','foysolmu@gmail.com'),
    'password' => env('MAIL_PASSWORD', 'root&over2'),
    'sendmail' => '/usr/sbin/sendmail -bs',

];
