<?php

namespace App\Http\Controllers;

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
        $tradeRequest = new TradeRequest($this->validateTradeRequest());

        $tradeRequest->save();

        return redirect('/');
    }

    public function validateTradeRequest()
    {
        \request()->validate([
            'customer' => 'required'
        ]);
    }

    public function closeTradeRequest($id)
    {
        $tradeRequest = TradeRequest::find($id);
        $tradeRequest->state = TradeRequest::STATE_DONE;

        $tradeRequest->save();

        // add to session modal

        return redirect('/');
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

        return redirect('/');
    }
}
