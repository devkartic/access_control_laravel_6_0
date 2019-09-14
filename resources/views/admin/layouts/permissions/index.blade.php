@extends('admin.master')
@section('content')
    <div class="container-row">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Role Permissions</h6>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-6 pl-0 mt-3">
                            <div class="form-group row">
                                <label for="role_id" class="col-md-3 col-form-label text-md-right">Role</label>
                                <div class="col-md-7">
                                    <select type="text" class="role_id form-control @error('role_id') is-invalid @enderror" name="role_id" required autofocus>
                                        <option value="">Select One</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-body role-permissions">
{{--                        Role Permission by Ajax--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('change', '.role_id', function () {
            let role_id = $(this).val();
            let _token = '{{ csrf_token() }}';
            let action_url = '{{ url('permissions') }}';
            if(role_id!==""){
                $.ajax({
                    type: 'post',
                    url: action_url,
                    data: {role_id: role_id, _token: _token},
                    dataType: 'html',
                }).done(function(data) {
                    $('.role-permissions').html(data);
                });
            }
        });
    </script>
@endsection
