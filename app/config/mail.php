<?php 

return array(
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 465,
    'from' => array('address' => 'skylaxdev@gmail.com', 'name' => 'Skylaxdev'),
    'encryption' => 'ssl',
    'username' => 'skylaxdev@gmail.com',
    'password' => 'lolilol69',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
);