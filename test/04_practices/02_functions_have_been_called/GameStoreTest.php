<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\GameStore;
use exp\src\practice\GameStudioService;
use PHPUnit\Framework\TestCase;

class GameStoreTest extends TestCase
{
    /**
     * @dataProvider getDataNotInSaleSeason
     * @param $sale_season
     * @param $request_season
     * @throws ErrorException
     */
    public function testGetSaleListWillThrowErrorWhenNotInSaleSeason($sale_season, $request_season) {
        $game_store = new GameStore($sale_season);

        $this->expectException(ErrorException::class);

        $game_store->getSaleList($request_season);
    }

    public function getDataNotInSaleSeason() {
        return [
            [SPRING_SEASON, SUMMER_SEASON],
            [SPRING_SEASON, FALL_SEASON],
            [SPRING_SEASON, WINTER_SEASON],
        ];
    }

    public function testGetSaleListWillCallToServiceDuringSale() {
        $season = SPRING_SEASON;
        $game_store = new GameStore($season);

        $studio_service_mock = $this->getMockBuilder(GameStudioService::class)->getMock();
        $studio_service_mock->expects($this->once())->method('updateStudioList');
        $studio_service_mock->expects($this->once())->method('getSaleGames')->willReturn([]);

        $store_reflection = new ReflectionClass(GameStore::class);
        try {
            $service_reflection = $store_reflection->getProperty('studio_service');
            $service_reflection->setAccessible(true);
            $service_reflection->setValue($game_store, $studio_service_mock);
        }
        catch (ReflectionException $exception) {}

        $game_store->getSaleList($season);
    }
}
