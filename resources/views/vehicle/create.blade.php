@extends('layouts.master')
@section('title')
    Create Vehicle
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Vehicle</h4>
                </div>
                <div class="card-body">
                    <p>You can create new vehicle!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="float-right btn btn-success fw-bold" href="{{ route('vehicle.index') }}">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('vehicle.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Enter name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        id="code" name="code" placeholder="Enter code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-select @error('type') is-invalid @enderror" name="type"
                                        id="type">
                                        <option disabled selected>Select type</option>
                                        <option value="people_transport">People Transport</option>
                                        <option value="cargo_transport">Cargo Transport</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_ownership_id">Ownership</label>
                                    <select class="form-select @error('vehicle_ownership_id') is-invalid @enderror" name="vehicle_ownership_id"
                                        id="vehicle_ownership_id">
                                        <option disabled selected>Select Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vehicle_ownership_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="current_petrol">Inital Petrol</label>
                                    <input type="number" class="form-control" id="current_petrol" name="current petrol" placeholder="Enter Initial Petrol">
                                    @error('current_petrol')
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
