<?php

namespace Dst\services\common\obtainers;

use Dst\interactions\timezonedb\getTimezone\dto\TimezoneDto;
use Dst\interactions\timezonedb\getTimezone\interactions\TimezonedbTimezoneGetInteraction;
use Dst\repositories\CityRepository;
use Dst\services\ServiceException;
use Throwable;

class TimezoneDataObtainer
{
    /**
     * @var TimezonedbTimezoneGetInteraction
     */
    private $timezonedbTimezoneGetInteraction;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * @param TimezonedbTimezoneGetInteraction $timezonedbTimezoneGetInteraction
     * @param CityRepository $cityRepository
     */
    public function __construct(TimezonedbTimezoneGetInteraction $timezonedbTimezoneGetInteraction,
                                CityRepository                   $cityRepository)
    {
        $this->timezonedbTimezoneGetInteraction = $timezonedbTimezoneGetInteraction;
        $this->cityRepository = $cityRepository;
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
            $city = $this->cityRepository->find($cityId);

            return $this->timezonedbTimezoneGetInteraction->interact(
                $city->latitude,
                $city->longitude,
                $timestamp
            );
        } catch (Throwable $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
    }
}