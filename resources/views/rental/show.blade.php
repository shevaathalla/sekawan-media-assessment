@extends('layouts.master')
@section('title')
    Show Rental
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Rental Details</h4>
                </div>
                <div class="card-body">
                    <p>In this page you can view detail of the rental with id #{{ $rental->id }}!</p>
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
                                    <p>Rental ID</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $rental->id }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Rented by</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">
                                        <a class="text-primary"
                                            href="{{ route('driver.show', ['id' => $rental->driver->id]) }}">{{ $rental->driver->name }}</a>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Vehicle Data</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">
                                        <a class="text-primary"
                                            href="{{ route('vehicle.show', ['id' => $rental->vehicle->id]) }}">{{ $rental->vehicle->code }}</a>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Gas Usage</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $rental->petrol_usage }}L</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Rental Status</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $rental->status}}</p>
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
