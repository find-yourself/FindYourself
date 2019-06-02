<?php

if ($_SERVER['SERVER_NAME'] == "find-yourself.herokuapp.com") {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
} else {
    $host = 'eu-cdbr-west-02.cleardb.net';
    $dbname = 'heroku_92f07953fdf3f11';
    $username = 'b3bec2473f50ec';
    $password = '456a797c';
}
$dbConfig = [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$host};dbname={$dbname}",
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
return $dbConfig;

