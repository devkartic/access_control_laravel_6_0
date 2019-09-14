@extends('admin.master')
@section('content')
    <div class="container-row">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modules</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Order Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Order Number</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($modules as $key => $module)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $module->name }}</td>
                            <td>{{ $module->order_number }}</td>
                            <td>
                                <button type="button" class="modal-click-open btn btn-outline-info" data-action="" data-modal="modal-md" data-title="Role Edit" data-toggle="modal" data-target=".modal-main" ><i class="fas fa-eye"></i></button>
                                <button type="button" class="modal-click-open btn btn-outline-warning" data-action="{{ url('modules/'.$module->id.'/edit') }}" data-modal="modal-lg" data-title="Module Edit" data-toggle="modal" data-target=".modal-main" ><i class="fas fa-edit"></i></button>
                                <button type="button" class="click-for-delete btn btn-outline-danger" data-action="{{ url('modules/'.$module->id) }}" data-token="{{ csrf_token() }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
