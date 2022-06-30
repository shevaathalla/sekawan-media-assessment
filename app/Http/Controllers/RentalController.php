<?php

namespace App\Http\Controllers;

use App\Enums\RentalStatus;
use App\Enums\VehicleStatus;
use App\Models\Driver;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $rentals = Rental::query()->with(['driver', 'vehicle']);
        if ($request->ajax()) {
            return DataTables::of($rentals)
                ->addColumn('action', function ($rental) {
                    return '<a href="' . route('rental.show', ["id" => (int) $rental->id]) . '"class="btn btn-primary btn-sm"><i class="bi bi-info-circle-fill me-2"></i>Show Details</a>';
                })->toJson();
        }
        return view('rental.index');
    }

    public function create()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::where('status', VehicleStatus::Available)->get();
        return view('rental.create', compact('drivers', 'vehicles'));
    }

    public function show(int $id)
    {
        $rental = Rental::with('vehicle')->find($id);
        return view('rental.show', compact('rental'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => ['required', 'integer'],
            'vehicle_id' => ['required', 'integer'],
        ]);

        DB::transaction(function () use ($request) {
            $rental = Rental::create($request->all());
            $rental->vehicle->status = VehicleStatus::Unavailable;
            $rental->vehicle->save();
        });

        return redirect()->route('rental.index')->with('success', 'Rental created successfully');
    }

    public function approve(int $id)
    {
        $rental = Rental::find($id);
        $rental->status = RentalStatus::Approved;
        $rental->save();
        return redirect()->route('rental.index')->with('success', 'Rental approved successfully');
    }

    public function reject(int $id)
    {
        $rental = Rental::find($id);
        $rental->status = RentalStatus::Rejected;
        $rental->save();
        return redirect()->route('rental.index')->with('success', 'Rental rejected successfully');
    }

    public function finish(Request $request, int $id)
    {
        $request->validate([
            'current_petrol' => ['required', 'integer'],
        ]);

        $rental = Rental::find($id);
        DB::transaction(function () use ($request, $rental) {
            $rental->status = RentalStatus::Finsihed;
            $rental->save();
            $rental->vehicle->status = VehicleStatus::Available;
            $rental->vehicle->current_petrol = $request->current_petrol;
            $rental->vehicle->save();
        });
        return redirect()->route('rental.index')->with('success', 'Rental completed successfully');
    }
}
