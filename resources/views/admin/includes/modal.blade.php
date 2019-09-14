<!-- Logout Modal-->
<div class="modal fade modal-main" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{--Title From Modal--}}
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{--Modal Body include by ajax--}}
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.modal-click-open', function () {
        var action_url = $(this).attr('data-action');
        var modal_size = $(this).attr('data-modal');
        removeModalSize(modal_size);
        var title = $(this).attr('data-title');
        $('.modal-title').text(title);

        $.ajax({
            type : 'GET',
            url : action_url,
            success:function(data){
                $('.modal-body').html(data);
            }

        });
    });

    function removeModalSize(modal_size) {
        var thisClass = $('.modal-dialog');
        if (thisClass.hasClass('modal-xs')){
            thisClass.removeClass('modal-xs')
        }
        if (thisClass.hasClass('modal-sm')){
            thisClass.removeClass('modal-sm')
        }
        if (thisClass.hasClass('modal-md')){
            thisClass.removeClass('modal-md')
        }
        if (thisClass.hasClass('modal-lg')){
            thisClass.removeClass('modal-lg')
        }
        if (thisClass.hasClass('modal-xl')){
            thisClass.removeClass('modal-xl')
        }
        thisClass.addClass(modal_size);
    }
</script>
