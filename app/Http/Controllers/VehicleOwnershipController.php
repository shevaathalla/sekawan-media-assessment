<?php

namespace App\Http\Controllers;

use App\Models\VehicleOwnership;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleOwnershipController extends Controller
{
    public function index(Request $request){

        $vehicleOwnerships = VehicleOwnership::query();

        if ($request->ajax()) {
            return DataTables::eloquent($vehicleOwnerships)
                ->addColumn('action', function ($vehicleOwnerships) {
                    return '<a href="' . route('ownership.show', ["id" => (int) $vehicleOwnerships->id]) . '" class="btn btn-primary btn-sm"><i class="bi bi-info-circle-fill me-2"></i>Show</a>';
                })
                ->toJson();
        }
        return view('vehicleOwnership.index');
    }

    public function show(int $id)
    {
        $vehicleOwnership = VehicleOwnership::with('vehicles')->find($id);
        return view('vehicleOwnership.show', compact('vehicleOwnership'));
    }

    public function create(){
        return view('vehicleOwnership.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'company_name' => ['required','max:255','string'],
            'address' => ['required','string'],
            'phone_number' => ['required','string','regex:/(01)[0-9]{9}/'],
        ]);
        
        VehicleOwnership::create($request->all());

        return redirect()->route('ownership.index')->with('success', 'Vehicle Ownership created successfully');
    }
  
}


