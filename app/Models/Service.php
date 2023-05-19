<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['lognumber', 'event', 'eventtime', 'document_id'];
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }
}