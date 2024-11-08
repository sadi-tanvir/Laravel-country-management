<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ["state_id", "name"];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
