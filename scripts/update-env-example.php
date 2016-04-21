<?php
$name = substr(basename(dirname(dirname(__FILE__))), 0, 16);
echo $name . PHP_EOL;

$envFilename = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '.env.example';
$envFile = file_get_contents($envFilename);

#$string = bin2hex(openssl_random_pseudo_bytes(10));
#echo $envFile;

$envFile = preg_replace('/DB_DATABASE=\w+/', 'DB_DATABASE=' . $name, $envFile);
$envFile = preg_replace('/DB_USERNAME=\w+/', 'DB_USERNAME=' . $name, $envFile);
#$envFile = preg_replace('/DB_PASSWORD=\w+/', 'DB_PASSWORD=' . $string, $envFile);

file_put_contents($envFilename, $envFile);
