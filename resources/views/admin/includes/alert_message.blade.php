<span class="alert-message">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ session('warning') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
</span>

<!-- success message hide after 2 sec-->
<script>
    setTimeout(function() { $(".alert-message").hide(); }, 7000);

    const ajaxAlertMessage = (data) => {
        data = JSON.parse(data);
        let key = null;
        let message = null;
        let alert_type = null;
        if(data.success!==undefined){
            alert_type = 'alert-success';
            key = 'Success';
            message = data.success;
        } else if(data.error!==undefined){
            alert_type = 'alert-danger';
            key = 'Error';
            message = data.error;
        } else{
            alert_type = 'alert-danger';
            key = 'Opps';
            message = 'Message not found.';
        }
        message = `<div class="alert ${alert_type} alert-dismissible fade show" role="alert">
                            <strong>${key}!</strong> ${message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>`;
        console.log(message);
        $('.alert-message').show().html(message);
    }

</script>
<!-- success message hide after 2 sec-->