<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeObject extends Model
{
    public function tradeRequest()
    {
        return $this->belongsTo(TradeRequest::class);
    }
}
