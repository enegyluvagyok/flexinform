<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['type', 'registered', 'ownbrand', 'accident'];
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'car_id', 'car_id');
    }
}