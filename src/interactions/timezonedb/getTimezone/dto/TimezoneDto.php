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
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
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
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
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
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
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
     */
    public function setCountryName(?string $countryName): void
    {
        $this->countryName = $countryName;
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
     */
    public function setZoneName(?string $zoneName): void
    {
        $this->zoneName = $zoneName;
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
     */
    public function setAbbrevation(?string $abbrevation): void
    {
        $this->abbrevation = $abbrevation;
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
     */
    public function setGmtOffset(?int $gmtOffset): void
    {
        $this->gmtOffset = $gmtOffset;
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
     */
    public function setDst(?int $dst): void
    {
        $this->dst = $dst;
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
     */
    public function setZoneStart(?int $zoneStart): void
    {
        $this->zoneStart = $zoneStart;
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
     */
    public function setZoneEnd(?int $zoneEnd): void
    {
        $this->zoneEnd = $zoneEnd;
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
     */
    public function setTimestamp(?int $timestamp): void
    {
        $this->timestamp = $timestamp;
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
     */
    public function setFormatted(?string $formatted): void
    {
        $this->formatted = $formatted;
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
     */
    public function setTotalPage(?int $totalPage): void
    {
        $this->totalPage = $totalPage;
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
     */
    public function setCurrentPage(?int $currentPage): void
    {
        $this->currentPage = $currentPage;
    }
}