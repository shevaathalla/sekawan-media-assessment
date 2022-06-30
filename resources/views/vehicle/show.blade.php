@extends('layouts.master')
@section('title')
    Show Vehicle
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Vehicle Details</h4>
                </div>
                <div class="card-body">
                    <p>In this page you can view detail of the vehicle {{ $vehicle->code }}!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td colspan="2">
                                    <p>Name</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicle->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Code</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicle->code }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Type</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicle->type }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Gas Remaining</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicle->current_petrol }} L</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Last Service</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicle->last_service_date }}</p>
                                </td>
                            </tr>                            
                            <tr>
                                <td colspan="2">
                                    <p>Owned by</p>
                                </td>
                                <td>
                                    <p>
                                        <a href="{{ route('ownership.show',['id' => $vehicle->vehicleOwnership->id ]) }}" class="fw-bold text-primary ms-5">{{ $vehicle->vehicleOwnership->company_name }}</a>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Status</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicle->status }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
