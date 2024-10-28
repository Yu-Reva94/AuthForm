<?php
$env = loadEnv('env');

$dbDriver = $env['DB_DRIVER'];
$dbHost = $env['DB_HOST'];
$dbName = $env['DB_NAME'];
$dbUser = $env['DB_USER'];
$dbPass = $env['DB_PASS'];

try {
    $pdo = new PDO("$dbDriver:$dbHost=DB_HOST;dbname=$dbName", $dbUser, $dbPass);
} catch (PDOException $i) {
    die("Ошибка подключения к базе данных");
}



