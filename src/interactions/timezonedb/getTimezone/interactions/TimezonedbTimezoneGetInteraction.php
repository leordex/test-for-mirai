<?php

namespace Dst\interactions\timezonedb\getTimezone\interactions;

use Dst\interactions\InteractionException;
use Dst\interactions\timezonedb\getTimezone\dto\TimezoneDto;
use GuzzleHttp\Client;
use JMS\Serializer\ArrayTransformerInterface;

class TimezonedbTimezoneGetInteraction
{
    private const LINK = '/v2.1/get-time-zone';
    private const SEARCH_BY = 'position';
    private const FORMAT = 'json';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var ArrayTransformerInterface
     */
    private $arrayTransformer;

    /**
     * @param string $apiKey
     * @param Client $client
     * @param ArrayTransformerInterface $arrayTransformer
     */
    public function __construct(string $apiKey, Client $client, ArrayTransformerInterface $arrayTransformer)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
        $this->arrayTransformer = $arrayTransformer;
    }

    /**
     * @param string $latitude
     * @param string $longitude
     * @param int|null $timestamp
     *
     * @return TimezoneDto
     * @throws InteractionException
     */
    public function interact(string $latitude, string $longitude, ?int $timestamp): TimezoneDto
    {
        $response = $this->client->get(
            self::LINK,
            [
                'query' => array_filter([
                    'key' => $this->apiKey,
                    'by' => self::SEARCH_BY,
                    'lat' => $latitude,
                    'lng' => $longitude,
                    'time' => $timestamp,
                    'format' => self::FORMAT,
                ]),
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new InteractionException(
                sprintf(
                    'Timezone get request failed with status code %d and reason %s',
                    $response->getStatusCode(),
                    $response->getReasonPhrase()
                )
            );
        }

        return $this->arrayTransformer->fromArray(
            json_decode($response->getBody(), true),
            TimezoneDto::class
        );
    }
}