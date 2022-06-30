@extends('layouts.master')
@section('title')
    Vehicle Ownership Data
@endsection
@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Vehicle Ownership Data</h4>
                </div>
                <div class="card-body">
                    <p>You can view all company that own the vehicle!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a class="float-right btn btn-success fw-bold" href="{{ route('ownership.create') }}">Register new company</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive" id="vehicle-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>                                
                                <th>Phone Number</th>
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
                ajax: '{!! route('ownership.index') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
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
