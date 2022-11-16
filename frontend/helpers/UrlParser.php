<?php

namespace frontend\helpers;

use frontend\controllers\HttpServerException;

class UrlParser
{
    private const URI_ACTION_KEY = 2;
    private const ACTION_PREFIX = 'action';

    /**
     * @param string $uri
     * @param array $allowedUriToMethodMap
     *
     * @return string|null
     * @throws HttpServerException
     */
    public static function parseToAction(string $uri, array $allowedUriToMethodMap): ?string
    {
        $uriArr = explode('/', strtok($uri, '?'));

        if (!isset($uriArr[self::URI_ACTION_KEY])) {
            return null;
        }

        if (!isset($allowedUriToMethodMap[$uriArr[self::URI_ACTION_KEY]])) {
            throw new HttpServerException('Method not found', 404);
        }

        if ($allowedUriToMethodMap[$uriArr[self::URI_ACTION_KEY]] !== trim($_SERVER["REQUEST_METHOD"])) {
            throw new HttpServerException('Method not found', 404);
        }

        $capitalizedUriParts = array_map('ucfirst', explode('-', $uriArr[self::URI_ACTION_KEY]));

        return sprintf('%s%s', self::ACTION_PREFIX, implode('', $capitalizedUriParts));
    }
}