<?php

namespace Tests\Unit;

use App\TradeObject;
use App\TradeRequest;
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\TestCase;

class TradeRequestTest extends TestCase
{
    static function createTradeRequest(): TradeRequest
    {
        return $tradeRequest = new TradeRequest();
    }

    static function createTradeRequestsWithProperties($expected_customer, $expected_comment, $expected_tradeType): TradeRequest
    {
        $tradeRequest = self::createTradeRequest();

        $tradeRequest->customer = $expected_customer;
        $tradeRequest->comment = $expected_comment;
        $tradeRequest->tradeType = $expected_tradeType;

        return $tradeRequest;
    }

    public static function createTradeRequestsWithPropertiesAndObject($expected_customer, $expected_comment, $expected_tradeType, TradeObject $tradeObject)
    {
        $tradeRequest = self::createTradeRequestsWithProperties('Customer Name', 'Comment', TradeRequest::TRADE_TYPE_DEMAND);

        //TODO like symfony logic
//        $tradeRequest->addObject($tradeObject);

        return $tradeRequest;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateTradeRequest(): TradeRequest
    {
        $tradeRequest = self::createTradeRequest();

        $this->assertInstanceOf(TradeRequest::class, $tradeRequest);

        return $tradeRequest;
    }

    public function testChangeTradeRequestProperties()
    {
        $expected_customer = 'Customer Name';
        $expected_state = TradeRequest::STATE_ON_GOING;
        $expected_comment = 'Comment';
        $expected_tradeType = TradeRequest::TRADE_TYPE_DEMAND;

        $tradeRequest = self::createTradeRequestsWithProperties($expected_customer, $expected_comment, $expected_tradeType);

        $this->assertSame($expected_customer, $tradeRequest->customer);
        $this->assertSame($expected_state, $tradeRequest->state);
        $this->assertSame($expected_comment, $tradeRequest->comment);
        $this->assertSame($expected_tradeType, $tradeRequest->tradeType);

        return $tradeRequest;
    }

//    public function testAddObjectToTradeRequest()
//    {
//        $tradeObject = TradeObjectTest::createTradeObjectWithProperties('3000', '');
//        $tradeRequest = self::createTradeRequestsWithPropertiesAndObject('Customer Name', 'Comment', TradeRequest::TRADE_TYPE_DEMAND, $tradeObject);
//        $tradeRequest->id = 1;
//
////        $tradeObject->belongsTo();
//    }
//
//    public function testDeleteTradeRequest(): bool
//    {
//        //TODO
//    }
}
