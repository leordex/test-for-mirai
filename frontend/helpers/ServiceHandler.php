<?php

namespace frontend\helpers;

use frontend\controllers\HttpServerException;
use frontend\dto\ResponseDto;
use Throwable;

class ServiceHandler
{
    /**
     * @param callable $function
     *
     * @return ResponseDto
     * @throws HttpServerException
     */
    public static function handle(callable $function): ResponseDto
    {
        try {
            $result = $function();

            return (new ResponseDto())->setData(['result' => $result]);
        } catch (Throwable $e) {
            //Logging should be here
            //Something like Log::error($e);

            throw new HttpServerException('server error. write to administrator', 400);
        }
    }
}