@extends('layouts.master')
@section('title')
    Create Rental
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add new Rental</h4>
                </div>
                <div class="card-body">
                    <p>You can add new rental data!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="float-right btn btn-success fw-bold" href="{{ route('rental.index') }}">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('rental.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="driver_id">Driver</label>
                                    <select class="form-select @error('driver_id') is-invalid @enderror" name="driver_id"
                                        id="driver_id">
                                        <option disabled selected>Select Driver</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>                                            
                                        @endforeach
                                    </select>
                                    @error('driver_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_id">Vehicle</label>
                                    <select class="form-select @error('vehicle_id') is-invalid @enderror" name="vehicle_id"
                                        id="vehicle_id">
                                        <option disabled selected>Select Vehicle</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->code }}</option>                                            
                                        @endforeach
                                    </select>
                                    @error('vehicle_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>                               
                                <button type="submit" class="btn btn-primary my-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
