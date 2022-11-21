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