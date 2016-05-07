<?php
$envFilename = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '.env.example';
$envOutFilename = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '.env';
$envFile = file_get_contents($envFilename);

$string = bin2hex(openssl_random_pseudo_bytes(10));

$envFile = preg_replace('/DB_PASSWORD=\w+/', 'DB_PASSWORD=' . $string, $envFile);

file_put_contents($envOutFilename, $envFile);

echo "Updates $envOutFilename" . PHP_EOL;
