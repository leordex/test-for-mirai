<?php

namespace Dst\tests\unit\services\getTimestamp\services;

use Codeception\Test\Unit;
use Dst\interactions\timezonedb\getTimezone\dto\TimezoneDto;
use Dst\services\common\obtainers\TimezoneDataObtainer;
use Dst\services\getTimestamp\services\TimestampGetService;
use Dst\services\ServiceException;

class TimestampGetServiceTest extends Unit
{
    private const LOCAL_TIME = '2022-11-15 05:38:31';
    private const LOCAL_TIME_DIFF = 60 * 60 * 5;
    private const CITY_ID = '040efa6e-3512-4523-a4dc-33e29aece663';

    /**
     * @dataProvider performDataProvider
     *
     * @param TimezoneDataObtainer $timezoneDataObtainer
     * @param int $expectedTimestamp
     *
     * @return void
     * @throws ServiceException
     */
    public function testPerform(TimezoneDataObtainer $timezoneDataObtainer, int $expectedTimestamp): void
    {
        $service = new TimestampGetService($timezoneDataObtainer);

        $actualTimestamp = $service->perform(self::CITY_ID, self::LOCAL_TIME);

        $this->assertEquals($expectedTimestamp, $actualTimestamp);
    }

    /**
     * @return mixed[][]
     */
    public function performDataProvider(): array
    {
        return [
            'Bigger time' => [
                'timezoneDataObtainer' => $this->mockTimezoneDataObtainer(),
                'expectedTimestamp' => $this->createExpectedTimestamp(),
            ],
            'Smaller time' => [
                'timezoneDataObtainer' => $this->mockTimezoneDataObtainer(false),
                'expectedTimestamp' => $this->createExpectedTimestamp(false),
            ],
        ];
    }

    /**
     * @param bool $isObtainedBigger
     *
     * @return int
     */
    private function createExpectedTimestamp(bool $isObtainedBigger = true): int
    {
        $timestamp = strtotime(self::LOCAL_TIME);
        $diff = $isObtainedBigger ? self::LOCAL_TIME_DIFF : -self::LOCAL_TIME_DIFF;
        $newTimestamp = $timestamp + $diff;

        return $timestamp + ($timestamp - $newTimestamp);
    }

    /**
     * @param bool $isBigger
     *
     * @return TimezoneDataObtainer
     */
    private function mockTimezoneDataObtainer(bool $isBigger = true): TimezoneDataObtainer
    {
        $mock = $this->createMock(TimezoneDataObtainer::class);

        $mock->method('obtain')
             ->will(
                 $this->returnCallback(
                     function (string $cityId, int $localtime) use ($isBigger): TimezoneDto {
                         $timeDiff = $isBigger ? self::LOCAL_TIME_DIFF : -self::LOCAL_TIME_DIFF;

                         return $this->createTimezoneDto($localtime + $timeDiff);
                     }
                 )
             );

        return $mock;
    }

    /**
     * @param int $timestamp
     *
     * @return TimezoneDto
     */
    private function createTimezoneDto(int $timestamp): TimezoneDto
    {
        return (new TimezoneDto())
            ->setTimestamp($timestamp);
    }
}