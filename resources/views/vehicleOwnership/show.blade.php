@extends('layouts.master')
@section('title')
    Show Ownership
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Company Details</h4>
                </div>
                <div class="card-body">
                    <p>In this page you can view detail of the company {{ $vehicleOwnership->company_name }}!</p>
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
                                    <p>Company Name</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicleOwnership->company_name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Company Address</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicleOwnership->address }}</p>
                                </td>          
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Company Phone</p>
                                </td>
                                <td>
                                    <p class="fw-bold ms-5">{{ $vehicleOwnership->phone_number }}</p>
                                </td> 
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Vehicle Owned</p>
                                </td>
                                <td>
                                    <ul class="ms-4">
                                        @foreach ($vehicleOwnership->vehicles as $vehicle)
                                            <li class="fw-bold">{{ $vehicle->name }} <a href="{{ route('vehicle.show',['id'=> $vehicle->id]) }}">
                                                ({{ $vehicle->code }})
                                            </a>  
                                            
                                            </li>
                                        @endforeach
                                    </ul>
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
