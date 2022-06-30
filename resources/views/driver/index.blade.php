@extends('layouts.master')
@section('title')
    Driver Data
@endsection
@section('content')
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Driver Data</h4>
            </div>
            <div class="card-body">
                <p>You can view all data of the drivers!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <a class="float-right btn btn-success fw-bold" href="{{ route('driver.create') }}">Add New driver</a>
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="driver-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
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
        $('#driver-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! route('driver.index') !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },                   
                {
                    data: 'phone_number',
                    name: 'phone_number'
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