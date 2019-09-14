<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    @if(isset($header))
        <a href="#" class="modal-click-open float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-action="{{ url($header['createUrl']) }}" data-modal="{{ $header['modalSize'] }}" data-title="{{ $header['title']}}"  data-toggle="modal" data-target=".modal-main"><i class="fas fa-pencil-alt fa-sm text-white-50"></i> create</a>
    @endif
</div>
