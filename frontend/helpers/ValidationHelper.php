<?php

namespace frontend\helpers;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use frontend\controllers\HttpServerException;

class ValidationHelper
{
    /**
     * @return string
     * @throws HttpServerException
     */
    public static function cityIdValidate(): string
    {
         $cityId = filter_input(
            INPUT_GET,
            'city_id',
            FILTER_VALIDATE_REGEXP,
            ['options' => ['regexp' => '/[a-zA-Z0-9-]+/']]
        );

         if (!$cityId) {
             throw new HttpServerException('city_id validation failed', 400);
         }

         return $cityId;
    }

    /**
     * @return int
     * @throws HttpServerException
     */
    public static function timestampValidate(): int
    {
        $timestamp = filter_input(
            INPUT_GET,
            'timestamp',
            FILTER_VALIDATE_INT
        );

        if (!$timestamp) {
            throw new HttpServerException('timestamp validation failed', 400);
        }

        return $timestamp;
    }

    /**
     * @return string
     * @throws HttpServerException
     */
    public static function localtimeValidate(): string
    {
        try {
            Carbon::parse($_GET['localtime']);
        } catch (InvalidFormatException $e) {
            throw new HttpServerException('localtime validation failed', 400);
        }

        return $_GET['localtime'];
    }
}