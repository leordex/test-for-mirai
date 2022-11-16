<?php

namespace Dst\dao\dto;

use JMS\Serializer\Annotation as Serializer;

class CityDto
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $country_iso3;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $latitude;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $longitude;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return CityDto
     */
    public function setId(string $id): CityDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryIso3(): string
    {
        return $this->country_iso3;
    }

    /**
     * @param string $country_iso3
     *
     * @return CityDto
     */
    public function setCountryIso3(string $country_iso3): CityDto
    {
        $this->country_iso3 = $country_iso3;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return CityDto
     */
    public function setName(string $name): CityDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     *
     * @return CityDto
     */
    public function setLatitude(string $latitude): CityDto
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     *
     * @return CityDto
     */
    public function setLongitude(string $longitude): CityDto
    {
        $this->longitude = $longitude;

        return $this;
    }
}