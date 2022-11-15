<?php

require __DIR__ . '/../../vendor/autoload.php';

use Dst\system\DatabaseConnectionFactory;
use Dst\system\JmsSerializerFactory;

$dbConnection = (new DatabaseConnectionFactory(require "database.php"))->create();
$jmsSerializer = (new JmsSerializerFactory())->create();