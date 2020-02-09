<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignation extends Model
{
    public function complete()
    {
        $this->complete = true;
    }
}
