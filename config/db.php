<?php

if (getenv("CLEARDB_DATABASE_URL")) {
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
  return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$url["host"]};dbname=" . substr($url["path"], 1),
    'username' => $url["user"],
    'password' => $url["pass"],
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
  ];
}
if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'local_db.php')) {
  die('Не найден файл локальной конфигурации базы банных "config/local_db.php"');
}

return require __DIR__ . DIRECTORY_SEPARATOR . 'local_db.php';