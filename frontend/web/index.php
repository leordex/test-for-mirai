<?php

require __DIR__ . "/../config/bootstrap.php";

use Dst\interactions\timezonedb\getTimezone\interactions\TimezonedbTimezoneGetInteraction;
use Dst\dao\CityDao;
use Dst\services\common\obtainers\TimezoneDataObtainer;
use Dst\services\getLocalTime\services\LocalTimeGetService;
use Dst\services\getTimestamp\services\TimestampGetService;
use frontend\controllers\ApiController;
use GuzzleHttp\Client;
use JMS\Serializer\ArrayTransformerInterface;
/**
 * @var PDO $dbConnection
 * @var ArrayTransformerInterface $jmsSerializer
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$sourceConfig = require('../config/source.php');

$cityDao = new CityDao($dbConnection, $jmsSerializer);
$timezoneGetInteraction = new TimezonedbTimezoneGetInteraction(
    $sourceConfig['apiKey'],
    new Client(['base_uri' => $sourceConfig['link']]),
    $jmsSerializer
);
$timezoneDataObtainer = new TimezoneDataObtainer($timezoneGetInteraction, $cityDao);
$timestampGetService = new TimestampGetService($timezoneDataObtainer);
$localTimeGetService = new LocalTimeGetService($timezoneDataObtainer);
$controller = new ApiController(
    require('../config/allowed_url.php'),
    $localTimeGetService,
    $timestampGetService
);

echo $controller->requestHandler() ?? 'Api v1.0';
exit;