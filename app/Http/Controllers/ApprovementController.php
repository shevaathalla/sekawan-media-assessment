<?php

namespace App\Http\Controllers;

use App\Enums\RentalStatus;
use App\Models\Rental;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApprovementController extends Controller
{
    public function showBranchApproval(Request $request)
    {
        $rentals = Rental::query()->with(['driver','vehicle'])->where('status', RentalStatus::Pending);
        if ($request->ajax()) {
            return DataTables::of($rentals)
                ->addColumn('action', function ($rental) {
                    return '<a href="' . route('rental.approve', ["id" => (int) $rental->id]) . '"class="btn btn-primary btn-sm"><i class="bi bi-hand-thumbs-up-fill me-2"></i>Approve</a>
                    <a href="' . route('rental.reject', ["id" => (int) $rental->id]) . '"class="btn btn-danger btn-sm"><i class="bi bi-hand-thumbs-down-fill me-2"></i>Reject</a>
                    ';
                })
                ->toJson();
        }
        return view('approvement.branch.index');
    }

    public function showRegionApproval(Request $request)
    {
        $rentals = Rental::query()->with(['driver','vehicle'])->where('status', RentalStatus::Approved);
        if ($request->ajax()) {
            return DataTables::of($rentals)
                ->addColumn('action', function ($rental) {
                    return '<a href="' . route('rental.approvement.check', ["id" => (int) $rental->id]) . '"class="btn btn-success btn-sm"><i class="bi bi-eye-fill me-2"></i>Check</a>';
                })
                ->toJson();
        }
        return view('approvement.region.index');
    }

    public function check(int $id)
    {
        $rental = Rental::find($id);
        return view('approvement.region.check', compact('rental'));
    }
}
