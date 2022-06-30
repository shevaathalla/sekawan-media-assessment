<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleOwnership;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $vehicle = Vehicle::query();
        if ($request->ajax()) {
            return DataTables::eloquent($vehicle)
                ->addColumn('action', function ($vehicle) {
                    return '<a href="' . route('vehicle.show', ["id" => (int) $vehicle->id]) . '"class="btn btn-primary btn-sm"><i class="bi bi-info-circle-fill me-2"></i>Show Details</a>';
                })
                ->toJson();
        }
        return view('vehicle.index');
    }

    public function show($id)
    {
        $vehicle = Vehicle::with('vehicleOwnership')->find($id);
        return view('vehicle.show', compact('vehicle'));
    }

    public function create()
    {
        $companies = VehicleOwnership::all();
        return view('vehicle.create', compact('companies'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'code' => ['required', 'string'],
            'type' => ['required', 'string'],
            'current_petrol' => ['required', 'numeric'],
            'vehicle_ownership_id' => ['required', 'integer'],
        ]);
        
        Vehicle::create($request->all());
        return redirect()->route('vehicle.index')->with('success', 'Vehicle created successfully');
    }
    
}
