<?php

return [
  'dbname' => 'mvc',
  'username' => 'admin',
  'password' => 'mysql',
  'port' => '8080',
  'driver' => 'mysql',
  'host' => '127.0.0.1',
  'options' => [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]
];
