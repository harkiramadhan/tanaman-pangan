$('.btn-remove').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/tanitrainer/remove/' + id,
        type: 'get',
        beforeSend: function(){
            $('.remove-content').empty()
            $('#modalRemove').modal('show')
        },
        success: function(res){
            $('.remove-content').html(res)
        }
    })
})