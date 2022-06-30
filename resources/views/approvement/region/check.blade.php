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
                            <form action="{{ route('rental.finish', ['id' => $rental->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="current_petrol">Current Gas</label>
                                    <input type="number" class="form-control" name="current_petrol" id="current_petrol"
                                        placeholder="Enter the amount of current petrol">
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
