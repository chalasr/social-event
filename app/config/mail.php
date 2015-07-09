<?php

return array(
    'driver' => 'smtp',
    'host' => 'localhost',
    'port' => 25,
    'from' => array('address' => 'rchalas@sutunam.com', 'name' => 'Bref Rhône-Alpes'),
    'encryption' => 'tls',
    // 'username' => null,
    // 'password' => null,
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,""
);
