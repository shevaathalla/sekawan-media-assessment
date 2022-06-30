@extends('layouts.master')
@section('title')
    Show Driver
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Driver Details</h4>
                </div>
                <div class="card-body">
                    <p>In this page you can view detail of the driver {{ $driver->name }}!</p>
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
                                    <p>Driver Name</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $driver->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Driver Address</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $driver->address }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Driver Phone</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $driver->phone_number }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Rental Made</p>
                                </td>
                                <td>
                                    @if (!$driver->rentals->isEmpty())
                                        <ul>
                                            @foreach ($driver->rentals as $rental)
                                                <li class="ms-4 fw-bold">Rental with ID: <a href=""
                                                        class="text-primary">#{{ $rental->id }}</a>
                                                    ({{ $rental->status }})</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="ms-5 fw-bold">The driver has never made a loan yet!</p>
                                    @endif

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
