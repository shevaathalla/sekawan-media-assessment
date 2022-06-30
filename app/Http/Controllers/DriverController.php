<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $drivers = Driver::query();

        if ($request->ajax()) {
            return DataTables::of($drivers)
                ->addColumn('action', function ($driver) {
                    return '<a href="' . route('driver.show', ["id" => (int) $driver->id]) . '"class="btn btn-primary btn-sm"><i class="bi bi-info-circle-fill me-2"></i>Show Details</a>';
                })
                ->toJson();
        }
        return view('driver.index');
    }

    public function show(int $id)
    {
        $driver = Driver::with('rentals')->find($id);
        return view('driver.show', compact('driver'));
    }

    public function create()
    {
        return view('driver.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'address' => ['required','string'],
            'phone_number' => ['required','string'],
        ]);

        Driver::create($request->all());
        return redirect()->route('driver.index')->with('success', 'Driver created successfully');
    }
}
