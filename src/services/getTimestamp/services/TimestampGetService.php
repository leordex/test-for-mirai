<?php

namespace Dst\services\getTimestamp\services;

use Carbon\Carbon;
use Dst\services\common\obtainers\TimezoneDataObtainer;
use Dst\services\ServiceException;

class TimestampGetService
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
     * @param string $localtime
     *
     * @return int
     * @throws ServiceException
     */
    public function perform(string $cityId, string $localtime): int
    {
        $localtimeTimestamp = strtotime($localtime);

        $timezoneDto = $this->timezoneDataObtainer->obtain(
            $cityId,
            $localtimeTimestamp
        );

        $diff = $localtimeTimestamp - $timezoneDto->getTimestamp();

        return $localtimeTimestamp + $diff;
    }
}