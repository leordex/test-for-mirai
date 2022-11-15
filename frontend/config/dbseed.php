<?php

require "bootstrap.php";

/**
 * @var PDO $dbConnection
 */

$dbConnection->exec(file_get_contents('city.sql'));

echo 'Success!';

exit;