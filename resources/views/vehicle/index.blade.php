@extends('layouts.master')
@section('title')
    Vehicle Data
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Vehicle Data</h4>
                </div>
                <div class="card-body">
                    <p>You can view all data of available vehicle!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a class="float-right btn btn-success fw-bold" href="{{ route('vehicle.create') }}">Create New Vehicle</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive" id="vehicle-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-3">

        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            $('#vehicle-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('vehicle.index') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'type',
                        name: 'type'
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
