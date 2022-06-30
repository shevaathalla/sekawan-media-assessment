<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleOwnership extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'phone_number',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
