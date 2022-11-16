<?php

namespace Dst\services\common\obtainers;

use Dst\interactions\timezonedb\getTimezone\dto\TimezoneDto;
use Dst\interactions\timezonedb\getTimezone\interactions\TimezonedbTimezoneGetInteraction;
use Dst\dao\CityDao;
use Dst\services\ServiceException;
use Throwable;

class TimezoneDataObtainer
{
    /**
     * @var TimezonedbTimezoneGetInteraction
     */
    private $timezonedbTimezoneGetInteraction;

    /**
     * @var CityDao
     */
    private $cityDao;

    /**
     * @param TimezonedbTimezoneGetInteraction $timezonedbTimezoneGetInteraction
     * @param CityDao $cityDao
     */
    public function __construct(TimezonedbTimezoneGetInteraction $timezonedbTimezoneGetInteraction,
                                CityDao                          $cityDao)
    {
        $this->timezonedbTimezoneGetInteraction = $timezonedbTimezoneGetInteraction;
        $this->cityDao = $cityDao;
    }

    /**
     * @param string $cityId
     * @param string|null $timestamp
     *
     * @return TimezoneDto
     * @throws ServiceException
     */
    public function obtain(string $cityId, string $timestamp = null): TimezoneDto
    {
        try {
            $cityDto = $this->cityDao->get($cityId);

            return $this->timezonedbTimezoneGetInteraction->interact(
                $cityDto->getLatitude(),
                $cityDto->getLongitude(),
                $timestamp
            );
        } catch (Throwable $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
    }
}