<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_ownership_id',
        'vehicle_status',
        'type',
        'current_petrol',
        'code',
        'name',
    ];

    public function vehicleOwnership()
    {
        return $this->belongsTo(VehicleOwnership::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function getStatusAttribute()
    {
        return ucfirst($this->attributes['status']);
    }

    protected function getTypeAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->attributes['type']));
    }
}
