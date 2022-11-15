<?php

namespace Dst\services\getLocalTime\services;

use Dst\services\common\obtainers\TimezoneDataObtainer;
use Dst\services\ServiceException;

class LocalTimeGetService
{
    /**
     * @var TimezoneDataObtainer
     */
    private $timezoneDataObtainer;

    /**
     * @param TimezoneDataObtainer $timezoneDataObtainer
     */
    public function __construct(TimezoneDataObtainer $timezoneDataObtainer)
    {
        $this->timezoneDataObtainer = $timezoneDataObtainer;
    }

    /**
     * @param string $cityId
     * @param string $timestamp
     *
     * @return string
     * @throws ServiceException
     */
    public function perform(string $cityId, string $timestamp): string
    {
        return $this->timezoneDataObtainer->obtain($cityId, $timestamp)
                                          ->getFormatted();
    }
}