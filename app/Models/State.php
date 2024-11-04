<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "states";
    protected $fillable = ["country_id", "name"];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
