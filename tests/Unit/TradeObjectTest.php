<?php

namespace Tests\Unit;

use App\TradeObject;
use PHPUnit\Framework\TestCase;

class TradeObjectTest extends TestCase
{
    static function createTradeObject(): TradeObject
    {
        return $tradeObject = new TradeObject();
    }

    static function createTradeObjectWithProperties($expected_wowhead_id, $expected_trade_request_id): TradeObject
    {
        $tradeObject = self::createTradeObject();

        $tradeObject->wowhead_id = $expected_wowhead_id;
        $tradeObject->trade_request_id = $expected_trade_request_id;

        return $tradeObject;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateTradeObject()
    {
        $tradeObject = $this->createTradeObject();

        $this->assertInstanceOf(TradeObject::class, $tradeObject);
    }

    public function testChangeTradeObjectProperties()
    {
        $expected_wowhead_id = 3000;
        $expected_trade_request_id = 1;

        $tradeObject = $this->createTradeObjectWithProperties($expected_wowhead_id, $expected_trade_request_id);

        $this->assertSame($expected_wowhead_id, $tradeObject->wowhead_id);
        $this->assertSame($expected_trade_request_id, $tradeObject->trade_request_id);
    }
}
