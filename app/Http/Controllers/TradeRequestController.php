<?php

namespace App\Http\Controllers;

use App\TradeObject;
use App\TradeRequest;
use Illuminate\Http\Request;

class TradeRequestController extends Controller
{
    public function showOngoing()
    {
        $tradeRequests = TradeRequest::where('state', TradeRequest::STATE_ON_GOING)->get();

        return view('market', [
            'tradeRequests' => $tradeRequests
        ]);
    }

    public function show($id)
    {
        $tradeRequest = TradeRequest::find($id);

        return view('trade_request.show', [
            'tradeRequest' => $tradeRequest
        ]);
    }

    public function create()
    {
        return view('article.create');
    }

    public function store()
    {
//        dd(\request()->all());

        $tradeRequest = new TradeRequest();

        $tradeRequest->customer = \request()->get('customer');
        $tradeRequest->state = TradeRequest::STATE_ON_GOING;
        $tradeRequest->comment = \request()->get('comment');
        $tradeRequest->tradeType = \request()->get('tradeType');

        $tradeRequest->save();

        for ($i = 0; $i < sizeof(\request()->get('tradeObject_wowhead_id')); $i++) {
            $tradeObject = new TradeObject();
            $tradeObject->wowhead_id = \request()->get('tradeObject_wowhead_id')[$i];
            $tradeObject->quantity = \request()->get('tradeObject_quantity')[$i];

            $tradeRequest->tradeObjects()->save($tradeObject);
        }

        return redirect()->route('TradeRequestsShowOngoing');
    }

    public function validateTradeRequest()
    {
        \request()->validate([
            'customer' => 'required',
            'type' => 'required',
            'tradeObject_wowhead_id' => 'required',
            'tradeObject_quantity' => 'required'
        ]);
    }

    public function closeTradeRequest($id)
    {
        $tradeRequest = TradeRequest::find($id);
        $tradeRequest->state = TradeRequest::STATE_DONE;

        $tradeRequest->save();

        // add to session modal

        return redirect()->route('TradeRequestsShowOngoing');
    }

//    public function edit($id)
//    {
//        $tradeRequest = TradeRequest::find($id);
//
//        return view('trade_request.edit', [
//            'trade_request' => $tradeRequest
//        ]);
//    }
//
//    public function update($id)
//    {
//        $tradeRequest = TradeRequest::find($id);
//
//        $tradeRequest->customer = \request('body');
//        $tradeRequest->save();
//
//        return redirect('/articles');
//    }

    public function delete($id)
    {
        $tradeRequest = TradeRequest::find($id);
        $tradeRequest->state = TradeRequest::STATE_REMOVED;

        $tradeRequest->save();

        // add to session modal

        return redirect()->route('TradeRequestsShowOngoing');
    }
}
