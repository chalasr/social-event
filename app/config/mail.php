<?php

return array(
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 465,
    'from' => array('address' => 'robin.chalas@gmail.com', 'name' => 'Robin Chalas'),
    'encryption' => 'ssl',
    'username' => 'robin.chalas@gmail.com',
    'password' => 'PASSWORD',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
);
