<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\MonicaStudio;
use PHPUnit\Framework\TestCase;

class MonicaStudioTest extends TestCase {
    /**
     * @dataProvider getSaleSeasonExamples
     * @param int $season
     * @param array $expected_games
     */
    public function testGetSaleGamesReturnCorrectData(int $season, array $expected_games) {
        $studio = new MonicaStudio();

        $this->assertEquals($expected_games, $studio->getSaleGames($season));
    }

    public function getSaleSeasonExamples() {
        return [
            [SPRING_SEASON, []],
            [SUMMER_SEASON, []],
            [FALL_SEASON, []],
            [WINTER_SEASON, [
                'Game X in MonicaStudio',
                'Game Y in MonicaStudio'
            ]],
        ];
    }

    public function testGetStudioName() {
        $studio = new MonicaStudio();

        $this->assertSame('Santa Monica Studio', $studio->getStudioName());
    }
}
