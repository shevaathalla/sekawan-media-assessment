<?php

namespace App\Exports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class RentalExport implements FromQuery
{

    use Exportable;
        
    public function query()
    {
       return Rental::query()->with(['driver', 'vehicle']);
    }
    
}
