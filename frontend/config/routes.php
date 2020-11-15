<?php
/**
 * Created by PhpStorm.
 * User: pranta
 * Date: 5/11/20
 * Time: 1:31 PM
 */



return [
    'login' => 'site/login',
    'signup' => 'site/signup',
    'device-confirmation' => 'site/device-confirmation',






    '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
    '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>' => '<controller>/<action>',
    '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',

    '<module:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>' => '<module>/<controller>/<action>',
];