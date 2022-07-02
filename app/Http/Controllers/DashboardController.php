<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $rentals = Rental::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('created_at', 'asc')
            ->pluck('count', 'month_name');

        $labels = $rentals->keys();
        $data = $rentals->values();

        return view('dashboard',compact('labels', 'data'));
    }
}
