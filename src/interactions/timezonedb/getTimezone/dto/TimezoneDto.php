<?php

namespace Dst\interactions\timezonedb\getTimezone\dto;

use JMS\Serializer\Annotation as Serializer;

class TimezoneDto
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $status;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $message;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $countryCode;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $countryName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $zoneName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $abbrevation;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $gmtOffset;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $dst;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $zoneStart;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $zoneEnd;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $timestamp;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $formatted;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $totalPage;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $currentPage;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return TimezoneDto
     */
    public function setStatus(string $status): TimezoneDto
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     *
     * @return TimezoneDto
     */
    public function setMessage(?string $message): TimezoneDto
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     *
     * @return TimezoneDto
     */
    public function setCountryCode(?string $countryCode): TimezoneDto
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    /**
     * @param string|null $countryName
     *
     * @return TimezoneDto
     */
    public function setCountryName(?string $countryName): TimezoneDto
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZoneName(): ?string
    {
        return $this->zoneName;
    }

    /**
     * @param string|null $zoneName
     *
     * @return TimezoneDto
     */
    public function setZoneName(?string $zoneName): TimezoneDto
    {
        $this->zoneName = $zoneName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAbbrevation(): ?string
    {
        return $this->abbrevation;
    }

    /**
     * @param string|null $abbrevation
     *
     * @return TimezoneDto
     */
    public function setAbbrevation(?string $abbrevation): TimezoneDto
    {
        $this->abbrevation = $abbrevation;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGmtOffset(): ?int
    {
        return $this->gmtOffset;
    }

    /**
     * @param int|null $gmtOffset
     *
     * @return TimezoneDto
     */
    public function setGmtOffset(?int $gmtOffset): TimezoneDto
    {
        $this->gmtOffset = $gmtOffset;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDst(): ?int
    {
        return $this->dst;
    }

    /**
     * @param int|null $dst
     *
     * @return TimezoneDto
     */
    public function setDst(?int $dst): TimezoneDto
    {
        $this->dst = $dst;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getZoneStart(): ?int
    {
        return $this->zoneStart;
    }

    /**
     * @param int|null $zoneStart
     *
     * @return TimezoneDto
     */
    public function setZoneStart(?int $zoneStart): TimezoneDto
    {
        $this->zoneStart = $zoneStart;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getZoneEnd(): ?int
    {
        return $this->zoneEnd;
    }

    /**
     * @param int|null $zoneEnd
     *
     * @return TimezoneDto
     */
    public function setZoneEnd(?int $zoneEnd): TimezoneDto
    {
        $this->zoneEnd = $zoneEnd;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    /**
     * @param int|null $timestamp
     *
     * @return TimezoneDto
     */
    public function setTimestamp(?int $timestamp): TimezoneDto
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormatted(): ?string
    {
        return $this->formatted;
    }

    /**
     * @param string|null $formatted
     *
     * @return TimezoneDto
     */
    public function setFormatted(?string $formatted): TimezoneDto
    {
        $this->formatted = $formatted;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalPage(): ?int
    {
        return $this->totalPage;
    }

    /**
     * @param int|null $totalPage
     *
     * @return TimezoneDto
     */
    public function setTotalPage(?int $totalPage): TimezoneDto
    {
        $this->totalPage = $totalPage;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrentPage(): ?int
    {
        return $this->currentPage;
    }

    /**
     * @param int|null $currentPage
     *
     * @return TimezoneDto
     */
    public function setCurrentPage(?int $currentPage): TimezoneDto
    {
        $this->currentPage = $currentPage;

        return $this;
    }
}