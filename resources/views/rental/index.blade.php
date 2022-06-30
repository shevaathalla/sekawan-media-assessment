@extends('layouts.master')
@section('title')
    Rental Data
@endsection
@section('content')
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Rental Data</h4>
            </div>
            <div class="card-body">
                <p>You can view all rental with the vehicles and drivers!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <a class="float-right btn btn-success fw-bold" href="{{ route('rental.create') }}">Add New Rental</a>
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="rental-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vehicle Code</th>
                            <th>Driver Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>  
</section>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function() {
        $('#rental-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! route('rental.index') !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'vehicle.code',                    
                    name: 'vehicle.code'
                },                   
                {
                    data: 'driver.name',
                    name:'driver.name'
                },
                {
                    data:'status',
                    name:'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>
@endsection