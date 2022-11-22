$('.btn-remove').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/publikasi/remove/' + id,
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