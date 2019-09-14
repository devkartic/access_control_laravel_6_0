<div class="col-md-12">
    <div id="accordion">
        @foreach($modules as $module)
            <div class="card">
                <div class="card-header" id="headingOne{{ $module->id }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{ $module->id }}" aria-expanded="true" aria-controls="collapseOne{{ $module->id }}">
                            {{ $module->name }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne{{ $module->id }}" class="collapse" aria-labelledby="headingOne{{ $module->id }}" data-parent="#accordion">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Link Name</th>
                                    <th class="text-center">Read</th>
                                    <th class="text-center">Create</th>
                                    <th class="text-center">Update</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Link Name</th>
                                    <th class="text-center">Read</th>
                                    <th class="text-center">Create</th>
                                    <th class="text-center">Update</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($module->links as $link)
                                    @if(!empty($link->permissions) && $link->permissions->where('role_id', '=', $role_id)->first())
                                        @php $permission = $link->permissions->where('role_id', '=', $role_id)->first(); @endphp
                                        <tr>
                                            <td class="permission-info" data-role="{{ $role_id }}" data-link="{{ $link->id }}">{{ $link->name }}</td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" type="checkbox" name="read" @if($permission->read==1) checked @endif >
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" type="checkbox" name="create" @if($permission->create==1) checked @endif >
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" type="checkbox" name="update" @if($permission->update==1) checked @endif >
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" type="checkbox" name="delete" @if($permission->delete==1) checked @endif >
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="permission-info" data-role="{{ $role_id }}" data-link="{{ $link->id }}">{{ $link->name }}</td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" name="read" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" name="create" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" name="update" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input permissionHandler" name="delete" type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    // Permission Handler
    $(document).on('click', '.permissionHandler', function () {
        let thisLink = $(this).closest('tr').find('.permission-info');
        let role_id = thisLink.attr('data-role');
        let link_id = thisLink.attr('data-link');
        let permission_type = $(this).attr('name');
        let hasPermission = $(this).is(':checked')===true ? 1 : 0;
        let _token = '{{ csrf_token() }}';
        let action_url = '{{ url('permissions') }}/'+role_id;
        $.ajax({
            type: 'patch',
            url: action_url,
            data: {_token: _token, role_id: role_id, link_id: link_id, permission_type:permission_type, hasPermission:hasPermission},
        }).done(function(data) {
            console.log(data)
        });
    });
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('.dataTable').DataTable();
    });
</script>
