<script>
    $(document).on("click", ".click-for-delete", function (e) {
        e.preventDefault();
        var thisRow = $(this).closest('tr');
        var action_url = $(this).attr("data-action") ;
        var token = $(this).attr("data-token") ;
        swal.fire({
                title: 'Are you sure ?',
                text: "Please click confirm to delete this",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true
            }).then(function (isConfirm) {
            if(isConfirm.value){
                $.ajax({
                    type: 'delete',
                    data: {
                        "_token": token
                    },
                    url: action_url,
                    success: function (data) {
                        var getData = JSON.parse(data);
                        var message = getData.message;
                        if(getData.flag===true) {
                            swal.fire("Deleted", message, "success");
                            thisRow.remove();
                        } else {
                            swal.fire(
                                'Failed',
                                message,
                                'error'
                            )
                        }
                    }
                });
            } else{
                swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    })

</script>
