$('.btn-edit').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/faq/edit/' + id,
        type: 'get',
        beforeSend: function(){
            $('.edit-content').empty()
            $('#editFaq').modal('show')
        },
        success: function(res){
            $('.edit-content').html(res)
        }
    })
})

$('.btn-remove').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/faq/remove/' + id,
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