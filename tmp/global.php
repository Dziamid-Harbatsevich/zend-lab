<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'db' => [
    	'driver' => 'Pdo',
    	'dsn' => 'mysql:dbname=dev_lab;host=localhost',
    	'username' => 'devlaboratory',
    	'password' => '729f4_ig9Fmf3l2J',
    ]
];
