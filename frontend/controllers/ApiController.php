<?php

namespace frontend\controllers;


use Dst\services\getLocalTime\services\LocalTimeGetService;
use Dst\services\getTimestamp\services\TimestampGetService;
use frontend\dto\ResponseDto;
use frontend\helpers\ServiceHandler;
use frontend\helpers\UrlParser;
use frontend\helpers\ValidationHelper;
use frontend\helpers\validators\GetLocalTimeValidator;

class ApiController
{
    /**
     * @var string[]
     */
    private $allowedUriToMethodMap;

    /**
     * @var LocalTimeGetService
     */
    private $localTimeGetService;

    /**
     * @var TimestampGetService
     */
    private $timestampGetService;

    /**
     * @param string[] $allowedUriToMethodMap
     * @param LocalTimeGetService $localTimeGetService
     * @param TimestampGetService $timestampGetService
     */
    public function __construct(array               $allowedUriToMethodMap,
                                LocalTimeGetService $localTimeGetService,
                                TimestampGetService $timestampGetService)
    {
        $this->allowedUriToMethodMap = $allowedUriToMethodMap;
        $this->localTimeGetService = $localTimeGetService;
        $this->timestampGetService = $timestampGetService;
    }

    /**
     * @return string|null
     */
    public function requestHandler(): ?string
    {
        $failDto = (new ResponseDto())->setStatus('failed');

        try {
            $action = UrlParser::parseToAction($_SERVER['REQUEST_URI'], $this->allowedUriToMethodMap);

            if ($action === null) {
                return null;
            }

            $result = method_exists($this, $action) ?
                $this->{$action}() :
                $failDto->setData(['error' => 'Method not allowed']);

        } catch (\Throwable|HttpServerException $e) {
            $result = $failDto->setData(['error' => $e->getMessage()]);
        }

        return json_encode($result);
    }

    /**
     * @return ResponseDto
     * @throws HttpServerException
     */
    public function actionGetLocalTime(): ResponseDto
    {
        //Normal validation required below
        $cityId = ValidationHelper::cityIdValidate();
        $timestamp = ValidationHelper::timestampValidate();

        return ServiceHandler::handle(function () use ($cityId, $timestamp) {
            return $this->localTimeGetService->perform($cityId, $timestamp);
        });
    }

    /**
     * @return ResponseDto
     * @throws HttpServerException
     */
    public function actionGetTimestamp(): ResponseDto
    {
        //Normal validation required below
        $cityId = ValidationHelper::cityIdValidate();
        $localtime = ValidationHelper::localtimeValidate();

        return ServiceHandler::handle(function () use ($cityId, $localtime) {
            return $this->timestampGetService->perform($cityId, $localtime);
        });
    }
}