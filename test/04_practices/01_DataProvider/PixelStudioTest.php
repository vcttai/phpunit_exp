<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\PixelStudio;
use PHPUnit\Framework\TestCase;

class PixelStudioTest extends TestCase {
    /**
     * @dataProvider getSaleSeasonExamples
     * @param int $season
     * @param array $expected_games
     */
    public function testGetSaleGamesReturnCorrectData(int $season, array $expected_games) {
        $studio = new PixelStudio();

        $this->assertEquals($expected_games, $studio->getSaleGames($season));
    }

    public function getSaleSeasonExamples() {
        return [
            [SPRING_SEASON, [
                'Game A in PixelStudio',
                'Game B in PixelStudio'
            ]],
            [SUMMER_SEASON, []],
            [FALL_SEASON, []],
            [WINTER_SEASON, []],
        ];
    }

    public function testGetStudioName() {
        $studio = new PixelStudio();

        $this->assertSame('PixelStudio', $studio->getStudioName());
    }
}
