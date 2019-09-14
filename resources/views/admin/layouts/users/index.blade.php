@extends('admin.master')
@section('content')
    <div class="container-row">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Username</th>
                            <th>role</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button type="button" class="userActivityHandler btn @if($user->status===0) btn-outline-success @else btn-outline-danger @endif" data-id="{{ $user->id }}" data-status="{{ $user->status }}"> @if($user->status===0) Active @else Inactive @endif </button>
                                </td>
                                <td>
                                    <button type="button" class="modal-click-open btn btn-outline-info" data-action="" data-modal="modal-md" data-title="Role Edit" data-toggle="modal" data-target=".modal-main" ><i class="fas fa-eye"></i></button>
                                    <button type="button" class="modal-click-open btn btn-outline-warning" data-action="{{ url('users/'.$user->id.'/edit') }}" data-modal="modal-lg" data-title="User Edit" data-toggle="modal" data-target=".modal-main" ><i class="fas fa-edit"></i></button>
                                    <button type="button" class="click-for-delete btn btn-outline-danger" data-action="{{ url('users/'.$user->id) }}" data-token="{{ csrf_token() }}"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.userActivityHandler', function () {
           let thisRow = $(this).closest('tr');
           let user_id = thisRow.find('.userActivityHandler').attr('data-id');
           let status = thisRow.find('.userActivityHandler').attr('data-status');
           let action_url = 'users-activity';
           let _token = '{{ csrf_token() }}';
            $.ajax({
                type: 'post',
                url: action_url,
                data: {
                    user_id: user_id,
                    status: status,
                    _token: _token
                },
                success: function (data) {
                    thisRow.find('.userActivityHandler').attr('data-status', data);
                    if(parseInt(data)===1){
                        thisRow.find('.userActivityHandler').removeClass('btn-outline-success');
                        thisRow.find('.userActivityHandler').addClass('btn-outline-danger');
                        thisRow.find('.userActivityHandler').html('Inactive');
                    }else{
                        thisRow.find('.userActivityHandler').removeClass('btn-outline-danger');
                        thisRow.find('.userActivityHandler').addClass('btn-outline-success');
                        thisRow.find('.userActivityHandler').html('Active');
                    }
                }
            });
        });
    </script>
@endsection
