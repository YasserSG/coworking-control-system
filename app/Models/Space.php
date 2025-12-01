<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'price_per_hour',
        'type',
        'status',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
